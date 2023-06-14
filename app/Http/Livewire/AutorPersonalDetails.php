<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class AutorPersonalDetails extends Component
{
    public $autor;

    public $name, $usuario, $email,$username;
   
    public function mount(){
        $this->autor = User::find(auth('web')->id());
        $this->name = $this->autor->name;
        $this->username = $this->autor->username;
        $this->email = $this->autor->email;
        
    }
    public function UpdateDetails(){
        //dd('UpdateDetails');
        $this->validate([
            'name'=>'required|string',
            'username'=>'required|unique:users,username,'.auth('web')->id()

        ],[

        ]);

        User::where('id', auth('web')->id())->update([
            'name'=>$this->name,
            'username'=>$this->username 
        ]);
        $this->emit('updateRefreshAutorProfileHeader');
        $this->emit('updateTopHeader');
        
    }
    public function showToastr($message, $type){
        $this->showToastr('Informação pessoal alterada com sucesso', 'success');
        return $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);

    }
    public function render()
    {
        return view('livewire.autor-personal-details');
    }
}
