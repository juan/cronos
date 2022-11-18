<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuopcionUser;
use App\Models\MenuOpcion;
class MenuOpcionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allopcionmenu = MenuOpcion::all();
        foreach ($allopcionmenu as $mup){
            MenuopcionUser::create(['menu_opcion_id'=>$mup->id,
                        'user_id'=>1]);
        }
    }
}
