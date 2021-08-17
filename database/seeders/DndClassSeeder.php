<?php

namespace Database\Seeders;

use App\Models\DndClass;
use App\Models\Description;
use App\Models\FeatureList;
use App\Models\HitDice;
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
        DndClass::create([
            'name' => 'artificer',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'intelligence',
            'sub_class_obtention_level' => 3,
            'hitdice' => 8,
        ]);
        DndClass::create([
            'name' => 'barbarian',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'sub_class_obtention_level' => 3,
            'hitdice' => 12,
        ]);
        DndClass::create([
            'name' => 'bard',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
            'sub_class_obtention_level' => 3,
            'hitdice' => 8,
        ]);
        DndClass::create([
            'name' => 'cleric',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
            'sub_class_obtention_level' => 1,
            'hitdice' => 8,
        ]);
        DndClass::create([
            'name' => 'druid',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
            'sub_class_obtention_level' => 2,
            'hitdice' => 8,
        ]);
        DndClass::create([
            'name' => 'fighter',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'sub_class_obtention_level' => 3,
            'hitdice' => 10,
        ]);
        DndClass::create([
            'name' => 'monk',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'sub_class_obtention_level' => 3,
            'hitdice' => 8,
        ]);
        DndClass::create([
            'name' => 'paladin',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'sub_class_obtention_level' => 3,
            'hitdice' => 10,
        ]);
        DndClass::create([
            'name' => 'ranger',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
            'sub_class_obtention_level' => 3,
            'hitdice' => 10,
        ]);
        DndClass::create([
            'name' => 'rogue',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'sub_class_obtention_level' => 3,
            'hitdice' => 8,
        ]);
        DndClass::create([
            'name' => 'sorcerer',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
            'sub_class_obtention_level' => 1,
            'hitdice' => 6,
        ]);
        DndClass::create([
            'name' => 'warlock',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
            'sub_class_obtention_level' => 1,
            'hitdice' => 8,
        ]);
        DndClass::create([
            'name' => 'wizard',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'intelligence',
            'sub_class_obtention_level' => 2,
            'hitdice' => 6,
        ]);
    }
}
