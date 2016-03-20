<?php

use Illuminate\Database\Seeder;

class TutorialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ocademy\Tutorial::class, 20)->create([
            'category_id' => 1,
        ]);
    }
}
