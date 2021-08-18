@extends('layouts.app_mobile')

@section('content')
    <div class="container">
        <div class="row" id="tabBar">
            <a href="" class="col"><div class="text-center" id="tabMain">STATS</div></a>
            <a href="" class="col"><div class="text-center" id="tabMagic">MAGIE</div></a>
            <a href="" class="col"><div class="text-center" id="tabInventory">SAC</div></a>
        </div>
        @yield('tab')
    </div>
@endsection
