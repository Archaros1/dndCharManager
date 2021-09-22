<?php

namespace Database\Seeders\Classes\Features;

use Illuminate\Database\Seeder;

use App\Models\DndClass;
use App\Models\DataHandler;

class RangerFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'ranger');
        $className = $class->name;

        $featureName = 'Favored Enemy';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Natural Explorer';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Fighting Style';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => 'fighting style ranger',
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Spellcasting';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => 'spellcasting ranger',
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Primeval Awareness';
        $dh->createFeature($datas, $class, [
            'level' => 3,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = "Land’s Stride";
        $dh->createFeature($datas, $class, [
            'level' => 8,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Hide in Plain Sight';
        $dh->createFeature($datas, $class, [
            'level' => 10,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Vanish';
        $dh->createFeature($datas, $class, [
            'level' => 14,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Feral Senses';
        $dh->createFeature($datas, $class, [
            'level' => 18,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Foe Slayer';
        $dh->createFeature($datas, $class, [
            'level' => 20,
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
