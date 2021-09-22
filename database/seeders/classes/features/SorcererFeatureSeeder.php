<?php

namespace Database\Seeders\Classes\Features;

use Illuminate\Database\Seeder;

use App\Models\DndClass;
use App\Models\DataHandler;

class SorcererFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'sorcerer');
        $className = $class->name;

        $featureName = 'Spellcasting';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => 'spellcasting sorcerer',
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Font of Magic';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Metamagic';
        $dh->createFeature($datas, $class, [
            'level' => 3,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'has_choice' => 1,
            'selected_choice_amount' => 2,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Sorcerous Restoration';
        $dh->createFeature($datas, $class, [
            'level' => 20,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);
    }
}
