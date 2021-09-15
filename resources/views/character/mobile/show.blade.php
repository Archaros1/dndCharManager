@extends('layouts.app_mobile')

@section('content')
    <div class="container mb-1">
        <div class="row" id="tabBar">
            <a href="{{ url('/character/show/' . $character->id . '/main') }}" class="col border">
                <div class="text-center" id="tabMain">STATS</div>
            </a>
            <a href="{{ url('/character/show/' . $character->id . '/features/actions') }}" class="col border">
                <div class="text-center" id="tabFeatures">FEATURES</div>
            </a>
            <a href="{{ url('/character/show/' . $character->id . '/inventory') }}" class="col border">
                <div class="text-center" id="tabInventory">SAC</div>
            </a>
        </div>
    </div>
    <div class="container ">
        @yield('tab')
    </div>
@endsection
