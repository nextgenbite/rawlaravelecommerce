<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Admin::Factory()->create();

        $public_path = 'public/data.sql';
        DB::unprepared(file_get_contents($public_path));
        $this->command->info('All data are added');
    }
}
