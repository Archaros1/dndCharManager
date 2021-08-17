<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Description;
use App\Models\DndClass;
use App\Models\Feature;
use App\Models\FeatureChoice;
use App\Models\FeatureList;
use App\Models\Race;
use App\Models\SpellList;
use App\Models\StatPack;
use App\Models\SubRace;
use Symfony\Component\Console\Descriptor\Descriptor;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 2,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        Race::create([
            'name' => 'dwarf',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id
        ]);

        // elf
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 2,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        $featureList = FeatureList::create();

        $race = Race::create([
            'name' => 'elf',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 1,
            'charisma' => 0,
        ]);

        SubRace::create([
            'name' => 'wood elf',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'race_id' => $race->id,
            'stat_modif_id' => $stats->id,
        ]);

        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 1,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        //high elf
        $featureList = FeatureList::create();

        $feature = Feature::create([
            'name' => 'cantrip',
            'display_name' => 'Cantrip',
            'has_choice' => 1,
            'is_custom' => 0,
            'feature_list_id' => $featureList->id,
        ]);

        $wizardCantrips = DndClass::where('name', '=', 'wizard')->first()->spellsLevelN(0);

        foreach ($wizardCantrips as $key => $cantrip) {
            $spellList = SpellList::create();
            $cantrip->spellLists()->attach($spellList);
            $cantrip->save();

            FeatureChoice::create([
                'is_spellcasting' => 1,
                'casting_stat' => 'intelligence',
                'name' => $cantrip->name,
                'display_name' => $cantrip->name,
                'is_custom' => 0,
                'feature_id' => $feature->id,
                'spell_list_id' => $spellList->id,
            ]);
        }

        SubRace::create([
            'name' => 'high elf',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'race_id' => $race->id,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        // halfling
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 2,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        Race::create([
            'name' => 'halfling',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
        ]);

        // human
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        Race::create([
            'name' => 'human',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
        ]);

        // dragonborn
        $stats = StatPack::create([
            'strength' => 2,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 1,
        ]);

        Race::create([
            'name' => 'dragonborn',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
        ]);

        // gnome
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 2,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        Race::create([
            'name' => 'gnome',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
        ]);

        // half-elf
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 2,
        ]);

        Race::create([
            'name' => 'half-elf',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
        ]);

        // half-orc
        $stats = StatPack::create([
            'strength' => 2,
            'dexterity' => 0,
            'constitution' => 1,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        Race::create([
            'name' => 'half-orc',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
        ]);

        // tiefling
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 1,
            'wisdom' => 0,
            'charisma' => 2,
        ]);

        Race::create([
            'name' => 'tiefling',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
        ]);
    }
}
