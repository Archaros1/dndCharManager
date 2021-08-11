<?php

namespace Database\Seeders;

use App\Models\DndClass;
use App\Models\Description;
use Illuminate\Database\Seeder;
use App\Models\SubClass;


class SubClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $description = Description::create([
            'text' => '',
            'is_custom' => 0
        ]);

        SubClass::create([
            'name' => 'Path of the Berzerker',
            'archetype' => 'Primal Path',
            'class_id' => DndClass::firstWhere('name', '=', 'barbarian')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'College of Lore',
            'archetype' => 'Bard College',
            'class_id' => DndClass::firstWhere('name', '=', 'bard')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'Knowledge Domain',
            'archetype' => 'Divine Domain',
            'class_id' => DndClass::firstWhere('name', '=', 'cleric')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
        ]);

        SubClass::create([
            'name' => 'Life Domain',
            'archetype' => 'Divine Domain',
            'class_id' => DndClass::firstWhere('name', '=', 'cleric')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
        ]);

        SubClass::create([
            'name' => 'Circle of the Land',
            'archetype' => 'Druid Circle',
            'class_id' => DndClass::firstWhere('name', '=', 'druid')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
        ]);

        SubClass::create([
            'name' => 'Champion',
            'archetype' => 'Martial Archetype',
            'class_id' => DndClass::firstWhere('name', '=', 'fighter')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'Way of the Open Hand',
            'archetype' => 'Monastic Tradition',
            'class_id' => DndClass::firstWhere('name', '=', 'monk')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'Oath of Devotion',
            'archetype' => 'Sacred Oath',
            'class_id' => DndClass::firstWhere('name', '=', 'paladin')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
        ]);

        SubClass::create([
            'name' => 'Hunter',
            'archetype' => 'Ranger Archetype',
            'class_id' => DndClass::firstWhere('name', '=', 'ranger')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'Thief',
            'archetype' => 'Roguish Archetype',
            'class_id' => DndClass::firstWhere('name', '=', 'rogue')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'Draconic Bloodline',
            'archetype' => 'Sorcerous Origin',
            'class_id' => DndClass::firstWhere('name', '=', 'sorcerer')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'Wild Magic',
            'archetype' => 'Sorcerous Origin',
            'class_id' => DndClass::firstWhere('name', '=', 'sorcerer')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'The Fiend',
            'archetype' => 'Otherworldly Patron',
            'class_id' => DndClass::firstWhere('name', '=', 'warlock')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
        ]);

        SubClass::create([
            'name' => 'The Great Old One',
            'archetype' => 'Otherworldly Patron',
            'class_id' => DndClass::firstWhere('name', '=', 'warlock')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
        ]);

        SubClass::create([
            'name' => 'School of Abjuration',
            'archetype' => 'Arcane Tradition',
            'class_id' => DndClass::firstWhere('name', '=', 'wizard')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'Alchemist',
            'archetype' => 'Artificer Specialist',
            'class_id' => DndClass::firstWhere('name', '=', 'artificer')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'Armorer',
            'archetype' => 'Artificer Specialist',
            'class_id' => DndClass::firstWhere('name', '=', 'artificer')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'intelligence',
        ]);

    }
}
