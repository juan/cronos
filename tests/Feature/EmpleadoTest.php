<?php

namespace Tests\Feature;

use App\Http\Livewire\Registro\Empleado;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Livewire\LivewireManager;
use Tests\TestCase;

class EmpleadoTest extends TestCase
{
    /** @test */
    public function user_can_login_and_see_form_rempleado()
    {
        $user=User::first();
        $this->actingAs($user);
        Livewire::actingAs($user)
                ->test(Empleado::class, ['user' => $user])
                ->assertStatus(200);
    }
    
     /**
     * @test
     */
    public function all_inputs_form_are_wired()
    {
        $user=User::first();
        $this->withCookie('companyID',1);
        Livewire::actingAs($user)
            ->test(Empleado::class, ['user' => $user])
            ->assertPropertyWired('name')
            ->assertPropertyWired('email')
            ->assertPropertyWired('password')
            ->assertPropertyWired('grade_id')
            ->assertPropertyWired('sector_id')
            ->assertPropertyWired('lastname')
            ->assertPropertyWired('dni')
            ->assertPropertyWired('resposablearea')
            ->assertPropertyWired('cuil')
            ->assertPropertyWired('address')
            ->assertPropertyWired('phone')
            ->assertPropertyWired('datebirth')
            ->assertPropertyWired('numberlegajo')
            ->assertPropertyWired('datecompany')
            ->assertPropertyWired('profile_photo_path')
            ->assertMethodWired('saveuserData')
            ->assertStatus(200);
    }
    /**
     * @test
     */
    public function user_validate_inputs()
    {
        $user=User::first();
        $this->session(['companyID' => 1]);
        Livewire::actingAs($user)
            ->test(Empleado::class, ['user' => $user])
            ->set('name', 'Juan')
            ->set('lastname', 'Moreno')
            ->set('email', 'juan@gmail.com')
            ->set('dni', '99999999')
            ->set('cuil', '99999999')
            ->set('address', 'Dr. Quadrini 1311')
            ->set('datebirth', '23/11/1976')
            ->set('numberlegajo', '1')
            ->set('datecompany', '23/11/1976')
            ->call('saveuserData')
            ->assertHasNoErrors([ 'name' => 'required',
                                  'lastname' => 'required',
                                  'email' => 'required',
                                  'dni' => 'required',
                                  'cuil' => 'required',
                                  'address' => 'required',
                                  'datebirth' => 'required',
                                  'numberlegajo' => 'required',
                                  'datecompany' => 'required',
                              ]);
           
    }
   
}
