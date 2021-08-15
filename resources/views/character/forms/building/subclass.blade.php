@extends('layouts.app')

@section('content')
    <form action="{{ route('chara.building.subclass.store', ['idChara' => $character->id]) }}" method="POST" accept-charset="UTF-8">
    @csrf

    <div class="container">
        <div class="col">
            <h1>Votre personnage n'est pas terminé</h1>
            <h2>Vous devez choisir une sous-classe pour la classe {{ ucwords($investment->class->name) }}.</h2>
            <div class="row mb-4" id="class">
                <p id="description-class">{{ $investment->class->description()->text }}</p>
            </div>
            <div class="row mb-4" id="subclasses">
                {{ Form::label('sub_class', 'Sous-Classe', $attributes = ['class' => 'control-label mr-3', 'id' => 'subclass_label']) }}
                {{ Form::select('sub_class', $subClasses, $attributes = ['class' => 'form-control subclassesSelect']) }}
            </div>
            <div class="row mb-4" id="classes">
                <p id="description-choice"></p>
            </div>
            {!! Form::hidden('investment', $investment->id) !!}
            <div class="row">
                {{ Form::submit("Valider et passer à l'étape suivante", $attributes = ['class' => 'form-control btn btn-success mt-3']) }}
            </div>

        </div>

    </div>
    {{ Form::close() }}

@endsection
