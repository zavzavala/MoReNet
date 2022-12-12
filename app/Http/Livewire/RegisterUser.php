<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUser extends Component
{
    public $password, $email, 
    $conf_password, $username;


    public function RegisterHandler(){

        $this->validate([
            'password'=>'required|min:5|max:25',
            'email'=>'required|email|unique:users,email',
            'conf_password'=>'same:password',
            'username'=>'required|unique:users,username',
        ],
        [
            'email.required'=>'Email e obrigatorio',
            'email.email'=>'Este email nao e valido',
            'email.unique'=>'Este email ja existe',
            'username.unique'=>'Este username ja existe',
            'username.required'=>'username e obrigatorio',
            'password.required'=>'Este campo e obrigatorio',
            'conf_password.required'=>'Este campo e obrigatorio',
            'conf_password.same'=>'O campo confirmar password deve ser o mesmo que a password',
        ]);

        $query =  User::create([
            'email'=>$this->email,
            'username'=>$this->username,
            'password'=>Hash::make($this->password),
            'created_at'=> \Carbon\Carbon::now(),
        ]);
        return redirect()->route('autor.Register.offline')->with('success','Com Sucesso!');
        //session()->flash('success','Com sucesso!');
        $this->email = $this->username = $this->password = $this->conf_password = null;
}
    public function render()
    {
        return view('livewire.register-user');
    }


}
