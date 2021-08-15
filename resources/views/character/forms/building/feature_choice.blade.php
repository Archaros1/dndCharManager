@extends('layouts.app')

@section('content')
    <form action="{{ route('chara.building.feature_choice.store', ['idChara' => $character->id]) }}" method="POST" accept-charset="UTF-8">
    @csrf

    <div class="container">
        <div class="col">
            <h1>Votre personnage n'est pas terminé</h1>
            <h2>Vous avez un choix à faire</h2>
            <h4>{{ $feature->display_name }}</h4>
            <div class="row mb-4" id="classes">
                <p id="description-feature">{{ $feature->description()->text }}</p>
            </div>
            <div class="row mb-4" id="classes">
                {{ Form::label('feature_choice', 'Options', $attributes = ['class' => 'control-label mr-3']) }}
                {{ Form::select('feature_choice', $choices, $attributes = ['class' => 'form-control classesSelect', 'required' => '']) }}
            </div>
            <div class="row mb-4" id="classes">
                <p id="description-choice"></p>
            </div>
            {!! Form::hidden('feature', $feature->id) !!}
            <div class="row">
                {{ Form::submit("Valider et passer à l'étape suivante", $attributes = ['class' => 'form-control btn btn-success mt-3']) }}
            </div>

        </div>

    </div>
    {{ Form::close() }}

@endsection
