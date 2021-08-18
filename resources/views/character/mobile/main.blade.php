@extends('character.mobile.show')

@section('tab')
    <div class="row text-center font-weight-bold">
        <div class="col-3">
            <img src="{{ asset('/icons/fire.svg') }}" alt="" id="rest" class="" title="Short and long rest">
        </div>
        <div class="col-6 px-0 size-text-4"><span class="size-text-3">{{ $character->name }}</span><br>Niveau
            {{ $character->level }}</div>
        <div class="col-3 px-0 size-text-4">{{ $actualCharacter->left_health }}/{{ $character->health }}<br>PV</div>
    </div>
    <div class="row mt-2 text-center size-text-3">
        <div class="col-3">+{{ $character->proficiencyBonus() }}</div>
        <div class="col-3">9m</div>
        <div class="col-3">+{{ $character->getModifier('dexterity') }}</div>
        <div class="col-3">{{ $character->ArmorClass() }}</div>
    </div>
    <div class="row text-center font-weight-bold size-text-6">
        <div class="col-3">BON. DE MAITRISE</div>
        <div class="col-3">VIT. DE MARCHE</div>
        <div class="col-3">INITIATIVE</div>
        <div class="col-3">CLASSE D'ARMURE</div>
    </div>
    <div class="row size-text-4 font-weight-bold mt-2">
        <div class="col text-center ">
            STATISTIQUES
        </div>
    </div>
    <div class="row size-text-5 font-weight-bold mt-2">
        <div class="col-4 border border-str">
            <div class="row">
                <div class="col statName">FORCE</div>
            </div>
            <div class="row">
                <div class="col statModifier">+{{ $character->getModifier('strength') }}</div>
            </div>
            <div class="row">
                <div class="col statFlat">{{ $character->finalStatPack->strength }}</div>
            </div>
        </div>
        <div class="col-4 border border-dex">
            <div class="row">
                <div class="col statName">DEXTERITÉ</div>
            </div>
            <div class="row">
                <div class="col statModifier">+{{ $character->getModifier('dexterity') }}</div>
            </div>
            <div class="row">
                <div class="col statFlat">{{ $character->finalStatPack->dexterity }}</div>
            </div>
        </div>
        <div class="col-4 border border-con">
            <div class="row">
                <div class="col statName">CONSTITUTION</div>
            </div>
            <div class="row">
                <div class="col statModifier">+{{ $character->getModifier('constitution') }}</div>
            </div>
            <div class="row">
                <div class="col statFlat">{{ $character->finalStatPack->constitution }}</div>
            </div>
        </div>
        <div class="col-4 border border-int">
            <div class="row">
                <div class="col statName">INTELLIGENCE</div>
            </div>
            <div class="row">
                <div class="col statModifier">+{{ $character->getModifier('intelligence') }}</div>
            </div>
            <div class="row">
                <div class="col statFlat">{{ $character->finalStatPack->intelligence }}</div>
            </div>
        </div>
        <div class="col-4 border border-wis">
            <div class="row">
                <div class="col statName">SAGESSE</div>
            </div>
            <div class="row">
                <div class="col statModifier">+{{ $character->getModifier('wisdom') }}</div>
            </div>
            <div class="row">
                <div class="col statFlat">{{ $character->finalStatPack->wisdom }}</div>
            </div>
        </div>
        <div class="col-4 border border-cha">
            <div class="row">
                <div class="col statName">CHARISME</div>
            </div>
            <div class="row">
                <div class="col statModifier">+{{ $character->getModifier('charisma') }}</div>
            </div>
            <div class="row">
                <div class="col statFlat">{{ $character->finalStatPack->charisma }}</div>
            </div>
        </div>

    </div>

    <div class="row size-text-4 font-weight-bold mt-2">
        <div class="col text-center">
            JETS DE SAUVEGARDES
        </div>
    </div>
    <div class="row size-text-5-5 font-weight-bold mt-2">
        <div class="col-6">
            <div class="row">
                <div class="col-8 text-right px-0">FORCE</div>
                <div class="col-2 text-right px-0">+{{ $character->getModifier('strength') }}</div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-8 text-right px-0">DEXTERITÉ</div>
                <div class="col-2 text-right px-0">+{{ $character->getModifier('dexterity') }}</div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-8 text-right px-0">CONSTITUTION</div>
                <div class="col-2 text-right px-0">+{{ $character->getModifier('constitution') }}</div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-8 text-right px-0">INTELLIGENCE</div>
                <div class="col-2 text-right px-0">+{{ $character->getModifier('intelligence') }}</div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-8 text-right px-0">SAGESSE</div>
                <div class="col-2 text-right px-0">+{{ $character->getModifier('wisdom') }}</div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-8 text-right px-0">CHARISME</div>
                <div class="col-2 text-right px-0">+{{ $character->getModifier('charisma') }}</div>
            </div>
        </div>

    </div>
@endsection
