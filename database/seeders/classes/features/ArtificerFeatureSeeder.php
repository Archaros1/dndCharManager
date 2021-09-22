<?php

namespace Database\Seeders\Classes\Features;

use Illuminate\Database\Seeder;

use App\Models\DndClass;
use App\Models\DataHandler;

class ArtificerFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'artificer');
        $className = $class->name;

        $featureName = 'Magical Tinkering';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'is_action' => 1,
            'activation_time' => '1 action',
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Spellcasting';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => 'spellcasting artificer',
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Infuse Item';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = "The Right Tool for the Job";
        $dh->createFeature($datas, $class, [
            'level' => 3,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Tool Expertise';
        $dh->createFeature($datas, $class, [
            'level' => 6,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Flash of Genius';
        $dh->createFeature($datas, $class, [
            'level' => 7,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Magic Item Adept';
        $dh->createFeature($datas, $class, [
            'level' => 10,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Spell-Storing Item';
        $dh->createFeature($datas, $class, [
            'level' => 11,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Magic Item Savant';
        $dh->createFeature($datas, $class, [
            'level' => 11,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Magic Item Master';
        $dh->createFeature($datas, $class, [
            'level' => 14,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Soul of Artifice';
        $dh->createFeature($datas, $class, [
            'level' => 20,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);
    }
}
