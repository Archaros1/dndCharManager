<?php

namespace Database\Seeders\Classes\Features;

use Illuminate\Database\Seeder;

use App\Models\DndClass;
use App\Models\DataHandler;

class WizardFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'wizard');
        $className = $class->name;

        $featureName = 'Spellcasting';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => 'spellcasting wizard',
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Arcane Recovery';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Spell Mastery';
        $dh->createFeature($datas, $class, [
            'level' => 3,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Signature Spells';
        $dh->createFeature($datas, $class, [
            'level' => 20,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);
    }
}
