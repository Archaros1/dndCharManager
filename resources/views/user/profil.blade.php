@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="">Bonjour {{ $user->name }}</h1>
        <div class="row mb-4">
            <a href="{{ url('/character/create/basics') }}" class="btn btn-primary" id="new-character">Nouveau personnage</a>
        </div>
        <div class="row">
            @if (!empty($characters))
                @foreach ($characters as $character)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $character->name }}</h5>
                            <p class="card-text">
                                @isset($character->classInvestments)
                                    @foreach ($character->classInvestments as $investment)
                                    {{-- {{ $investment }} --}}
                                        {{ ucfirst(\App\Models\DndClass::find($investment->class_id)->name) }}
                                        @isset($investment->subclass_id)
                                            ({{ ucfirst(\App\Models\SubClass::find($investment->subclass_id)->name) }})

                                        @endisset
                                        {{ $investment->level }}<br>
                                    @endforeach
                                @endisset
                            </p>
                            <a href="{{ url('/character/create/building', $character->id) }}" class="btn btn-primary">Utiliser</a>
                            <a href="{{ url('/character/destroy', $character->id) }}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
