<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'angel';
        $user->email = 'angel@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->assignRole('Admin');
    }
}
