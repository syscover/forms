<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Resource;

class ResourceFormsTableSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id_007' => 'forms','name_007' => 'Forms Package','package_007' => '4'],
            ['id_007' => 'forms-form','name_007' => 'Forms','package_007' => '4'],
            ['id_007' => 'forms-vironment','name_007' => 'Records','package_007' => '4'],
            ['id_007' => 'forms-decoration','name_007' => 'Decorations','package_007' => '4'],
            ['id_007' => 'forms-relationship','name_007' => 'Relationship','package_007' => '4'],
            ['id_007' => 'forms-service','name_007' => 'Services','package_007' => '4']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ResourceFormsTableSeeder"
 */