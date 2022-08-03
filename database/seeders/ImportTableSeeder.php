<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ImportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $sql = public_path('data.sql');
          
        // $db = [
        //     'username' => env('DB_USERNAME'),
        //     'password' => env('DB_PASSWORD'),
        //     'host' => env('DB_HOST'),
        //     'database' => env('DB_DATABASE')
        // ];
  
        // exec("mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database {$db['database']} < $sql");
  
        // \Log::info('SQL Import Done');

        $public_path = 'public/data.sql';
        DB::unprepared(file_get_contents($public_path));
        $this->command->info('All data are added');
    }
    
}
