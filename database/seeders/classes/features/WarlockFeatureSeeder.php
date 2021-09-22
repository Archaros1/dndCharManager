<?php

namespace Database\Seeders\Classes\Features;

use Illuminate\Database\Seeder;

use App\Models\DndClass;
use App\Models\DataHandler;

class WarlockFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'warlock');
        $className = $class->name;

        $featureName = 'Pact Magic';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => 'spellcasting warlock',
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Eldritch Invocations';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => strtolower($featureName),
            'has_choice' => 1,
            'selected_choice_amount' => 2,
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Pact Boon';
        $dh->createFeature($datas, $class, [
            'level' => 3,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'has_choice' => 1,
            'selected_choice_amount' => 1,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Mystic Arcanum';
        $dh->createFeature($datas, $class, [
            'level' => 11,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Eldritch Master';
        $dh->createFeature($datas, $class, [
            'level' => 20,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);
    }
}
