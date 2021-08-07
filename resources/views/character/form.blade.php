@extends('layouts.app')

@section('content')
    {{ Form::open(['/character/store' => 'chara.store']) }}

    <div class="container">
        <div class="col">
            <h1>Création de personnage</h1>
            <div class="row">
                    {{ Form::label('name', 'Nom', $attributes = ['class' => 'control-label']) }}
                    {{ Form::text('name', $value = null, $attributes = ['class' => 'form-control mb-4']) }}

                    {{ Form::label('level', 'Niveau', $attributes = ['class' => 'control-label mr-4']) }}
                    {{ Form::selectRange('level', 1, 20, $attributes = ['class' => 'form-control']) }}

            </div>
        </div>

    </div>
    {{ Form::close() }}

@endsection
