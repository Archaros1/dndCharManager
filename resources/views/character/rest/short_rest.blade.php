<div class="container mt-3 nice-border pb-2" id="shortRestForm">
    <div class="row mx-0">
        <p>Si vous décidez de prendre un repos court (de minimum 1h), vous pouvez utiliser vos dés de vie pour
            régénérer vos points de vie.</p>
    </div>
    @foreach ($hitdicesSelect as $key => $hitdice)
        <div class="row mx-0">
            {{ Form::label('HDNumber_' . $key, 'Nombre de dés à ' . $key . ' faces lancés') }}
            {{ Form::select('HDNumber_' . $key, $hitdice, 0, $attributes = ['class' => 'ml-3', 'required' => '']) }}
        </div>
    @endforeach
    <div class="row mx-0">
        <p>Vous pouvez maintenant faire vos jets avec les dés que vous avez sélectionné, et y inscrire la somme totale dans le champs ci-dessous.</p>
    </div>
    <div class="row mx-0">
        {{ Form::number('totalRegainHP', 0, $attributes = ['class' => ' form-control', 'required' => '']) }}
    </div>

</div>
