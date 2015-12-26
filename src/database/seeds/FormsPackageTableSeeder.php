<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Package;

class FormsPackageTableSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id_012' => '4', 'name_012' => 'Forms Package', 'folder_012' => 'forms', 'sorting_012' => 4, 'active_012' => '0']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="FormsPackageTableSeeder"
 */