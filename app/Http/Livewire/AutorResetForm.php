<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'email.email'=>'Este email nao e valido',
            'email.exists'=>'Este email nao esta registado',
            'new_password.required'=>'Insira nova password',
            'new_password.min'=>'Insira no minimo 5 digitos',
            'conf_password'=>'Esta password nao e igual a nova Password',
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
                session()->flash('success', 'Sua password foi actualizada com sucesso. Faca Login com seu email (<span>'.$this->email.'</span>) e nova password');
                    
                $this->redirectRoute('autor.login', ['tkn'=>$success_token, 'UEmail'=>$this->email]);
                
            }
    }
    public function render()
    {
        return view('livewire.autor-reset-form');
    }
}
