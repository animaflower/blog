<?php

use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('PostTableSeeder');
        $this->call('TagTableSeeder');
        $this->call('PostTagTableSeeder');
    }
}
