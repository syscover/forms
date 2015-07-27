<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Resource;

class ResourceFormsTableSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id_007' => 'forms','name_007'             => 'Forms Package',     'package_007' => '4'],
            ['id_007' => 'forms-state','name_007'       => 'States',            'package_007' => '4'],
            ['id_007' => 'forms-form','name_007'        => 'Forms',             'package_007' => '4'],
            ['id_007' => 'forms-forward','name_007'     => 'Forwards',          'package_007' => '4'],
            ['id_007' => 'forms-record','name_007'      => 'Records',           'package_007' => '4'],
            ['id_007' => 'forms-comment','name_007'     => 'Comments',          'package_007' => '4'],
            ['id_007' => 'forms-preference','name_007'  => 'Preferences',       'package_007' => '4']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ResourceFormsTableSeeder"
 */