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

class BardFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'bard');
        $className = $class->name;

        $featureName = 'Spellcasting';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => 'spellcasting bard',
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Bardic Inspiration';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'is_action' => 1,
            'duration' => '10 minutes',
            'activation_time' => '1 action bonus',
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Jack of All Trades';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Song of Rest';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Font of Inspiration';
        $dh->createFeature($datas, $class, [
            'level' => 5,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Countercharm';
        $dh->createFeature($datas, $class, [
            'level' => 6,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'is_action' => 1,
            'duration' => '1 tour',
            'activation_time' => '1 action',
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Magical Secrets';
        $dh->createFeature($datas, $class, [
            'level' => 10,
            'name' => 'magical secrets lvl 10',
            'display_name' => $featureName,
            'has_choice' => 1,
            'has_generated_choices' => 1,
            'selected_choice_amount' => 2,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Magical Secrets';
        $dh->createFeature($datas, $class, [
            'level' => 14,
            'name' => 'magical secrets lvl 14',
            'display_name' => $featureName,
            'has_choice' => 1,
            'has_generated_choices' => 1,
            'selected_choice_amount' => 2,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Magical Secrets';
        $dh->createFeature($datas, $class, [
            'level' => 18,
            'name' => 'magical secrets lvl 18',
            'display_name' => $featureName,
            'has_choice' => 1,
            'has_generated_choices' => 1,
            'selected_choice_amount' => 2,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Superior Inspiration';
        $dh->createFeature($datas, $class, [
            'level' => 20,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);
    }
}
