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

class BarbarianFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'barbarian');
        $className = $class->name;

        // RAGE
        $featureName = 'Rage';
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
            'is_action' => 1,
            'duration' => '1 minute',
            'activation_time' => '1 action bonus',
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

        // Reckless Attack
        $featureName = 'Reckless Attack';
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

        // Danger Sense
        $featureName = 'Danger Sense';
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

        // Fast Movement
        $featureName = 'Fast Movement';
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

        // Feral Instinct
        $featureName = 'Feral Instinct';
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

        // Brutal Critical
        $featureName = 'Brutal Critical';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 9,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Relentless Rage
        $featureName = 'Relentless Rage';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $$descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 11,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Persistent Rage
        $featureName = 'Persistent Rage';
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

        // Indomitable Might
        $featureName = 'Indomitable Might';
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
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Primal Champion
        $featureName = 'Primal Champion';
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
