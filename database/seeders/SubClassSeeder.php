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
            'name' => 'path of the berzerker',
            'archetype' => 'primal path',
            'class_id' => DndClass::firstWhere('name', '=', 'barbarian')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'college of lore',
            'archetype' => 'bard college',
            'class_id' => DndClass::firstWhere('name', '=', 'bard')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'knowledge domain',
            'archetype' => 'divine domain',
            'class_id' => DndClass::firstWhere('name', '=', 'cleric')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
        ]);

        SubClass::create([
            'name' => 'life domain',
            'archetype' => 'divine domain',
            'class_id' => DndClass::firstWhere('name', '=', 'cleric')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
        ]);

        SubClass::create([
            'name' => 'circle of the land',
            'archetype' => 'druid circle',
            'class_id' => DndClass::firstWhere('name', '=', 'druid')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
        ]);

        SubClass::create([
            'name' => 'champion',
            'archetype' => 'martial archetype',
            'class_id' => DndClass::firstWhere('name', '=', 'fighter')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'way of the open hand',
            'archetype' => 'monastic tradition',
            'class_id' => DndClass::firstWhere('name', '=', 'monk')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'oath of devotion',
            'archetype' => 'sacred oath',
            'class_id' => DndClass::firstWhere('name', '=', 'paladin')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
        ]);

        SubClass::create([
            'name' => 'hunter',
            'archetype' => 'ranger archetype',
            'class_id' => DndClass::firstWhere('name', '=', 'ranger')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'thief',
            'archetype' => 'roguish archetype',
            'class_id' => DndClass::firstWhere('name', '=', 'rogue')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'draconic bloodline',
            'archetype' => 'sorcerous origin',
            'class_id' => DndClass::firstWhere('name', '=', 'sorcerer')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'wild magic',
            'archetype' => 'sorcerous origin',
            'class_id' => DndClass::firstWhere('name', '=', 'sorcerer')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'the fiend',
            'archetype' => 'otherworldly patron',
            'class_id' => DndClass::firstWhere('name', '=', 'warlock')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
        ]);

        SubClass::create([
            'name' => 'the great old one',
            'archetype' => 'otherworldly patron',
            'class_id' => DndClass::firstWhere('name', '=', 'warlock')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
        ]);

        SubClass::create([
            'name' => 'school of abjuration',
            'archetype' => 'arcane tradition',
            'class_id' => DndClass::firstWhere('name', '=', 'wizard')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'alchemist',
            'archetype' => 'artificer specialist',
            'class_id' => DndClass::firstWhere('name', '=', 'artificer')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
        ]);

        SubClass::create([
            'name' => 'armorer',
            'archetype' => 'artificer specialist',
            'class_id' => DndClass::firstWhere('name', '=', 'artificer')->id,
            'description' => $description->id,
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'intelligence',
        ]);

    }
}
