@extends('layouts.app')

@section('content')
    <form action="{{ route('chara.building.level.store', ['idChara' => $character->id]) }}" method="POST" accept-charset="UTF-8">
    @csrf

    <div class="container">
        <div class="col">
            <h1>Votre personnage n'est pas terminé</h1>
            <h2>Ce personnage a un niveau vide.</h2>
            <h4>Veuillez choisir dans quelle classe vous souhaitez prendre un niveau.</h4>
            <div class="row mb-4" id="classes">
                {{ Form::label('dnd_class', 'Classe', $attributes = ['class' => 'control-label mr-3']) }}
                {{ Form::select('dnd_class', $dndClasses, $character->mainClass->id, $attributes = ['class' => 'form-control classesSelect', 'required' => '']) }}
            </div>
            <div class="row">
                {{ Form::submit("Valider et passer à l'étape suivante", $attributes = ['class' => 'form-control btn btn-success mt-3', 'name' => 'submit']) }}
                {{ Form::submit("Prendre tous mes niveaux disponibles dans cette classe (en développement)", $attributes = ['class' => 'form-control btn btn-danger mt-3', 'name' => 'submit']) }}
                {{-- <a href="{{ route('chara.fastbuilding.level.store', ['idChara' => $character->id]) }}" class="btn btn-danger form-control mt-2">Prendre tous mes niveaux disponibles dans cette classe</a> --}}
            </div>

        </div>

    </div>
    {{ Form::close() }}

@endsection
