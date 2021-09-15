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

class DruidFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'druid');
        $className = $class->name;

        // Druidic
        $featureName = 'Druidic';
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

        // Spellcasting
        $featureName = 'Spellcasting';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        Feature::create([
            'level' => 1,
            'name' => 'spellcasting druid',
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Wild Shape
        $featureName = 'Wild Shape';
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
            'is_action' => 1,
            'duration' => '1 heure/niveau druide',
            'activation_time' => '1 action',
            'displayed_in_ui' => 1,
            'is_custom' => 0,
            'feature_list_id' => $class->feature_list_id,
            'description_id' => $description->id,
        ]);

        // Timeless Body
        $featureName = 'Timeless Body';
        echo('Creating feature : '.$featureName. PHP_EOL);
        $descriptionText = $dh->getFeatureDescription($datas, $className, $featureName);
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

        // Beast Spells
        $featureName = 'Beast Spells';
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

        // Archdruid
        $featureName = 'Archdruid';
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
