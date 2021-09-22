<?php

namespace Database\Seeders\Classes;

use Illuminate\Database\Seeder;

use App\Models\DndClass;
use App\Models\Description;
use App\Models\DataHandler;
use App\Models\EvolvingNumber;
use App\Models\Feature;
use App\Models\FeatureChoice;
use App\Models\FeatureList;
use App\Models\HitDice;
use App\Models\ProficiencyList;
use App\Models\SlotList;
use App\Models\SlotListPack;
use App\Models\Spell;
use App\Models\Spellcasting;
use App\Models\SpellList;

class BardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dh = new DataHandler;
        $datas = $dh->decodeJson('classes');

        $cantripsKnownTab = [
            'level_1' => 2,
            'level_2' => 2,
            'level_3' => 2,
            'level_4' => 3,
            'level_5' => 3,
            'level_6' => 3,
            'level_7' => 3,
            'level_8' => 3,
            'level_9' => 3,
            'level_10' => 4,
            'level_11' => 4,
            'level_12' => 4,
            'level_13' => 4,
            'level_14' => 4,
            'level_15' => 4,
            'level_16' => 4,
            'level_17' => 4,
            'level_18' => 4,
            'level_19' => 4,
            'level_20' => 4,
        ];
        $spellsKnownTab = [
            'level_1' => 4,
            'level_2' => 5,
            'level_3' => 6,
            'level_4' => 7,
            'level_5' => 8,
            'level_6' => 9,
            'level_7' => 10,
            'level_8' => 11,
            'level_9' => 12,
            'level_10' => 14,
            'level_11' => 15,
            'level_12' => 15,
            'level_13' => 16,
            'level_14' => 18,
            'level_15' => 19,
            'level_16' => 19,
            'level_17' => 20,
            'level_18' => 22,
            'level_19' => 22,
            'level_20' => 22,
        ];

        $cantripsKnown = EvolvingNumber::create($cantripsKnownTab);
        $spellsKnown = EvolvingNumber::create($spellsKnownTab);
        $proficiencyList = ProficiencyList::create();
        $slotListPack = SlotListPack::create();
        $spellList = SpellList::create();
        $featureList = FeatureList::create();

        $spellcasting = Spellcasting::create([
            'casting_stat' => 'charisma',
            'know_spells' => 1,
            'spell_list_id' => $spellList->id,
            'slot_list_pack_id' => $slotListPack->id,
            'cantrips_known_count_id' => $cantripsKnown->id,
            'spells_known_count_id' => $spellsKnown->id,
        ]);

        $class = DndClass::create([
            'name' => 'bard',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'sub_class_obtention_level' => 3,
            'hitdice' => 8,
            'proficiency_list_id' => $proficiencyList->id,
            'feature_list_id' => $featureList->id,
            'spellcasting_id' => $spellcasting->id,
        ]);
        $className = $class->name;

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
