@extends('character.mobile.features')

@section('case')
    <div class="container case" id="actionsCase">
        <div class="row">Actions - Attaques par action : 3151854</div>
        @foreach ($character->actions() as $action)
            <div class="row form-control display-flex mt-2 mx-0" id="{{ 'actionBar_'.$action->id }}">
                <div class="col-1 p-0">
                </div>
                <div class="col">
                    <span class="ml-1">{{ $action->display_name }}</span>
                </div>
                <div class="col-1 p-0">
                    <img src="{{ asset('/icons/plus.svg') }}" alt="+" id="{{ 'actionInfo_'.$action->id }}" class="">
                </div>
            </div>
            <div class="row nice-border w-100 mx-0" id="{{ 'actionDesc_'.$action->id }}" style="display: none">
                <div class="col-12">
                    <p class="description text-justify">
                        {!! $action->description->text !!}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
