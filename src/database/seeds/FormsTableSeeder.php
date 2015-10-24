<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FormsTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(ResourceFormsTableSeeder::class);
        $this->call(CronjobFormsTableSeeder::class);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="FormsTableSeeder"
 */