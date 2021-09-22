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

class DndClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            classes\MulticlassSeeder::class,
            classes\ArtificerSeeder::class,
            classes\BarbarianSeeder::class,
            classes\BardSeeder::class,
            classes\ClericSeeder::class,
            classes\DruidSeeder::class,
            classes\FighterSeeder::class,
            classes\MonkSeeder::class,
            classes\PaladinSeeder::class,
            classes\RangerSeeder::class,
            classes\RogueSeeder::class,
            classes\SorcererSeeder::class,
            classes\WarlockSeeder::class,
            classes\WizardSeeder::class,
        ]);
    }
}
