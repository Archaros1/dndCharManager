<?php

namespace App\Http\Controllers;

use App\Models\DndClass;
use App\Models\SubClass;
use Illuminate\Http\Request;

class DndClassController extends Controller
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
     * @param  \App\Models\DndClass  $dndClass
     * @return \Illuminate\Http\Response
     */
    public function show(DndClass $dndClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DndClass  $dndClass
     * @return \Illuminate\Http\Response
     */
    public function edit(DndClass $dndClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DndClass  $dndClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DndClass $dndClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DndClass  $dndClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(DndClass $dndClass)
    {
        //
    }

    public function showSubClass(int $classId)
    {
        $subclasses = DndClass::find($classId)->subclasses;
        return json_encode($subclasses);
    }

    public function showSubClassLevelN(int $classId, int $level = 1)
    {
        $dndClass = DndClass::find($classId);

        return ($dndClass->sub_class_obtention_level !== $level) ?
            'ko' :
            $this->showSubClass($classId);
    }

    public function test($id)
    {
        dd(DndClass::where('name', '=', 'wizard')->first()->spellsLevelN(0));
    }
}
