<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\StatPack;
use Illuminate\Http\Request;

use App\Models\Background;
use App\Models\DndClass;
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
    public function create($step = 'basics')
    {
        switch ($step) {
            case 'basics':

                $backgroundsCollec = Background::all();
                $racesCollec = Race::all();

                $backgrounds = [];
                $races = [];

                foreach ($backgroundsCollec as $background) {
                    $backgrounds[$background->id] = $background->name;
                }

                foreach ($racesCollec as $race) {
                    $races[$race->id] = $race->name;
                }

                return view('character/forms/basics', [
                    'backgrounds' => $backgrounds,
                    'races' => $races,
                    'step' => $step
                ]);

                break;

            case 'level1':
                $classCollec = DndClass::all();
                $subClassCollec = SubClass::whereIn('name', [
                    'cleric',
                    'sorcerer',
                    'warlock'
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
    public function store(Request $request, $step = 'basics')
    {
        $inputs = $request->post();

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

        return redirect('character/create/level1');
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
