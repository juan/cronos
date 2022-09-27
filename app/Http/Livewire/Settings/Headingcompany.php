<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\Company;
use App\Traits\Checkcompany;

class Headingcompany extends Component
{
    use Checkcompany;
    public $companyid;
    public $listcompany;
    public function mount()
    {
        
            $this->companyid=$this->checkssesioncompany();
        
    }
    
    public function render()
    {
        $this->listcompany =  Company::latest()->orderBy('companyname')
                                               ->get(['id','companyname']);
        return view('livewire.settings.headingcompany');
    }
    
    public function setssesionid()
    {
      $this->setCompany($this->companyid);
      $this->emit('companySelected');
    }
}
