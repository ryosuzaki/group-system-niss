<?php

namespace GroupSystem\Sample\Seeds;

use Illuminate\Database\Seeder;

use GroupSystem\Sample\Models\Sample;

class SampleSeeder extends Seeder
{
    /**
     * seederコマンド
     * php artisan db:seed --class=GroupSystem\\Sample\\Seeds\\SampleSeeder
     */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sample::create([
            'word'=>"seeder",
        ]);
    }
}
