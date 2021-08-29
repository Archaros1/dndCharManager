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

class MulticlassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // multiclass slot list pack
        $slotListPack = SlotListPack::create();
        SlotListPack::$multiclassSlotListId = $slotListPack->id;

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
