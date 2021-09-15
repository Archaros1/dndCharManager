<?php

namespace Database\Seeders\Classes\Features;

use Illuminate\Database\Seeder;

use App\Models\DndClass;
use App\Models\Description;
use App\Models\DataHandler;
use App\Models\EvolvingNumber;
use App\Models\Feature;
use App\Models\FeatureList;
use App\Models\SlotList;
use App\Models\SlotListPack;
use App\Models\Spellcasting;
use App\Models\SpellList;

class MonkFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'monk');
        $className = $class->name;

        // Martial Arts
        $featureName = 'Martial Arts';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 1,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Unarmored Defense
        $featureName = 'Unarmored Defense';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 1,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Ki
        $featureName = 'Ki';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 2,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Unarmored Movement
        $featureName = 'Unarmored Movement';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 2,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Deflect Missiles
        $featureName = 'Deflect Missiles';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 3,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Slow Fall
        $featureName = 'Slow Fall';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 4,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'is_action' => 1,
            'activation_time' => '1 reaction',
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Stunning Strike
        $featureName = 'Stunning Strike';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 5,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Ki-Empowered Strikes
        $featureName = 'Ki-Empowered Strikes';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 6,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Evasion
        $featureName = 'Evasion';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 7,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Stillness of Mind
        $featureName = 'Stillness of Mind';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 7,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'is_action' => 1,
            'activation_time' => '1 action',
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Tongue of the Sun and Moon
        $featureName = 'Tongue of the Sun and Moon';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 13,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Diamond Soul
        $featureName = 'Diamond Soul';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 14,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Timeless Body
        $featureName = 'Timeless Body';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 15,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Empty Body
        $featureName = 'Empty Body';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 18,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'is_action' => 1,
            'activation_time' => '1 action',
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Perfect Self
        $featureName = 'Perfect Self';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 20,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);
    }
}
