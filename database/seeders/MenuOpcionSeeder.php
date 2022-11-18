<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuOpcion;

class MenuOpcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $opcionesmenu = [['menu_id' => 1,
                          'numcolum' => 1,
                          'namemenu' => 'Empleado',
                          'bigicon' => '',
                          'smallicon' => '',
                          'linkto' => 'rempleado'],
                         ['menu_id' => 1,
                          'numcolum' => 2,
                          'namemenu' => 'Sector',
                          'bigicon' => '',
                          'smallicon' => '',
                          'linkto' => 'resector'],
                         ['menu_id' => 1,
                          'numcolum' => 3,
                          'namemenu' => 'Cargo',
                          'bigicon' => '',
                          'smallicon' => '',
                          'linkto' => 'recargo'],
                         ['menu_id' => 2,
                          'numcolum' => 1,
                          'namemenu' => 'Gestión',
                          'bigicon' => '',
                          'smallicon' => '',
                          'linkto' => 'rearchipublic'],
                         ['menu_id' => 3,
                          'numcolum' => 1,
                          'namemenu' => 'Empresa',
                          'bigicon' => '',
                          'smallicon' => '',
                          'linkto' => 'recompany'],
                         
        ];
        
        foreach ($opcionesmenu as $opcmenu){
            MenuOpcion::create($opcmenu);
        }
    
    }
}
