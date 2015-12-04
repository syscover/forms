<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FormsTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(FormsPackageTableSeeder::class);
        $this->call(FormsResourceTableSeeder::class);
        $this->call(FormsCronjobTableSeeder::class);
        $this->call(FormsStateTableSeeder::class);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="FormsTableSeeder"
 */