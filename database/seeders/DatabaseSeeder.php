<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $ts1 = strtotime("now");

        $this->call([
            UserSeeder::class,
            BackgroundSeeder::class,
            DndClassSeeder::class,
            SubClassSeeder::class,
            SpellSeeder::class,
            ClassFeatureSeeder::class,
            RaceSeeder::class,
            SkillSeeder::class,
        ]);

        $ts2 = strtotime("now");
        $seconds_diff = $ts2 - $ts1;
        $timeMin = floor($seconds_diff / 60);
        $timeSec = ($seconds_diff % 60);
        echo('The entire seeding took '. $timeMin . ' minutes and ' . $timeSec . ' seconds.' . PHP_EOL);
    }
}
