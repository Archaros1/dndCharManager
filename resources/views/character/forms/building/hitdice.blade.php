@extends('layouts.app')

@section('content')
    <form action="{{ route('chara.building.hitdice.store', ['idChara' => $character->id]) }}" method="POST" accept-charset="UTF-8">
    @csrf

    <div class="container">
        <div class="col">
            <h1>Votre personnage n'est pas terminé</h1>
            <h2>Il lui manque des points de vie.</h2>
            <h4>Veuillez lancer un dé à {{ $investment->class->hitdice }} de votre classe {{ ucwords($investment->class->name) }}.</h4>
            <div class="row mb-4" id="classes">
                {{ Form::label('hitdice', 'Résultat du dé à '.$investment->class->hitdice.' faces', $attributes = ['class' => 'control-label mr-3']) }}
                <img src="{{ asset('/icons/dices.svg') }}" alt="" id="rollHitDice" class="ml-2" title="Roll the dice">
                {{ Form::select('hitdice', $diceTab, ($investment->class->hitdice/2)+1, $attributes = ['class' => 'form-control classesSelect', 'required' => '']) }}
            </div>
            {!! Form::hidden('investment', $investment->id) !!}
            <div class="row">
                {{ Form::submit("Valider et passer à l'étape suivante", $attributes = ['class' => 'form-control btn btn-success mt-3']) }}
            </div>

        </div>

    </div>
    {{ Form::close() }}

@endsection
