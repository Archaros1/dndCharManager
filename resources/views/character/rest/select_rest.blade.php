@extends('layouts.app')

@section('content')
    {{ Form::open(['route' => ['chara.rest', $character->id]]) }}
    <div class="container mt-2">
        <div class="row w-100 mx-0">
            <h4>Quel type de repos voulez-vous prendre ?</h4>
        </div>
        <div class="row mx-0">
            {{ Form::select('restType', ['long' => 'Long rest', 'short' => 'Short rest'], 'short', $attributes = ['class' => 'form-control', 'id' => 'typeRestChoice', 'required' => '']) }}
        </div>
    </div>
    @include('character.rest.short_rest')
    <div class="row mx-0 mt-3">
        {{ Form::submit('Valider', $attributes = ['class' => 'btn btn-success form-control', 'required' => '']) }}
    </div>
    {{ Form::close() }}
@endsection
