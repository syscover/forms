<?php

use Illuminate\Database\Seeder;
use Syscover\Forms\Models\State;

class FormsStateTableSeeder extends Seeder
{
    public function run()
    {
        State::insert([
            ['id_400' => '1', 'name_400' => 'Unmanaged', 'color_400' => '#ff0000'],
            ['id_400' => '2', 'name_400' => 'Managed', 'color_400' => '#53d450']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="FormsStateTableSeeder"
 */