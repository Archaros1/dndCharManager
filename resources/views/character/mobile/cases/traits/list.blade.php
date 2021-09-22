@extends('character.mobile.features')

@section('case')
    <div class="case container mt-1" id="traitsCase">
        @foreach ($character->traits() as $trait)
            <div class="row form-control display-flex mt-2 mx-0" id="{{ 'traitBar_'.$trait->id }}">
                <div class="col-1 p-0">
                </div>
                <div class="col">
                    <span class="ml-1">{{ $trait->display_name }}</span>
                </div>
                <div class="col-1 p-0">
                    <img src="{{ asset('/icons/plus.svg') }}" alt="+" id="{{ 'traitInfo_'.$trait->id }}" class="">
                </div>
            </div>
            <div class="row nice-border w-100 mx-0" id="{{ 'traitDesc_'.$trait->id }}" style="display: none">
                <div class="col-12">
                    <p class="description text-justify">
                        {!! $trait->description->text !!}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
