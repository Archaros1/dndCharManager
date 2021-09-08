<?php

namespace Database\Seeders;

use App\Models\DndClass;
use App\Models\Description;
use App\Models\EvolvingNumber;
use App\Models\Feature;
use App\Models\FeatureList;
use App\Models\HitDice;
use App\Models\ProficiencyList;
use App\Models\SlotList;
use App\Models\SlotListPack;
use App\Models\Spellcasting;
use App\Models\SpellList;
use Illuminate\Database\Seeder;

class ClassFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // classes\features\ArtificerFeatureSeeder::class,
            classes\features\BarbarianFeatureSeeder::class,
            classes\features\BardFeatureSeeder::class,
            classes\features\ClericFeatureSeeder::class,
            // classes\features\DruidFeatureSeeder::class,
            // classes\features\FighterFeatureSeeder::class,
            // classes\features\MonkFeatureSeeder::class,
            // classes\features\PaladinFeatureSeeder::class,
            // classes\features\RangerFeatureSeeder::class,
            // classes\features\RogueFeatureSeeder::class,
            // classes\features\SorcererFeatureSeeder::class,
            // classes\features\WarlockFeatureSeeder::class,
            // classes\features\WizardFeatureSeeder::class,
        ]);
    }
}
