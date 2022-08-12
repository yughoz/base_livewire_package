<?php

namespace Template\Adminrole\Http\Livewire;

use Livewire\Component;
use Auth;

class Mylivewire extends Component
{
    
    public $id_update;
    
    public function render()
    {
        return view('adminlte::livewire.'.$this->view.'.index');
    }

    public function cancel()
    {
        
        $this->id_update = false;
        $this->resetInputFields();

    }

    
}
