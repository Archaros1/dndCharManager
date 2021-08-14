<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\StatPack;
use Illuminate\Http\Request;

use App\Models\Background;
use App\Models\ClassInvestment;
use App\Models\DndClass;
use App\Models\FeatureChoice;
use App\Models\HitDice;
use App\Models\Race;
use App\Models\SelectedFeatureChoice;
use App\Models\SubClass;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($step = 'basics', $idChara = null)
    {
        switch ($step) {
            case 'basics':
                return $this->createBasics();
                break;

            case 'level1':
                return $this->createLevel1($idChara);
                break;

            case 'building':
                return $this->building($idChara);
                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $step = 'basics', $idChara = null)
    {
        $inputs = $request->post();

        switch ($step) {
            case 'basics':
                return $this->storeBasics($inputs);
                break;

            case 'level1':
                return $this->storeLevel1($inputs, $idChara);
                break;

            default:
                # code...
                break;
        }
    }

    private function createBasics()
    {
        $backgroundsCollec = Background::all();
        $racesCollec = Race::all();

        $backgrounds = [];
        $races = [];

        foreach ($backgroundsCollec as $background) {
            $backgrounds[$background->id] = ucwords($background->name);
        }

        foreach ($racesCollec as $race) {
            $races[$race->id] = ucwords($race->name);
        }

        return view('character/forms/basics', [
            'backgrounds' => $backgrounds,
            'races' => $races,
            'step' => 'basics',
        ]);
    }

    private function createLevel1($idChara)
    {
        $classCollec = DndClass::all();
        $subClassCollec = SubClass::where('sub_class_obtention_level', '=', 1);

        $dndClasses = [];
        $subClasses = [];

        foreach ($classCollec as $dndClass) {
            $dndClasses[$dndClass->id] = ucwords($dndClass->name);
        }

        foreach ($subClassCollec as $subClass) {
            $subClasses[$subClass->id] = ucwords($subClass->name);
        }

        return view('character/forms/level1', [
            'step' => 'level1',
            'idChara' => $idChara,
            'dndClasses' => $dndClasses,
            'subClasses' => $subClasses,
        ]);
    }

    private function building($idChara)
    {
        $character = Character::find($idChara);


        $nextStep = $this->checkCharacterReady($character);

        if (is_null($nextStep)) {
            $this->show($character);
        }

        switch ($nextStep['title']) {
            case 'missing subclass':
                return view('character/forms/building/subclass', [
                    'character' => $character,
                    'investment' => $nextStep['investment'],
                ]);
                break;

            case 'missing feature choice':
                $featureChoices = FeatureChoice::where('feature_id', '=', $nextStep['feature']->id)->get();
                $choices = [];

                foreach ($featureChoices as $key => $choice) {
                    $choices[$choice->id] = $choice->display_name;
                }

                return view('character/forms/building/feature_choice', [
                    'character' => $character,
                    'feature' => $nextStep['feature'],
                    'choices' => $choices,
                ]);
                break;

            case 'missing investment':
                return view('character/forms/building/level', [
                    'character' => $character,
                ]);
                break;

            case 'missing hitdice':
                return view('character/forms/building/hitdice', [
                    'character' => $character,
                ]);
                break;

            case 'value':
                # code...
                break;

            case 'value':
                # code...
                break;

            default:
                # code...
                break;
        }
    }

    private function storeBasics($inputs)
    {
        $stats = StatPack::create([
            'strength' => $inputs['strength'],
            'dexterity' => $inputs['dexterity'],
            'constitution' => $inputs['constitution'],
            'intelligence' => $inputs['intelligence'],
            'wisdom' => $inputs['wisdom'],
            'charisma' => $inputs['charisma'],
        ]);

        $newCharacter = Character::create([
            'name' => $inputs['name'],
            'level' => $inputs['level'],
            'race_id' => $inputs['race'],
            'background_id' => $inputs['background'],
            'stat_pack_id' => $stats->id,
            'creator_id' => Auth::user()->id,

        ]);

        return redirect('character/create/level1/' . $newCharacter->id);
    }

    private function storeLevel1($inputs, $idChara)
    {
        $investment = ClassInvestment::create([
            'character_id' => $idChara,
            'class_id' => $inputs['dnd_class'],
            'subclass_id' => $inputs['sub_class'] ?? null,
            'level' => 1,
        ]);

        $dndClass = DndClass::find($inputs['dnd_class']);

        $firstHitDice = HitDice::create([
            'max_value' => $dndClass->hitdice,
            'rolled_value' => $dndClass->hitdice,
            'amount' => 1,
            'character_id' => $idChara,
        ]);

        return redirect('character/create/building/' . $idChara);
    }

    private function checkCharacterReady($character)
    {
        $investments = $character->classInvestments;
        $totalInvestmentLevel = 0;
        foreach ($investments as $key => $investment) {
            $dndClass = $investment->class;

            $totalInvestmentLevel += $investment->level;

            if ($dndClass->subClassObtentionLevel >= $investment->level) {
                # gotta get that subclass
                return [
                    'title' => 'missing subclass',
                    'investment' => $investment,
                ];
            }
        }

        $features = $character->featuresWithChoices();
        $featureChoices = $character->featureChoices;
        $featuresWithChoiceTakenIds = [];

        // checking if a feature with choice is not in the array of features with taken choice
        foreach ($featureChoices as $key => $choice) {
            array_push($featuresWithChoiceTakenIds, $choice->feature_id);
        }

        foreach ($features as $key => $featureWithChoice) {
            if (!in_array($featureWithChoice->id, $featuresWithChoiceTakenIds)) {
                # gotta make a choice
                return [
                    'title' => 'missing feature choice',
                    'feature' => $featureWithChoice,
                ];
            }
        }

        if ($totalInvestmentLevel < $character->level) {
            # gotta invest
            return [
                'title' => 'missing investment',
            ];
        }

        $hitDices = $character->hitDices;
        if (count($hitDices) < $character->level) {
            # gotta roll these hitdices
            return [
                'title' => 'missing hitdice',
            ];
        }

        return null;
    }

    public function buildingFeatureChoiceStore($idChara, Request $request)
    {
        $inputs = $request->post();

        SelectedFeatureChoice::create([
            'character_id' => $idChara,
            'feature_id' => $inputs['feature'],
            'feature_choice_id' => $inputs['feature_choice'],
        ]);

        return $this->building($idChara);
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        //
    }
}
