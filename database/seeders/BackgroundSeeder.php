<?php

namespace Database\Seeders;

use App\Models\Background;
use App\Models\Description;
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

        Background::create([
            'name' => 'test',
            'is_custom' => 0,
            'description_id' => $description->id
        ]);
    }
}
