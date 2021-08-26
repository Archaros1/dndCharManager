<div class="case" id="spellsCase">
    @if ($character->hasSpellsPrepared())
        @include('character.mobile.cases.spells.manager')
    @else
        @include('character.mobile.cases.spells.prepare')
    @endif
</div>
