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

class ClericFeatureSeeder extends Seeder
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

        $class = DndClass::firstWhere('name', '=', 'cleric');
        $className = $class->name;

        $featureName = 'Spellcasting';
        $dh->createFeature($datas, $class, [
            'level' => 1,
            'name' => 'spellcasting cleric',
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Channel Divinity';
        $dh->createFeature($datas, $class, [
            'level' => 2,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Destroy Undead';
        $dh->createFeature($datas, $class, [
            'level' => 5,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);

        $featureName = 'Divine Intervention';
        $dh->createFeature($datas, $class, [
            'level' => 10,
            'name' => strtolower($featureName),
            'display_name' => $featureName,
            'is_action' => 1,
            'displayed_in_ui' => 1,
            'is_custom' => 0,
        ]);
    }
}
