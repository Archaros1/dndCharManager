@extends('character.mobile.show')

@section('tab')
    <div class="row" id="tabBar">
        <div class="text-center col border btn" id="tabActions">ACTIONS</div>
        <div class="text-center col border btn" id="tabSpells">SPELLS</div>
        <div class="text-center col border btn" id="tabTraits">TRAITS</div>
    </div>
    @include('character.mobile.cases.actions')
    @include('character.mobile.cases.spells')
@endsection
