<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Description;
use App\Models\Race;
use App\Models\StatPack;
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
        // $description = Description::create([
        //     'text' => '',
        //     'is_custom' => 0
        // ]);

        // $stats = StatPack::create([
        //     'strength' => 0,
        //     'dexterity' => 0,
        //     'constitution' => 0,
        //     'intelligence' => 0,
        //     'wisdom' => 0,
        //     'charisma' => 0,
        // ]);

        // Race::create([
        //     'name' => '',
        //     'is_custom' => 0,
        //     'stat_modif_id' => $stats->id,
        //     'description_id' => $description->id,
        // ]);

        //dwarf
        $description = Description::create([
            'text' => '',
            'is_custom' => 0
        ]);

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
            'stat_modif_id' => $stats->id,
            'description_id' => $description->id,
        ]);

        // elf
        $description = Description::create([
            'text' => '',
            'is_custom' => 0
        ]);

        $stats = StatPack::create([
            'strength' => 0,
            'dexterity' => 2,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
        ]);

        Race::create([
            'name' => 'elf',
            'is_custom' => 0,
            'stat_modif_id' => $stats->id,
            'description_id' => $description->id,
        ]);

        // halfling
        $description = Description::create([
            'text' => '',
            'is_custom' => 0
        ]);

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
            'description_id' => $description->id,
        ]);

        // human
        $description = Description::create([
            'text' => '',
            'is_custom' => 0
        ]);

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
            'description_id' => $description->id,
        ]);

        // dragonborn
        $description = Description::create([
            'text' => '',
            'is_custom' => 0
        ]);

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
            'description_id' => $description->id,
        ]);

        // gnome
        $description = Description::create([
            'text' => '',
            'is_custom' => 0
        ]);

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
            'description_id' => $description->id,
        ]);

        // half-elf
        $description = Description::create([
            'text' => '',
            'is_custom' => 0
        ]);

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
            'description_id' => $description->id,
        ]);

        // half-orc
        $description = Description::create([
            'text' => '',
            'is_custom' => 0
        ]);

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
            'description_id' => $description->id,
        ]);

        // tiefling
        $description = Description::create([
            'text' => '',
            'is_custom' => 0
        ]);

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
            'description_id' => $description->id,
        ]);



    }
}
