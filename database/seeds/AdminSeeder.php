<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'adminOwner@mosdebateprogram.com',
        ], [
            'name' => 'Default Admin',
            'password' => Hash::make('M0s!D3b@t3P&rogram#2024'),
        ]);
    }
}
