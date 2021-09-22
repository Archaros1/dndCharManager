@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                @isset($class)
                    <div class="row h2">{{ ucwords($class->name)."'s spells" }}</div>
                @endisset
                @foreach ($spells as $spell)
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-4">
                                    <h5 class="card-title mb-0">{{ $spell->display_name }}</h5>
                                </div>
                                <div class="col">
                                    <h5>{{ $spell->level > 0 ? 'Niveau ' . $spell->level : 'Cantrip' }}</h5>
                                </div>
                                <div class="col">
                                    <h5>{{ $spell->casting_time }}</h5>
                                </div>
                                <div class="col">
                                    <h5>{{ $spell->duration }}</h5>
                                </div>
                                <div class="col">
                                    <h5>{{ ucwords($spell->has_saving_throw ? $spell->saving_throw_attribute : ($spell->is_spell_attack ? $spell->attack_type : null)) }}
                                    </h5>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text card-text-height-limit mb-0">{{ $spell->description->text }}</p>
                            <a href="#" class="btn btn-primary">Détails</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
