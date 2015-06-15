<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\CronJob;

class CronjobFormsTableSeeder extends Seeder {

    public function run()
    {   
        CronJob::insert([
            ['name_011' => 'Check messages to send', 'package_011' => 4, 'cron_expression_011' => '*/5 * * * *', 'key_011' => '08', 'last_run_011' => 0, 'next_run_011' => 0, 'active_011' => 1]
        ]);
    }
}

/*
 * Comand to run:
 * php artisan db:seed --class="CronjobFormsTableSeeder"
 */