<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

use App\Models\DndClass;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proficiencyLists = [];
        $classes = DndClass::all();
        foreach ($classes as $key => $class) {
            $proficiencyLists[$class->name] = $class->proficiencyList;
        }

        $skillsTab = [
            [
                'name' => 'Acrobatics',
                'attribute' => 'dexterity',
                'classes' => [
                    'bard',
                    'fighter',
                    'monk',
                    'rogue',
                ],
            ],
            [
                'name' => 'Animal Handling',
                'attribute' => 'wisdom',
                'classes' => [
                    'barbarian',
                    'bard',
                    'druid',
                    'fighter',
                    'ranger',
                ],
            ],
            [
                'name' => 'Arcana',
                'attribute' => 'intelligence',
                'classes' => [
                    'artificer',
                    'bard',
                    'druid',
                    'sorcerer',
                    'warlock',
                    'wizard',
                ],
            ],
            [
                'name' => 'Athletics',
                'attribute' => 'strength',
                'classes' => [
                    'barbarian',
                    'bard',
                    'fighter',
                    'monk',
                    'paladin',
                    'ranger',
                    'rogue',

                ],
            ],
            [
                'name' => 'Deception',
                'attribute' => 'charisma',
                'classes' => [
                    'bard',
                    'rogue',
                    'sorcerer',
                    'warlock',
                ],
            ],
            [
                'name' => 'History',
                'attribute' => 'intelligence',
                'classes' => [
                    'artificer',
                    'bard',
                    'cleric',
                    'fighter',
                    'monk',
                    'warlock',
                    'wizard',
                ],
            ],
            [
                'name' => 'Insight',
                'attribute' => 'wisdom',
                'classes' => [
                    'bard',
                    'cleric',
                    'druid',
                    'fighter',
                    'monk',
                    'paladin',
                    'ranger',
                    'rogue',
                    'sorcerer',
                    'wizard',
                ],
            ],
            [
                'name' => 'Intimidation',
                'attribute' => 'charisma',
                'classes' => [
                    'barbarian',
                    'bard',
                    'fighter',
                    'paladin',
                    'rogue',
                    'sorcerer',
                    'warlock',
                    'wizard',
                ],
            ],
            [
                'name' => 'Investigation',
                'attribute' => 'intelligence',
                'classes' => [
                    'artificer',
                    'bard',
                    'ranger',
                    'rogue',
                    'warlock',
                ],
            ],
            [
                'name' => 'Medicine',
                'attribute' => 'wisdom',
                'classes' => [
                    'artificer',
                    'bard',
                    'cleric',
                    'druid',
                    'paladin',
                    'wizard',
                ],
            ],
            [
                'name' => 'Nature',
                'attribute' => 'intelligence',
                'classes' => [
                    'artificer',
                    'barbarian',
                    'bard',
                    'druid',
                    'ranger',
                    'warlock',
                ],
            ],
            [
                'name' => 'Perception',
                'attribute' => 'wisdom',
                'classes' => [
                    'artificer',
                    'barbarian',
                    'bard',
                    'druid',
                    'fighter',
                    'ranger',
                    'rogue',
                ],
            ],
            [
                'name' => 'Performance',
                'attribute' => 'charisma',
                'classes' => [
                    'bard',
                    'rogue',
                ],
            ],
            [
                'name' => 'Persuasion',
                'attribute' => 'charisma',
                'classes' => [
                    'bard',
                    'cleric',
                    'paladin',
                    'rogue',
                    'sorcerer',
                ],
            ],
            [
                'name' => 'Religion',
                'attribute' => 'intelligence',
                'classes' => [
                    'bard',
                    'cleric',
                    'druid',
                    'monk',
                    'paladin',
                    'sorcerer',
                    'warlock',
                    'wizard',
                ],
            ],
            [
                'name' => 'Sleight of Hand',
                'attribute' => 'dexterity',
                'classes' => [
                    'artificer',
                    'bard',
                    'rogue',
                ],
            ],
            [
                'name' => 'Stealth',
                'attribute' => 'dexterity',
                'classes' => [
                    'bard',
                    'monk',
                    'ranger',
                    'rogue',
                ],
            ],
            [
                'name' => 'Survival',
                'attribute' => 'wisdom',
                'classes' => [
                    'barbarian',
                    'bard',
                    'druid',
                    'fighter',
                    'ranger',
                ],
            ],
        ];

        foreach ($skillsTab as $key => $skillElement) {
            $skill = Skill::create([
                'name' => $skillElement['name'],
                'attribute' => $skillElement['attribute'],
            ]);
            foreach ($classes as $key => $class) {
                if (in_array($class->name, $skillElement['classes'])) {
                    $skill->lists()->attach($proficiencyLists[$class->name]);
                    $skill->save();
                }
            }
        }
    }
}
