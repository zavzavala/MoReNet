<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AutorLoginForm extends Component
{

    public $login_id, $password;
    public $returnUrl;

    public function mount(){
        $this->returnUrl = request()->returnUrl;
    }

    public function LoginHandler(){

           //* dd('Heyy Login) */
            $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            if($fieldType == 'email'){
                $this->validate([
                    'login_id'=>'required|email|exists:users,email',
                    'password'=>'required|min:5',
                ],
                    [
                        'login_id'=>'Email ou username e obrigatorio',
                        'login_id.email'=>'Este email nao e valido',
                        'login_id.exists'=>'Este email nao existe',
                        'password.required'=>'Este campo e obrigatorio',
                    
                ]);

            }else{
                $this->validate([
                    'login_id'=>'required|exists:users,username',
                    'password'=>'required|min:5',

                ],[
                    'login_id.required'=>'Email ou username sao obrigatorios',
                    'login_id.exists'=>'Username nao registado',
                    'password.required'=>'Password e obrigatorio',
                ]);
            }
                $credencials = array($fieldType=>$this->login_id,'password'=>$this->password);
                if(Auth::guard('web')->attempt($credencials) ){
                    $checkUser = User::where($fieldType, $this->login_id)->first();
                    if($checkUser->blocked == 1){
                        Auth::guard('web')->logout();
                        return redirect()->route('autor.login')->with('fail','Sua conta foi bloqueada.');
                    }else{
                        // return redirect()->route('autor.home');
                        if($this->returnUrl != null){
                            return redirect()->to($this->returnUrl);
                        }else{
                            redirect()->route('autor.home');
                        }
                    }
                }else{
                    session()->flash('fail','Email/UserName ou Password Incorrectos.');
                }

        //////Logar-se somente com email, codigo ABAIXO

         /* $this->validate([
                'email'=>'required|email|exists:users,email',
                'password'=>'required|min:5'
           ],
        [
            'email.required'=>'Digite seu email',
            'email.email'=>'Este email nao e valido',
            'email.exists'=>"Este email nao existe",
            'password.required'=>'Este campo e obrigatorio'
        ]);

        $credencials = array('email'=>$this->email,'password'=>$this->password);
       
        if( Auth::guard('web')->attempt($credencials) ){
            $checkUser = User::where('email', $this->email)->first();
            if($checkUser->blocked == 1){
                    Auth::guard('web')->logout();
                    return redirect()->route('autor.login')->with('fail', 'Sua conta foi bloqueada.');
            }else{
                 return redirect()->route('autor.home');
             
                }
        }else{
            session()->flash('fail','Dados incorrectos.');
        } */
   
    }
    
    public function render()
    {
        return view('livewire.autor-login-form');
    }
}
