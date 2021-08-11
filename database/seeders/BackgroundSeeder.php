<?php

namespace Database\Seeders;

use App\Models\Background;
use App\Models\Description;
use App\Models\FeatureList;
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
            'text' => '',
            'is_custom' => 0
        ]);

        $featureList = FeatureList::create([
        ]);

        Background::create([
            'name' => 'test',
            'is_custom' => 0,
            'description_id' => $description->id,
            'feature_list_id' => $featureList->id
        ]);
    }
}
