<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $pass = 'anypass123';
        User::create([
          'name' => 'Manuel',
          'email' => 'manuel112@gmail.com',
          'password' => Hash::make($pass),
          ]);
          
          
        User::create([
          'name' => 'John',
          'email' => 'john123@gmail.com',
          'password' => Hash::make('johnpass123'),
          ]);
        
        
        User::create([
          'name' => 'Selene Gomez',
          'email' => 'selene734@gmail.com',
          'password' => Hash::make('SeleneThis123'),
          'role' => 'user',
          ]);
    }
}
