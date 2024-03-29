<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AutorResetForm extends Component
{
    public $email, $token, $new_password, $conf_password;
    
    public function mount(){
        $this->email = Request()->email;
        $this->token = request()->token;
    }

    public function ResetHandler(){
        $this->validate([
            'email'=>'required|email|exists:users,email',
            'new_password'=>'required|min:5',
            'conf_password'=>'same:new_password',
        ],[
            'email.required'=>"Este campo e obrigatorio",
            'email.email'=>'Este email não e válido',
            'email.exists'=>'Este email não está registado',
            'new_password.required'=>'Insira nova palavra-passe',
            'new_password.min'=>'Insira no minimo 5 digitos',
            'conf_password'=>'Esta palavra-passe não e igual a nova palavra-passe',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email'=>$this->email,
            'token'=>$this->token,
        ])->first();
        if(!$check_token){
                session()->flash('fail','Token Invalido.');
        }else{
                User::where('email', $this->email)->update([
                    'password'=>Hash::make($this->new_password)
                ]);

                DB::table('password_resets')->where([
                    'email'=>$this->email
                ])->delete();

                $success_token = Str::random(64);
                session()->flash('success', 'Sua palavra-passe foi actualizada com sucesso. Faca Login com seu email (<span>'.$this->email.'</span>) e nova palavra-passe');
                    
                $this->redirectRoute('autor.login', ['tkn'=>$success_token, 'UEmail'=>$this->email]);
                
            }
    }
    public function render()
    {
        return view('livewire.autor-reset-form');
    }
}
