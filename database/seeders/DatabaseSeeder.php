<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent;
use Database\Seeders\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       Eloquent\Model::unguard();
       $this->call(\Database\Seeders\UsersTableSeeder::class);
    }
}
