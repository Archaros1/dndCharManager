@extends('layouts.app')

@section('content')
    {{-- {!! Form::open(['action' =>'App\Http\Controllers\CharacterController@store']) !!} --}}
    <form action="{{ route('chara.store', ['step' => $step, 'idChara' => $idChara]) }}" method="POST" accept-charset="UTF-8">
    @csrf

    <div class="container">
        <div class="col">
            <h1>Commençons en douceur...</h1>
            <h4>Votre personnage au niveau 1</h4>
            <div class="row mb-4" id="classes">
                {{ Form::label('dnd_class', 'Classe', $attributes = ['class' => 'control-label mr-3']) }}
                {{ Form::select('dnd_class', $dndClasses, $attributes = ['class' => 'form-control classesSelect', 'required' => '']) }}
            </div>

            <div class="row mb-4" id="subclasses">
                {{ Form::label('sub_class', 'Sous-Classe', $attributes = ['class' => 'control-label mr-3', 'id' => 'subclass_label']) }}
                {{ Form::select('sub_class', $subClasses, $attributes = ['class' => 'form-control subclassesSelect']) }}
            </div>
            <div class="row">
                {{ Form::submit("Valider et passer à l'étape suivante", $attributes = ['class' => 'form-control btn btn-success mt-3']) }}
            </div>

        </div>

    </div>
    {{ Form::close() }}

@endsection
