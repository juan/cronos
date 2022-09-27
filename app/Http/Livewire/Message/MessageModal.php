<?php

namespace App\Http\Livewire\Message;
use LivewireUI\Modal\ModalComponent;

class MessageModal extends ModalComponent
{
    public $menssage;
    public $typemessage;
    public $iconimage;
    public function mount($menssage,$typemessage)
    {
      $this->typemessage;
      $this->menssage;
      
      if($this->typemessage=='warning'){
         $this->iconimage="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z";
      }
        
    }
    public function render()
    {
        return view('livewire.message.message-modal');
    }
    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}
