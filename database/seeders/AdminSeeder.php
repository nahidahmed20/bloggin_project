<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = [
            'name' => 'Md Nahidul Islma',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@gmail.com')
        ];
        Admin::create($admin);
    }
}
