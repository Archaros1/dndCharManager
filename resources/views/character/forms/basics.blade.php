@extends('layouts.app')

@section('content')
    {{-- {!! Form::open(['action' =>'App\Http\Controllers\CharacterController@store']) !!} --}}
    <form action="{{ route('chara.store', $step) }}" method="POST" accept-charset="UTF-8">
    @csrf

    <div class="container">
        <div class="col">
            <h1>Création de personnage</h1>
            <div class="row mb-4">
                {{ Form::label('name', 'Nom', $attributes = ['class' => 'control-label']) }}
                {{ Form::text('name', $value = null, $attributes = ['class' => 'form-control', 'required' => '']) }}
            </div>
            <div class="row mb-4">
                {{ Form::label('level', 'Niveau', $attributes = ['class' => 'control-label mr-3']) }}
                {{ Form::selectRange('level', 1, 20, $attributes = ['class' => 'form-control mr-4', 'required' => '']) }}
            </div>
            <div class="row mb-4">
                {{ Form::label('race', 'Race', $attributes = ['class' => 'control-label mr-3']) }}
                {{ Form::select('race', $races, $attributes = ['class' => 'form-control', 'required' => '']) }}
            </div>
            <div class="row mb-4">
                {{ Form::label('background', 'Background', $attributes = ['class' => 'control-label mr-3']) }}
                {{ Form::select('background', $backgrounds, $attributes = ['class' => 'form-control', 'required' => '']) }}
            </div>
            <div class="row">
                <h4>Statistiques</h4><img src="{{ asset('/icons/dices.svg') }}" alt="" id="rollOneStat" class="ml-2" title="Roll a stat">
            </div>
            <div id="stats" class="row">
                <div id="strength" class="col-4 mb-2">
                    {{ Form::label('strength', 'Force', $attributes = ['class' => 'control-label mr-3']) }}
                    {{ Form::number('strength', $value = 10, $attributes = ['class' => 'form-control', 'required' => '']) }}
                </div>
                <div id="dexterity" class="col-4 mb-2">
                    {{ Form::label('dexterity', 'Dexterité', $attributes = ['class' => 'control-label mr-3']) }}
                    {{ Form::number('dexterity', $value = 10, $attributes = ['class' => 'form-control', 'required' => '']) }}
                </div>
                <div id="constitution" class="col-4 mb-2">
                    {{ Form::label('constitution', 'Constitution', $attributes = ['class' => 'control-label mr-3']) }}
                    {{ Form::number('constitution', $value = 10, $attributes = ['class' => 'form-control', 'required' => '']) }}
                </div>
                <div id="intelligence" class="col-4 mb-2">
                    {{ Form::label('intelligence', 'Intelligence', $attributes = ['class' => 'control-label mr-3']) }}
                    {{ Form::number('intelligence', $value = 10, $attributes = ['class' => 'form-control', 'required' => '']) }}
                </div>
                <div id="wisdom" class="col-4 mb-2">
                    {{ Form::label('wisdom', 'Sagesse', $attributes = ['class' => 'control-label mr-3']) }}
                    {{ Form::number('wisdom', $value = 10, $attributes = ['class' => 'form-control', 'required' => '']) }}
                </div>
                <div id="charisma" class="col-4 mb-2">
                    {{ Form::label('charisma', 'Charisme', $attributes = ['class' => 'control-label mr-3']) }}
                    {{ Form::number('charisma', $value = 10, $attributes = ['class' => 'form-control', 'required' => '']) }}
                </div>
            </div>
            <div class="row justify-content-center">
                {{ Form::submit("Valider et passer à l'étape suivante", $attributes = ['class' => 'form-control btn btn-success mt-3']) }}
            </div>



        </div>

    </div>
    {{ Form::close() }}

@endsection
