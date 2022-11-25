<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class TopHeader extends Component
{
    public $autor;
    protected $listeners = [
        'updateTopHeader'=>'$refresh'
    ];
     public function mount(){
        $this->autor = User::find(auth('web')->id());
     }
     public function companyModal(){
        //dd('exec.');
        $this->dispatchBrowserEvent('ShowModalEmpresa');
     }
    public function render()
    {
        return view('livewire.top-header');
    }
}
