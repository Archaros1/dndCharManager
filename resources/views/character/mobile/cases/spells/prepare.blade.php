@extends('character.mobile.features')

@section('case')
    <div class="case container mt-1" id="spellPrepare">
        <h5>Vous n'avez pas préparé tous vos sorts !</h5>
        <p>Veuillez sélectionner <b>{{ $investment->preparedSpellsCount() }}</b> sorts pour votre classe <b>{{ ucwords($investment->class->name) }}</b>. Vous ne pourrez utiliser que ces sorts jusqu'à votre prochain long repos.</p>

        <form action="{{ url("/character/store/prepare/spells") }}/{{$character->id}}" method="post" accept-charset="UTF-8">
        @csrf

        <div class="row">
            {{ Form::submit("Préparer ces sorts", $attributes = ['class' => 'form-control btn btn-success mb-2']) }}
        </div>

        @foreach ($spells as $spellLevel)
            <div class="row">
                <h5 class="mt-2">Sorts de niveau {{ $spellLevel[0]->level }}</h5>
            </div>
            @foreach ($spellLevel as $spell)
            <div class="row form-control display-flex mt-2" id="{{ 'spellBar_'.$spell->id }}">
                <div class="col">
                    {{ Form::checkbox('spell_' . $spell->id, true, false, $attributes = ['class' => '']) }}
                    <span class="ml-1">{{ $spell->display_name }}</span>
                </div>
                <div class="col-1 p-0">
                    <img src="{{ asset('/icons/plus.svg') }}" alt="+" id="{{ 'spellInfo_'.$spell->id }}" class="">
                </div>
            </div>
            <div class="row nice-border w-100" id="{{ 'spellDesc_'.$spell->id }}" style="display: none">
                <div class="col-6">
                    <div class="row pl-1">Niveau {{ $spell->level }}</div>
                    <div class="row pl-1">Portée : {{ $spell->range,  }}</div>
                    <div class="row pl-1">Durée : {{ $spell->duration,  }}</div>
                    <div class="row pl-1">
                        @if ($spell->has_saving_throw)
                            JdS : {{ strtoupper(substr($spell->saving_throw_attribute, 0, 3)) }} {{ $investment->spellDC() }}
                        @elseif ($spell->is_spell_attack)
                            Attaque : {{ $investment->spellAttackModifier() }}
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">Incantation : {{ $spell->casting_time }}</div>
                    <div class="row">Composants : {{ $spell->components }}</div>
                    <div class="row">Ecole : {{ $spell->school }}</div>
                </div>
                <div class="col-12">
                    <p class="description text-justify">
                        {!! $spell->description->text !!}
                    </p>
                </div>
            </div>
            @endforeach
        @endforeach
        <div class="row">
            {{ Form::submit("Préparer ces sorts", $attributes = ['class' => 'form-control btn btn-success mt-2']) }}
        </div>
        {{ Form::close() }}
    </div>
@endsection
