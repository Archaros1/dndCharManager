@extends('character.mobile.features')

@section('case')
    <div class="case container mt-1" id="spellManager">
        <div class="row">
            <div class="col text-center">
                <h5>SPELL SLOTS</h5>
            </div>
        </div>
        <div class="row" id="slotsCounter">
            @for ($i = 1; $i <= 9; $i++)
                @if ($slots['level_'.$i] !== 0)
                    <div class="col-2 text-center p-0">
                        <div class="card w-100">
                            <div class="card-body p-0">
                                <h5 class="card-title">{{ $i }}</h5>
                                <p class="card-text">{{ $actualSlots['level_'.$i] }}/{{ $slots['level_'.$i] }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
        </div>
        <div class="row">
            <div class="col text-center">
                <h5>SORTS</h5>
            </div>
        </div>
        <div class="row">
            @foreach ($spells as $spellLevel)
                <div class="row mx-0">
                    <h5 class="mt-2">Niveau {{ $spellLevel[0]->level }}</h5>
                </div>
                @foreach ($spellLevel as $spell)
                    <div class="row form-control display-flex mt-2 mx-0" id="{{ 'spellBar_'.$spell->id }}">
                        <div class="col-2 p-0">
                            @if ($spellLevel[0]->level != 0)
                                <a href="{{ url('/character/'.$character->id.'/cast/'.$spell->id) }}" class="btn btn-danger w-100 h-100 p-0">Cast</a>
                            @endif
                        </div>
                        <div class="col">
                            <span class="ml-1">{{ $spell->display_name }}</span>
                        </div>
                        <div class="col-1 p-0">
                            <img src="{{ asset('/icons/plus.svg') }}" alt="+" id="{{ 'spellInfo_'.$spell->id }}" class="">
                        </div>
                    </div>
                    <div class="row nice-border w-100 mx-0" id="{{ 'spellDesc_'.$spell->id }}" style="display: none">
                        <div class="col-6">
                            <div class="row pl-1">
                                @if ($spell->level == 0)
                                    Niveau : Cantrip
                                @else
                                    Niveau {{ $spell->level }}
                                @endif
                            </div>
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
        </div>
    </div>
@endsection
