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
            classes\WizardSeeder::class,
        ]);

        // DRUID
        $proficiencyList = ProficiencyList::create();
        $spellList = SpellList::create();
        $featureList = FeatureList::create();

        $spellcasting = Spellcasting::create([
            'casting_stat' => 'wisdom',
            'prepare_spells' => 1,
            'spell_list_id' => $spellList->id,
        ]);

        DndClass::create([
            'name' => 'druid',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'sub_class_obtention_level' => 2,
            'hitdice' => 8,
            'proficiency_list_id' => $proficiencyList->id,
            'feature_list_id' => $featureList->id,
            'spellcasting_id' => $spellcasting->id,
        ]);

        // FIGHTER
        $proficiencyList = ProficiencyList::create();
        $featureList = FeatureList::create();
        DndClass::create([
            'name' => 'fighter',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'sub_class_obtention_level' => 3,
            'hitdice' => 10,
            'proficiency_list_id' => $proficiencyList->id,
            'feature_list_id' => $featureList->id,
        ]);

        // MONK
        $proficiencyList = ProficiencyList::create();
        $featureList = FeatureList::create();
        DndClass::create([
            'name' => 'monk',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'sub_class_obtention_level' => 3,
            'hitdice' => 8,
            'proficiency_list_id' => $proficiencyList->id,
            'feature_list_id' => $featureList->id,
        ]);

        // PALADIN
        $proficiencyList = ProficiencyList::create();
        $featureList = FeatureList::create();

        $spellcasting = Spellcasting::create([
            'casting_stat' => 'charisma',
            'prepare_spells' => 1,
            'spell_list_id' => $spellList->id,
        ]);

        DndClass::create([
            'name' => 'paladin',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'sub_class_obtention_level' => 3,
            'hitdice' => 10,
            'proficiency_list_id' => $proficiencyList->id,
            'feature_list_id' => $featureList->id,
            'spellcasting_id' => $spellcasting->id,
        ]);

        // RANGER
        $proficiencyList = ProficiencyList::create();
        $spellList = SpellList::create();
        $featureList = FeatureList::create();

        $spellcasting = Spellcasting::create([
            'casting_stat' => 'wisdom',
            'know_spells' => 1,
            'spell_list_id' => $spellList->id,
        ]);

        DndClass::create([
            'name' => 'ranger',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'sub_class_obtention_level' => 3,
            'hitdice' => 10,
            'proficiency_list_id' => $proficiencyList->id,
            'feature_list_id' => $featureList->id,
            'spellcasting_id' => $spellcasting->id,
        ]);

        // ROGUE
        $proficiencyList = ProficiencyList::create();
        $featureList = FeatureList::create();
        DndClass::create([
            'name' => 'rogue',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'sub_class_obtention_level' => 3,
            'hitdice' => 8,
            'proficiency_list_id' => $proficiencyList->id,
            'feature_list_id' => $featureList->id,
        ]);

        // SORCERER
        $proficiencyList = ProficiencyList::create();
        $spellList = SpellList::create();
        $featureList = FeatureList::create();

        $spellcasting = Spellcasting::create([
            'casting_stat' => 'charisma',
            'know_spells' => 1,
            'spell_list_id' => $spellList->id,
        ]);

        DndClass::create([
            'name' => 'sorcerer',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'sub_class_obtention_level' => 1,
            'hitdice' => 6,
            'proficiency_list_id' => $proficiencyList->id,
            'feature_list_id' => $featureList->id,
            'spellcasting_id' => $spellcasting->id,
        ]);

        // WARLOCK
        $proficiencyList = ProficiencyList::create();
        $spellList = SpellList::create();
        $featureList = FeatureList::create();

        $spellcasting = Spellcasting::create([
            'casting_stat' => 'charisma',
            'know_spells' => 1,
            'spell_list_id' => $spellList->id,
        ]);

        DndClass::create([
            'name' => 'warlock',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'sub_class_obtention_level' => 1,
            'hitdice' => 8,
            'proficiency_list_id' => $proficiencyList->id,
            'feature_list_id' => $featureList->id,
            'spellcasting_id' => $spellcasting->id,
        ]);
    }
}
