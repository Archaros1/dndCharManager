<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\StatPack;
use Illuminate\Http\Request;

use App\Models\Background;
use App\Models\ClassInvestment;
use App\Models\DndClass;
use App\Models\HitDice;
use App\Models\Race;
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
                    'step' => $step
                ]);

                break;

            case 'level1':
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
                    'step' => $step,
                    'idChara' => $idChara,
                    'dndClasses' => $dndClasses,
                    'subClasses' => $subClasses,
                ]);

                break;

            case '':
                # code...
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
                break;

            case 'level1':
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

                $character = Character::find($idChara);
                break;

            default:
                # code...
                break;
        }
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
