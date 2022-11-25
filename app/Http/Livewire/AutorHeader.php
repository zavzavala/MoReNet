<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class AutorHeader extends Component
{
    ////////////cabecalho Autor-Perfil.
    public $autor;

    protected $listeners = [
        'updateRefreshAutorProfileHeader'=>'$refresh'
    ];
    public function mount(){
       $this->autor = User::find(auth('web')->id());
    }
    public function render()
    {
        return view('livewire.autor-header');
    }
}
