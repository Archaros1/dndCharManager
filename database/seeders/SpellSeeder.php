<?php

namespace Database\Seeders;

use App\Models\Description;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

use App\Models\DndClass;
use App\Models\Spell;
use App\Models\SpellList;

class SpellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $wizardSpellList = DndClass::where('name', '=', 'wizard')->first()->spellList;

        $spellLists = [];
        $classes = DndClass::where('is_spellcaster', '=', '1')->get();
        foreach ($classes as $key => $class) {
            $spellLists[$class->name] = $class->spellList;
        }

        // $spell = Spell::create([
        //     'name' => 'acid splash',
        //     'display_name' => 'Acid Splash',
        //     'level' => 0,
        //     'range' => '90 ft. / 27m',
        //     'school' => 'conjuration',
        //     'has_saving_throw' => 1,
        //     'saving_throw_attribute' => 'dexterity',
        //     'is_spell_attack' => 0,
        //     'do_damage' => 1,
        //     'roll' => '1d6',
        //     'casting_time' => '1 action',
        //     'is_custom' => 0,
        // ]);

        // $spell->spellLists()->attach($wizardSpellList);
        // $spell->save();

        $json = Storage::get('content/spells.json');
        $spells = json_decode($json);

        foreach ($spells as $key => $spellData) {
            $spellData = (array) $spellData;
            try {
                $desc = Description::create([
                    'text' => $spellData['desc'],
                    'is_custom' => 0,
                ]);

                $spell = Spell::create([
                'name' => strtolower($spellData['name']),
                'display_name' => $spellData['name'],
                'level' => $spellData['level'] === 'Cantrip' ? 0 : substr($spellData['level'], 0, 1),
                'range' => $spellData['range'],
                'school' => strtolower($spellData['school']),
                'has_saving_throw' => 0,
                'saving_throw_attribute' => null,
                'is_spell_attack' => 0,
                'do_damage' => 0,
                'roll' => null,
                'casting_time' => $spellData['casting_time'],
                'is_custom' => 0,
                'components' => $spellData['components'],
                'material' => $spellData['material'] ?? null,
                'concentration' => $spellData['concentration'] === 'yes' ? 1 : 0,
                'ritual' => $spellData['ritual'] === 'yes' ? 1 : 0,
                'description_id' => $desc->id,
            ]);
            } catch (\Throwable $th) {
                dd($spellData, $th);
            }


            $casters = explode(',', strtolower(str_replace(' ', '', $spellData['class'])));
            foreach ($casters as $key => $caster) {
                if (isset($spellLists[$caster])) {
                    $spell->spellLists()->attach($spellLists[$caster]);
                    $spell->save();
                }
            }
        }
    }
}
