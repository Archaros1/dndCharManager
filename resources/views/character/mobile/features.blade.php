@extends('character.mobile.show')

@section('tab')
    <div class="row" id="tabBar">
        <a href="{{ url('/character/show/' . $character->id . '/features/actions') }}" class="text-center col border btn" id="tabActions">ACTIONS</a>
        <a href="{{ url('/character/show/' . $character->id . '/features/spells') }}" class="text-center col border btn" id="tabSpells">SPELLS</a>
        <a href="{{ url('/character/show/' . $character->id . '/features/traits') }}" class="text-center col border btn" id="tabTraits">TRAITS</a>
    </div>
    @yield('case')
@endsection
