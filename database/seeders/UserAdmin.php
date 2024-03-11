<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $user = new User();

        $user->name = 'Admin';
        $user->email = 'coriaedd@gmail.com';
        $user->password = Hash::make('admin.pass');
        $user->active = true;
        $user->role_id = 1;
        
        $user->save();
    }
}
