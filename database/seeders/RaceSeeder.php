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
        $abilityScores = ['strength', 'dexterity', 'constitution', 'intelligence', 'wisdom', 'charisma'];

        //dwarf
        $featureList = FeatureList::create();
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 2,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        $race = Race::create([
            'name' => 'dwarf',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        //hill dwarf
        $featureList = FeatureList::create();

        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 1,
            'charisma' => 0,
        ]);

        SubRace::create([
            'name' => 'hill dwarf',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'race_id' => $race->id,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        //mountain dwarf
        $featureList = FeatureList::create();

        $stats = StatPack::create([
            'strength' => 2,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        SubRace::create([
            'name' => 'mountain dwarf',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'race_id' => $race->id,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        // elf
        $featureList = FeatureList::create();
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 2,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        $race = Race::create([
            'name' => 'elf',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        //wood elf
        $featureList = FeatureList::create();

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
            'feature_list_id' => $featureList->id,
        ]);

        //high elf
        $featureList = FeatureList::create();
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 1,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

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

        $featureList = FeatureList::create();

        $race = Race::create([
            'name' => 'halfling',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        //lightfoot halfling
        $featureList = FeatureList::create();

        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 1,
        ]);

        SubRace::create([
            'name' => 'lightfoot halfling',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'race_id' => $race->id,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        //stout halfling
        $featureList = FeatureList::create();

        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 1,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        SubRace::create([
            'name' => 'stout halfling',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'race_id' => $race->id,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        // human
        $featureList = FeatureList::create();
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        $race = Race::create([
            'name' => 'human',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        //human +1 to all stats
        $featureList = FeatureList::create();

        $stats = StatPack::create([
            'strength' => 1,
            'dexterity' => 1,
            'constitution' => 1,
            'intelligence' => 1,
            'wisdom' => 1,
            'charisma' => 1,
        ]);

        SubRace::create([
            'name' => 'human (+1 stats)',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'race_id' => $race->id,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        // dragonborn
        $featureList = FeatureList::create();
        $stats = StatPack::create([
            'strength' => 2,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 1,
        ]);

        $race = Race::create([
            'name' => 'dragonborn',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        //black dragonborn
        $featureList = FeatureList::create();

        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        SubRace::create([
            'name' => 'black dragonborn',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'race_id' => $race->id,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        // gnome
        $featureList = FeatureList::create();
        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 2,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        $race = Race::create([
            'name' => 'gnome',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        //forest gnome
        $featureList = FeatureList::create();

        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 1,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        SubRace::create([
            'name' => 'forest gnome',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'race_id' => $race->id,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        //rock gnome
        $featureList = FeatureList::create();

        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 1,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        SubRace::create([
            'name' => 'rock gnome',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'race_id' => $race->id,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        // half-elf
        $featureList = FeatureList::create();
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
            'feature_list_id' => $featureList->id,
        ]);

        $feature = Feature::create([
            'name' => 'ability score increase',
            'display_name' => 'Ability Score Increase',
            'has_choice' => 1,
            'selected_choice_amount' => 2,
            'is_custom' => 0,
            'feature_list_id' => $featureList->id,
        ]);

        foreach ($abilityScores as $key => $scores) {
            $stats = StatPack::create([
                $scores => 1
            ]);

            FeatureChoice::create([
                'name' => $scores,
                'display_name' => ucwords($scores),
                'is_custom' => 0,
                'stat_pack_id' => $stats->id,
                'feature_id' => $feature->id,
            ]);
        }

        // half-orc
        $featureList = FeatureList::create();
        $stats = StatPack::create([
            'strength' => 2,
            'dexterity' => 0,
            'constitution' => 1,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        $race = Race::create([
            'name' => 'half-orc',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
            'feature_list_id' => $featureList->id,
        ]);

        // tiefling
        $featureList = FeatureList::create();
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
            'feature_list_id' => $featureList->id,
        ]);
    }
}
