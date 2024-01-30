<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AutorChangePassword extends Component
{
    public $password, $new_password, $conf_password;

    public function passwordHandler(){
    //d('chand pass');
    $this->validate([
        'password'=>[
            'required', function($attribute,$value,$fail){
                    if(!Hash::check($value, User::find(auth('web')->id())->password)){
                        return $fail(_('A Palavra-passe actual esta incorrecta'));
                    
                    }
            }
        ],
        'new_password'=>'required|min:5|max:25',
        'conf_password'=>'same:new_password'
    ]);

    $query = User::find(auth('web')->id())->update([
        'password'=>Hash::make($this->new_password)
    ]);

        if($query){
            $this->showToastr('Palavra-passe alterada com sucesso.','success');
            $this->password = $this->new_password = $this->conf_password = null;

        }else{

            $this->showToastr('Erro ao tentar alterar palavra-passe.','error');

        }
       

    }
    public function showToastr($message, $type){

        return $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }
    public function render()
    {
        return view('livewire.autor-change-password');
    }
}
