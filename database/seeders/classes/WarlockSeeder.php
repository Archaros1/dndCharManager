<?php

namespace Database\Seeders\Classes;

use Illuminate\Database\Seeder;

use App\Models\DndClass;
use App\Models\Description;
use App\Models\EvolvingNumber;
use App\Models\Feature;
use App\Models\FeatureList;
use App\Models\HitDice;
use App\Models\ProficiencyList;
use App\Models\SlotList;
use App\Models\SlotListPack;
use App\Models\Spellcasting;
use App\Models\SpellList;

class WarlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // WARLOCK
        $proficiencyList = ProficiencyList::create();
        $spellList = SpellList::create();
        $featureList = FeatureList::create();

        $spellcasting = Spellcasting::create([
            'casting_stat' => 'charisma',
            'know_spells' => 1,
            'spell_list_id' => $spellList->id,
        ]);

        DndClass::create([
            'name' => 'warlock',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'sub_class_obtention_level' => 1,
            'hitdice' => 8,
            'proficiency_list_id' => $proficiencyList->id,
            'feature_list_id' => $featureList->id,
            'spellcasting_id' => $spellcasting->id,
        ]);
    }
}
