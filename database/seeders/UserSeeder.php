<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userinfo=['name'=>'Juan Pablo',
                   'email'=>'admin@admin.com',
                   'password'=>'123456789',
                   'lastname'=>'Moreno González',
                   'dni'=>'95933899',
                   'cuil'=>'20959338990',
                   'address'=>'Quadrini 1311, Rio Negro - Cipolletti',
                   'phone'=>'2995529100'];
        
        User::create($userinfo);
    }
}
