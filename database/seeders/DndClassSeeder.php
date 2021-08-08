<?php

namespace Database\Seeders;

use App\Models\DndClass;
use App\Models\Description;
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
        $description = Description::create([
            'text' => '',
            'is_custom' => 0
        ]);

        DndClass::create([
            'name' => 'artificer',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'intelligence',
            'description_id' => $description->id,
            'sub_class_obtention_level' => 3,
        ]);
        DndClass::create([
            'name' => 'barbarian',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'description_id' => $description->id,
            'sub_class_obtention_level' => 3,
        ]);
        DndClass::create([
            'name' => 'bard',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
            'description_id' => $description->id,
            'sub_class_obtention_level' => 3,
        ]);
        DndClass::create([
            'name' => 'cleric',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
            'description_id' => $description->id,
            'sub_class_obtention_level' => 1,
        ]);
        DndClass::create([
            'name' => 'druid',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
            'description_id' => $description->id,
            'sub_class_obtention_level' => 2,
        ]);
        DndClass::create([
            'name' => 'fighter',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'description_id' => $description->id,
            'sub_class_obtention_level' => 3,
        ]);
        DndClass::create([
            'name' => 'monk',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'description_id' => $description->id,
            'sub_class_obtention_level' => 3,
        ]);
        DndClass::create([
            'name' => 'paladin',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'description_id' => $description->id,
            'sub_class_obtention_level' => 3,
        ]);
        DndClass::create([
            'name' => 'ranger',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
            'description_id' => $description->id,
            'sub_class_obtention_level' => 3,
        ]);
        DndClass::create([
            'name' => 'rogue',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'description_id' => $description->id,
            'sub_class_obtention_level' => 3,
        ]);
        DndClass::create([
            'name' => 'sorcerer',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
            'description_id' => $description->id,
            'sub_class_obtention_level' => 1,
        ]);
        DndClass::create([
            'name' => 'warlock',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
            'description_id' => $description->id,
            'sub_class_obtention_level' => 1,
        ]);
        DndClass::create([
            'name' => 'wizard',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'intelligence',
            'description_id' => $description->id,
            'sub_class_obtention_level' => 2,
        ]);
    }
}
