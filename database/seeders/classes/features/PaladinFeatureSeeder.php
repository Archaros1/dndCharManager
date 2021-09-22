<?php

namespace Database\Seeders\Classes\Features;

use Illuminate\Database\Seeder;

use App\Models\DndClass;
use App\Models\Description;
use App\Models\DataHandler;
use App\Models\EvolvingNumber;
use App\Models\Feature;
use App\Models\FeatureChoice;
use App\Models\FeatureList;
use App\Models\SlotList;
use App\Models\SlotListPack;
use App\Models\Spell;
use App\Models\Spellcasting;
use App\Models\SpellList;

class PaladinFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'paladin');
        $className = $class->name;

        $featureName = 'Divine Sense';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Lay on Hands';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'is_action' => 1,
            'activation_time' => '1 action',
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Fighting Style';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => 'fighting style paladin',
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Spellcasting';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => 'spellcasting paladin',
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Divine Smite';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Divine Health';
        $dh->createFeature($datas, $class, [
            'level' => 3,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Aura of Protection';
        $dh->createFeature($datas, $class, [
            'level' => 6,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Aura of Courage';
        $dh->createFeature($datas, $class, [
            'level' => 6,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Improved Divine Smite';
        $dh->createFeature($datas, $class, [
            'level' => 10,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Cleansing Touch';
        $dh->createFeature($datas, $class, [
            'level' => 14,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'has_choice' => 1,
            'has_generated_choices' => 1,
            'selected_choice_amount' => 2,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);
    }
}
