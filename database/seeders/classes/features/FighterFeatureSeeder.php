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

class FighterFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'fighter');
        $className = $class->name;

        $featureName = 'Fighting Style';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Second Wind';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'is_action' => 1,
            'activation_time' => '1 action bonus',
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Action Surge';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'is_action' => 1,
            'activation_time' => '1 action libre',
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Indomitable';
        $dh->createFeature($datas, $class, [
            'level' => 9,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'is_action' => 1,
            'activation_time' => '1 action libre',
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);
    }
}
