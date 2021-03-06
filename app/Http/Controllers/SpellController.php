<?php

namespace App\Http\Controllers;

use App\Models\Spell;
use Illuminate\Http\Request;

class SpellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $spells = Spell::all();

        return view('spells/list', [
            'spells' => $spells,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spell  $spell
     * @return \Illuminate\Http\Response
     */
    public function show(Spell $spell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spell  $spell
     * @return \Illuminate\Http\Response
     */
    public function edit(Spell $spell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spell  $spell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spell $spell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spell  $spell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spell $spell)
    {
        //
    }

    public function description(int $idSpell)
    {
        $spell = Spell::find($idSpell);
        return $spell->description->text;
    }
}
