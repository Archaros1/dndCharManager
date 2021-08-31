@extends('layouts.app')

@section('content')
    <form action="{{ route('chara.building.spell.store', ['idChara' => $character->id]) }}" method="POST"
        accept-charset="UTF-8">
        @csrf

        <div class="container">
            <div class="col">
                <h1>Votre personnage n'est pas terminé</h1>
                <h2>Vous avez un ou plusieurs sorts à choisir</h2>


                @for ($i = 1; $i <= $missingCount; $i++)
                    <div class="row mb-1">
                        {{ Form::label('spell_choice_' . $i, 'Sort ' . $i, $attributes = ['class' => 'control-label mr-3']) }}
                        {{ Form::select('spell_choice_' . $i, $spells, $attributes = ['class' => 'form-control', 'required' => '']) }}
                    </div>
                    <div class="row mb-4 max-height nice-border overflow-auto" id="">
                        <p id="{{ 'description-choice-' . $i }}"></p>
                    </div>
                @endfor

                {!! Form::hidden('investment', $investment->id) !!}
                <div class="row">
                    {{ Form::submit("Valider et passer à l'étape suivante", $attributes = ['class' => 'form-control btn btn-success mt-3']) }}
                </div>

            </div>

        </div>
        {{ Form::close() }}

    @endsection
