<?php

namespace App\Http\Controllers;

use App\Models\ActualCharacter;
use App\Models\Character;
use App\Models\StatPack;
use Illuminate\Http\Request;

use App\Models\Background;
use App\Models\ClassInvestment;
use App\Models\DataHandler;
use App\Models\DndClass;
use App\Models\Feature;
use App\Models\FeatureChoice;
use App\Models\HitDice;
use App\Models\Race;
use App\Models\SelectedFeatureChoice;
use App\Models\SubClass;
use App\Models\SubRace;
use App\Models\Spell;
use App\Models\Spellcasting;
use App\Models\SpellList;
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
        $subracesCollec = SubRace::all();

        $backgrounds = [];
        $races = [];
        $subraces = [];

        foreach ($backgroundsCollec as $background) {
            $backgrounds[$background->id] = ucwords($background->name);
        }

        foreach ($racesCollec as $race) {
            $races[$race->id] = ucwords($race->name);
        }

        foreach ($subracesCollec as $subrace) {
            $subraces[$subrace->id] = ucwords($subrace->name);
        }

        return view('character/forms/basics', [
            'backgrounds' => $backgrounds,
            'races' => $races,
            'subraces' => $subraces,
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
            $character->calculateStats();
            $character->health = $character->calculateHP();
            $character->save();

            $actualCharacter = ActualCharacter::where('character_id', '=', $idChara)->first();
            if (empty($actualCharacter)) {
                $actualCharacter = ActualCharacter::create([
                    'left_health' => $character->health,
                    'character_id' => $idChara,
                ]);
            }

            return redirect('character/show/' . $idChara . '/main');
        }

        switch ($nextStep['title']) {
            case 'missing subclass':

                $subClassCollec = SubClass::where('class_id', '=', $nextStep['investment']->class_id)->get();
                $subClasses = [];

                foreach ($subClassCollec as $subClass) {
                    $subClasses[$subClass->id] = ucwords($subClass->name);
                }

                return view('character/forms/building/subclass', [
                    'character' => $character,
                    'investment' => $nextStep['investment'],
                    'subClasses' => $subClasses,
                ]);
                break;

            case 'missing feature choice':
                $featureChoices = FeatureChoice::where('feature_id', '=', $nextStep['feature']->id)->get();
                $choices = [];

                foreach ($featureChoices as $key => $choice) {
                    $choices[$choice->id] = ucwords($choice->display_name);
                }

                return view('character/forms/building/feature_choice', [
                    'character' => $character,
                    'feature' => $nextStep['feature'],
                    'choices' => $choices,
                ]);
                break;

            case 'missing investment':
                $classCollec = DndClass::all();

                $dndClasses = [];

                foreach ($classCollec as $dndClass) {
                    $dndClasses[$dndClass->id] = ucwords($dndClass->name);
                }

                return view('character/forms/building/investment', [
                    'character' => $character,
                    'dndClasses' => $dndClasses,
                ]);
                break;

            case 'missing hitdice':
                $diceTab = [];
                for ($i = 1; $i <= $nextStep['investment']->class->hitdice; $i++) {
                    $diceTab[$i] = $i;
                }
                return view('character/forms/building/hitdice', [
                    'character' => $character,
                    'investment' => $nextStep['investment'],
                    'diceTab' => $diceTab,
                ]);
                break;

            case 'missing level1':
                return redirect('character/create/level1/' . $idChara);
                break;

            case 'missing spell':
                $investment = $nextStep['investment'];
                $highestSlot = $investment->highestSlot();
                $spells = $investment->class->spellcasting->spellsLevelNOrLower($highestSlot, false);

                foreach ($spells as $key => $spell) {
                    $spellTab[$spell->id] = ucwords($spell->name);
                }

                return view('character/forms/building/spell', [
                    'character' => $character,
                    'investment' => $investment,
                    'spells' => $spellTab,
                    'missingCount' => $nextStep['missingCount'],
                ]);
                break;
            case 'missing cantrip':
                $investment = $nextStep['investment'];
                $spells = $investment->class->spellcasting->spellsLevelN(0);

                foreach ($spells as $key => $spell) {
                    $spellTab[$spell->id] = ucwords($spell->name);
                }

                return view('character/forms/building/spell', [
                    'character' => $character,
                    'investment' => $investment,
                    'spells' => $spellTab,
                    'missingCount' => $nextStep['missingCount'],
                ]);
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

        if (isset($inputs['subrace'])) {
            $subrace = SubRace::find($inputs['subrace']);
            if (empty($subrace) || $subrace->race_id != $inputs['race']) {
                $inputs['subrace'] = null;
            }
        }

        $newCharacter = Character::create([
            'name' => $inputs['name'],
            'level' => $inputs['level'],
            'race_id' => $inputs['race'],
            'sub_race_id' => $inputs['subrace'] ?? null,
            'background_id' => $inputs['background'],
            'stat_pack_id' => $stats->id,
            'creator_id' => Auth::user()->id,

        ]);

        return redirect('character/create/level1/' . $newCharacter->id);
    }

    private function storeLevel1($inputs, $idChara)
    {
        if (isset($inputs['sub_class'])) {
            $subclass = SubClass::find($inputs['sub_class']);
            if (empty($subclass) || $subclass->class_id !== (int) $inputs['dnd_class']) {
                $inputs['sub_class'] = null;
            }
        }

        $knownSpellList = SpellList::create();
        $preparedSpellList = SpellList::create();

        $investment = ClassInvestment::create([
            'character_id' => $idChara,
            'class_id' => $inputs['dnd_class'],
            'subclass_id' => $inputs['sub_class'] ?? null,
            'level' => 1,
            'known_spell_list_id' => $knownSpellList->id,
            'prepared_spell_list_id' => $preparedSpellList->id,
        ]);

        $dndClass = DndClass::find($inputs['dnd_class']);

        $firstHitDice = HitDice::create([
            'max_value' => $dndClass->hitdice,
            'rolled_value' => $dndClass->hitdice,
            'class_investment_id' => $investment->id,
        ]);

        return redirect('character/create/building/' . $idChara);
    }

    private function checkCharacterReady($character)
    {
        $investments = $character->classInvestments;
        if ($investments->all() == []) {
            return [
                'title' => 'missing level1',
            ];
        }
        $totalInvestmentLevel = 0;
        foreach ($investments as $key => $investment) {
            $dndClass = $investment->class;

            $totalInvestmentLevel += $investment->level;

            if ($dndClass->sub_class_obtention_level <= $investment->level && empty($investment->subclass)) {
                # gotta get that subclass
                return [
                    'title' => 'missing subclass',
                    'investment' => $investment,
                ];
            }

            if ($investment->hasMissingSpell() !== 0) {
                # gotta get that spell(s)
                return [
                    'title' => 'missing spell',
                    'investment' => $investment,
                    'missingCount' => $investment->hasMissingSpell(),
                ];
            }

            if ($investment->hasMissingCantrip() !== 0) {
                # gotta get that spell(s)
                return [
                    'title' => 'missing cantrip',
                    'investment' => $investment,
                    'missingCount' => $investment->hasMissingCantrip(),
                ];
            }

            if (count($investment->hitDices) < $investment->level) {
                # gotta roll these hitdices
                return [
                    'title' => 'missing hitdice',
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

        return null;
    }

    public function buildingFeatureChoiceStore($idChara, Request $request)
    {
        $inputs = $request->post();

        $feature = Feature::find($inputs['feature']);
        if ($feature->selected_choice_amount > 1) {
            $choices = [];
            for ($i = 0; $i < $feature->selected_choice_amount; $i++) {
                array_push($choices, $inputs['feature_choice_' . ($i + 1)]);
                if ($choices !== array_unique($choices)) {
                    return redirect('/character/create/building/' . $idChara);
                }
            }
            for ($i = 0; $i < $feature->selected_choice_amount; $i++) {
                SelectedFeatureChoice::create([
                    'character_id' => $idChara,
                    'feature_id' => $inputs['feature'],
                    'feature_choice_id' => $inputs['feature_choice_' . ($i + 1)],
                ]);
            }
        } else {
            SelectedFeatureChoice::create([
                'character_id' => $idChara,
                'feature_id' => $inputs['feature'],
                'feature_choice_id' => $inputs['feature_choice'],
            ]);
        }

        return redirect('/character/create/building/' . $idChara);
    }

    public function buildingLevelStore($idChara, Request $request)
    {
        $inputs = $request->post();


        $investment = ClassInvestment::where([
            'character_id' => $idChara,
            'class_id' => $inputs['dnd_class'],
        ])->first();

        if (empty($investment)) {
            $knownSpellList = SpellList::create();
            $preparedSpellList = SpellList::create();
            $investment = ClassInvestment::create([
                'character_id' => $idChara,
                'class_id' => $inputs['dnd_class'],
                'level' => 1,
                'known_spell_list_id' => $knownSpellList->id,
                'prepared_spell_list_id' => $preparedSpellList->id,
            ]);
        } else {
            $investment->level++;
            $investment->save();
        }

        return redirect('/character/create/building/' . $idChara);
    }

    public function fastBuildingLevelStore($idChara, Request $request)
    {
        $inputs = $request->post();
        $character = Character::find($idChara);

        $investment = ClassInvestment::where([
            'character_id' => $idChara,
            'class_id' => $inputs['dnd_class'],
        ])->first();

        if (empty($investment)) {
            $investment = ClassInvestment::create([
                'character_id' => $idChara,
                'class_id' => $inputs['dnd_class'],
                'level' => ($character->level - $character->investedLevel()),
            ]);
        } else {
            $investment->level++;
            $investment->save();
        }

        return redirect('/character/create/building/' . $idChara);
    }

    public function buildingSubClassStore($idChara, Request $request)
    {
        $inputs = $request->post();

        $investment = ClassInvestment::where([
            'character_id' => $idChara,
            'id' => $inputs['investment'],
        ])->first();

        $investment->subclass_id = (int) $inputs['sub_class'];
        $investment->save();

        return redirect('/character/create/building/' . $idChara);
    }

    public function buildingHitDiceStore($idChara, Request $request)
    {
        $inputs = $request->post();

        $investment = ClassInvestment::where([
            'character_id' => $idChara,
            'id' => $inputs['investment'],
        ])->first();

        $hitDice = HitDice::create([
            'max_value' => $investment->class->hitdice,
            'rolled_value' => $inputs['hitdice'],
            'class_investment_id' => $investment->id,
        ]);

        return redirect('/character/create/building/' . $idChara);
    }

    public function buildingSpellStore($idChara, Request $request)
    {
        $inputs = $request->post();

        $i = 0;
        $spells = [];
        while (isset($inputs['spell_choice_' . ($i + 1)])) {
            $i++;
            array_push($spells, $inputs['spell_choice_' . $i]);
        }
        $spells = array_unique($spells);

        if (count($spells) === $i) {
            $investment = ClassInvestment::find($inputs['investment']);
            foreach ($spells as $key => $spellId) {
                $spell = Spell::find($spellId);
                $spell->spellLists()->attach($investment->knownSpellList);
                $spell->save();
                if ($spell->level != 0) {
                    $investment->spells_known_count++;
                } else {
                    $investment->cantrips_known_count++;
                }
                $investment->save();
            }
        }

        return redirect('/character/create/building/' . $idChara);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(int $idChara, Request $request)
    {
        $character = Character::find($idChara);
        $actualCharacter = ActualCharacter::where('character_id', '=', $idChara)->first();

        if ($request->isMobile) {
            return view('character/mobile/main', [
                'character' => $character,
                'actualCharacter' => $actualCharacter,
            ]);
        } else {
            return view('character/show', [
                'character' => $character,
                'actualCharacter' => $actualCharacter,
            ]);
        }
    }

    public function showFeaturesPage(int $idChara, Request $request)
    {
        $character = Character::find($idChara);
        $actualCharacter = $character->actual;

        if ($request->isMobile) {
            return view('character/mobile/cases/actions', [
                'character' => $character,
                'actualCharacter' => $actualCharacter,
            ]);
        } else {
            return view('character/features', [
                'character' => $character,
                'actualCharacter' => $actualCharacter,
            ]);
        }
    }

    public function showSpellsPage(int $idChara, Request $request)
    {
        $character = Character::find($idChara);
        $actualCharacter = $character->actual;

        if ($request->isMobile) {
            if (!$character->hasSpellsPrepared()) {
                $investment = $character->investmentMissingPreparedSpells();

                if (is_null($investment->known_spell_list_id)) {
                    $spells = $investment->class->spellcasting->spells->sortBy([
                        ['level', 'asc'],
                        ['name', 'asc'],
                    ])->groupBy('level');
                } else {
                    $spells = $investment->knownSpells->sortBy([
                        ['level', 'asc'],
                        ['name', 'asc'],
                    ])->groupBy('level');
                }

                return view('character/mobile/cases/spells/prepare', [
                    'character' => $character,
                    'investment' => $investment,
                    'spells' => $spells,
                ]);
            } else {
                return view('character/mobile/cases/spells/manager', [
                    'character' => $character,
                    'actualCharacter' => $actualCharacter,
                ]);
            }
        }
    }

    public function prepareSpellsStore($idChara, Request $request)
    {
        $inputs = $request->post();
        $character = Character::find($idChara);
        $actualCharacter = $character->actual;
        $investment = $character->investmentMissingPreparedSpells();

        $preparingSpells = [];
        foreach ($inputs as $key => $input) {
            if (str_starts_with($key, 'spell_')) {
                $idSpell = (int) preg_replace('/^spell_/', '', $key);
                $preparingSpells[$idSpell] = Spell::find($idSpell);
            }
        }
        if (count($preparingSpells) === $investment->preparedSpellsCount()) {
            foreach ($preparingSpells as $key => $spell) {
                $spell->spellLists()->attach($investment->preparedSpellList);
                $spell->save();
            }
        }
        return redirect('/character/show/' . $idChara . '/features/spells');
    }

    public function showInventoryPage(int $idChara, Request $request)
    {
        # code...
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
    public function destroy($id)
    {
        Character::find($id)->delete();
        return redirect('profil');
    }

    public function test($idChara)
    {
        $character = Character::find($idChara);

        dd($character->knownSpells());
    }
}
