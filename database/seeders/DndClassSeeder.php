<?php

namespace Database\Seeders;

use App\Models\DndClass;
use App\Models\Description;
use App\Models\Feature;
use App\Models\FeatureList;
use App\Models\HitDice;
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
        DndClass::create([
            'name' => 'artificer',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'intelligence',
            'sub_class_obtention_level' => 3,
            'hitdice' => 8,
        ]);

        $description = Description::create([
            'text' => 'A tall human tribesman strides through a blizzard, draped in fur and hefting his axe. He laughs as he charges toward the frost giant who dared poach his people’s elk herd.

            A half-orc snarls at the latest challenger to her authority over their savage tribe, ready to break his neck with her bare hands as she did to the last six rivals.

            Frothing at the mouth, a dwarf slams his helmet into the face of his drow foe, then turns to drive his armored elbow into the gut of another.

            These barbarians, different as they might be, are defined by their rage: unbridled, unquenchable, and unthinking fury. More than a mere emotion, their anger is the ferocity of a cornered predator, the unrelenting assault of a storm, the churning turmoil of the sea.

            For some, their rage springs from a communion with fierce animal spirits. Others draw from a roiling reservoir of anger at a world full of pain. For every barbarian, rage is a power that fuels not just a battle frenzy but also uncanny reflexes, resilience, and feats of strength.',
            'is_custom' => 0,
        ]);

        $featureDescription = Description::create([
            'text' => 'In battle, you fight with primal ferocity. On your turn, you can enter a rage as a bonus action.

            While raging, you gain the following benefits if you aren’t wearing heavy armor:

                You have advantage on Strength checks and Strength saving throws.
                When you make a melee weapon attack using Strength, you gain a bonus to the damage roll that increases as you gain levels as a barbarian, as shown in the Rage Damage column of the Barbarian table.
                You have resistance to bludgeoning, piercing, and slashing damage.

            If you are able to cast spells, you can’t cast them or concentrate on them while raging.

            Your rage lasts for 1 minute. It ends early if you are knocked unconscious or if your turn ends and you haven’t attacked a hostile creature since your last turn or taken damage since then. You can also end your rage on your turn as a bonus action.

            Once you have raged the number of times shown for your barbarian level in the Rages column of the Barbarian table, you must finish a long rest before you can rage again.',
            'is_custom' => 0,
        ]);

        $featureList = FeatureList::create();
        Feature::create([
            'level' => 1,
            'name' => 'rage',
            'display_name' => 'Rage',
            'is_action' => 1,
            'duration' => '1 minute',
            'activation_time' => '1 action bonus',
            'is_custom' => 0,
            'feature_list_id' => $featureList->id,
            'description_id' => $featureDescription->id,
        ]);

        DndClass::create([
            'name' => 'barbarian',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'sub_class_obtention_level' => 3,
            'hitdice' => 12,
            'description_id' => $description->id,
            'feature_list_id' => $featureList->id,
        ]);

        $spellList = SpellList::create();
        DndClass::create([
            'name' => 'bard',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
            'sub_class_obtention_level' => 3,
            'hitdice' => 8,
            'spell_list_id' => $spellList->id,
        ]);

        $spellList = SpellList::create();
        DndClass::create([
            'name' => 'cleric',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
            'sub_class_obtention_level' => 1,
            'hitdice' => 8,
            'spell_list_id' => $spellList->id,
        ]);

        $spellList = SpellList::create();
        DndClass::create([
            'name' => 'druid',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
            'sub_class_obtention_level' => 2,
            'hitdice' => 8,
            'spell_list_id' => $spellList->id,
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

        $spellList = SpellList::create();
        DndClass::create([
            'name' => 'ranger',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'wisdom',
            'sub_class_obtention_level' => 3,
            'hitdice' => 10,
            'spell_list_id' => $spellList->id,
        ]);

        DndClass::create([
            'name' => 'rogue',
            'is_custom' => 0,
            'is_spellcaster' => 0,
            'casting_stat' => null,
            'sub_class_obtention_level' => 3,
            'hitdice' => 8,
        ]);

        $spellList = SpellList::create();
        DndClass::create([
            'name' => 'sorcerer',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
            'sub_class_obtention_level' => 1,
            'hitdice' => 6,
            'spell_list_id' => $spellList->id,
        ]);

        $spellList = SpellList::create();
        DndClass::create([
            'name' => 'warlock',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'charisma',
            'sub_class_obtention_level' => 1,
            'hitdice' => 8,
            'spell_list_id' => $spellList->id,
        ]);

        $spellList = SpellList::create();
        DndClass::create([
            'name' => 'wizard',
            'is_custom' => 0,
            'is_spellcaster' => 1,
            'casting_stat' => 'intelligence',
            'sub_class_obtention_level' => 2,
            'hitdice' => 6,
            'spell_list_id' => $spellList->id,
        ]);
    }
}
