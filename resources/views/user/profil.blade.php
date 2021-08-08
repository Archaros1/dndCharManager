@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bonjour {{ $user->name }}</h1>
        <div class="row">
            <a href="{{ url('/character/create/basics') }}" class="btn btn-primary" id="new-character">Nouveau personnage</a>
            @if (!empty($user->characters()))
                @foreach ($user->characters() as $character)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the
                                card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
