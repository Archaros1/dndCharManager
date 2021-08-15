<?php

namespace Database\Seeders;

use App\Models\Background;
use App\Models\Description;
use App\Models\Feature;
use App\Models\FeatureChoice;
use App\Models\FeatureList;
use App\Models\StatPack;
use Illuminate\Database\Seeder;

class BackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $description = Description::create([
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus risus, efficitur ultricies eleifend id, mollis id leo. Suspendisse at porttitor nibh. Vivamus porta urna risus, ac tempus sem laoreet eget. Curabitur vitae augue sapien. Fusce dictum metus eu sem mollis, ac vestibulum mauris suscipit. Vestibulum semper risus eu massa viverra sollicitudin. Curabitur pellentesque dolor aliquet sem suscipit, eu finibus augue sagittis. Sed sit amet porta est, sed molestie justo. Nunc fringilla enim gravida nisl pulvinar placerat. Fusce metus tellus, scelerisque quis convallis commodo, laoreet id magna. Quisque tincidunt neque a felis lobortis laoreet. ',
            'is_custom' => 0
        ]);

        $statPack = StatPack::create();

        $featureList = FeatureList::create();

        $feature1 = Feature::create([
            'level' => 1,
            'description_id' => $description->id,
            'is_spellcasting' => 0,
            'name' => 'test',
            'display_name' => 'Test',
            'is_action' => 0,
            'is_custom' => 0,
            'has_choice' => 0,
            'feature_list_id' => $featureList->id,
            'stat_pack_id' => $statPack->id,
        ]);

        $feature2 = Feature::create([
            'level' => 5,
            'description_id' => $description->id,
            'is_spellcasting' => 0,
            'name' => 'test2',
            'display_name' => 'Test2',
            'is_action' => 0,
            'is_custom' => 0,
            'has_choice' => 1,
            'feature_list_id' => $featureList->id,
            'stat_pack_id' => $statPack->id,
        ]);

        $choice1 = FeatureChoice::create([
            'description_id' => $description->id,
            'is_spellcasting' => 0,
            'name' => 'choice 1',
            'display_name' => 'Choice 1',
            'is_action' => 0,
            'is_custom' => 0,
            'feature_id' => $feature2->id,
        ]);

        $choice1 = FeatureChoice::create([
            'description_id' => $description->id,
            'is_spellcasting' => 0,
            'name' => 'choice 2',
            'display_name' => 'Choice 2',
            'is_action' => 0,
            'is_custom' => 0,
            'feature_id' => $feature2->id,
        ]);

        Background::create([
            'name' => 'test',
            'is_custom' => 0,
            'description_id' => $description->id,
            'feature_list_id' => $featureList->id
        ]);
    }
}
