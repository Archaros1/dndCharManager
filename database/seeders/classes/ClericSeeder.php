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

class ClericSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CLERIC
        $cantripsKnownTab = [
            'level_1' => 3,
            'level_2' => 3,
            'level_3' => 3,
            'level_4' => 4,
            'level_5' => 4,
            'level_6' => 4,
            'level_7' => 4,
            'level_8' => 4,
            'level_9' => 4,
            'level_10' => 5,
            'level_11' => 5,
            'level_12' => 5,
            'level_13' => 5,
            'level_14' => 5,
            'level_15' => 5,
            'level_16' => 5,
            'level_17' => 5,
            'level_18' => 5,
            'level_19' => 5,
            'level_20' => 5,
        ];

        $cantripsKnown = EvolvingNumber::create($cantripsKnownTab);
        $proficiencyList = ProficiencyList::create();
        $spellList = SpellList::create();
        $slotListPack = SlotListPack::create();
        $featureList = FeatureList::create();

        $spellcasting = Spellcasting::create([
            'casting_stat' => 'wisdom',
            'prepare_spells' => 1,
            'spell_list_id' => $spellList->id,
            'slot_list_pack_id' => $slotListPack->id,
            'cantrips_known_count_id' => $cantripsKnown->id,
        ]);

        DndClass::create([
            'name' => 'cleric',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'sub_class_obtention_level' => 1,
            'hitdice' => 8,
            'proficiency_list_id' => $proficiencyList->id,
            'feature_list_id' => $featureList->id,
            'spellcasting_id' => $spellcasting->id,
        ]);

        $slotLists = [
            [
                'level_1' => 2,
            ],
            [
                'level_1' => 3,
            ],
            [
                'level_1' => 4,
                'level_2' => 2,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 2,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 1,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 2,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 1,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 2,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 2,
                'level_6' => 1,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 2,
                'level_6' => 1,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 2,
                'level_6' => 1,
                'level_7' => 1,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 2,
                'level_6' => 1,
                'level_7' => 1,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 2,
                'level_6' => 1,
                'level_7' => 1,
                'level_8' => 1,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 2,
                'level_6' => 1,
                'level_7' => 1,
                'level_8' => 1,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 2,
                'level_6' => 1,
                'level_7' => 1,
                'level_8' => 1,
                'level_9' => 1,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 3,
                'level_6' => 1,
                'level_7' => 1,
                'level_8' => 1,
                'level_9' => 1,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 3,
                'level_6' => 2,
                'level_7' => 1,
                'level_8' => 1,
                'level_9' => 1,
            ],
            [
                'level_1' => 4,
                'level_2' => 3,
                'level_3' => 3,
                'level_4' => 3,
                'level_5' => 3,
                'level_6' => 2,
                'level_7' => 2,
                'level_8' => 1,
                'level_9' => 1,
            ],

        ];

        foreach ($slotLists as $key => $slotList) {
            SlotList::create([
                'class_level' => $key + 1,
                'level_1' => $slotList['level_1'] ?? 0,
                'level_2' => $slotList['level_2'] ?? 0,
                'level_3' => $slotList['level_3'] ?? 0,
                'level_4' => $slotList['level_4'] ?? 0,
                'level_5' => $slotList['level_5'] ?? 0,
                'level_6' => $slotList['level_6'] ?? 0,
                'level_7' => $slotList['level_7'] ?? 0,
                'level_8' => $slotList['level_8'] ?? 0,
                'level_9' => $slotList['level_9'] ?? 0,
                'owner_id' => $slotListPack->id,
            ]);
        }
    }
}
