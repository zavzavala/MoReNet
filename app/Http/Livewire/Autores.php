<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Mail;
use Livewire\WithPagination;

class Autores extends Component
{

    use WithPagination;

public $nome, $email, $username, $tipo;
public $search;
public $perpage = 4;
public $blocked = 0;
public $user_id;

  protected  $listeners = [
        'resetForm',
    ];
    public function mount(){
        $this->resetpage();
    }
    public function updatingSearch(){
        $this->resetpage();
    }
    public function resetForm(){
        $this->nome = $this->email = $this->username = $this->tipo = null;
        $this->resetErrorbag();
    }
    public function addUser(){
        $this->validate([
            'nome'=>'required',
            'tipo'=>'required',
            'username'=>'required|unique:users,username|min:6|max:20',
            'email'=>'required|email|unique:users,email',
        ],[

        ]);
        //dd('User');
        if($this->isOnline()){
                //dd('success');
            $default_pass = Random::generate(8);

            $autor = new User;
            $autor->name = $this->nome;
            $autor->username = $this->username;
            $autor->email = $this->email;
            $autor->password = Hash::make($default_pass);
            $autor->type = $this->tipo;
            $done = $autor->save();

            $data = array(
                'name'=>$this->nome,
                'username'=>$this->username,
                'email'=>$this->email,
                'password'=>$this->default_pass,
                'url'=>route('autor.profile'),
            );

            $autor_email = $this->email;
            $autor_name = $this->nome;

            if($done){
                Mail::send('new-user-email-template', $data, function($message) use ($autor_email, $autor_name){
                    $message->from('zavzavala76@gmail.com', 'Zavala');
                    $message->to($autor_email,$autor_name)->subject('Credencias');
                });

                $this->dispatchBrowserEvent('Conta criada com sucesso', 'success');
                $this->nome = $this->email = $this->username = $this->tipo = null;
                $this->dispatchBrowserEvent('hide_modal_autor');

            }else{
                $this->dispatchBrowserEvent('Ocorreu um erro, verifique!', 'error');
            }
                    
        }else{
                //dd('offline');
        $this->showToastr('Esta offline, conecte-se a uma rede!', 'warning');

        }
    }
    public function editUser($autor){
        //dd(['sgg', $autor]);
        $this->dispatchBrowserEvent('ShowModalEdit_usuario');
        $this->user_id = $autor['id'];
        $this->nome= $autor['name'];
        $this->username = $autor['username'];
        $this->email = $autor['email'];
        $this->tipo = $autor['type'];
        $this->blocked = $autor['blocked'];
    }

    public function updUser(){
        $this->validate([
            'nome'=>'required',
            'username'=>'required|unique:users,username,'.$this->user_id,
            'email'=>'required|unique:users,email,'.$this->user_id,

        ]);
        if($this->user_id){
            $autor = User::find($this->user_id);

            $autor->update([
                'name'=>$this->nome,
                'username'=>$this->username,
                'email'=>$this->email,
                'tipo'=>$this->tipo,
                'blocked'=>$this->blocked
            ]);
            $this->showToastr('Usuario actualizado com sucesso', 'success');
            $this->dispatchBrowserEvent('hide_edit_modal');

        }
    }
    public function showToastr($message, $type){
        $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }
    public function isOnline($site = "https://www.youtube.com/"){
        if(@fopen($site, "r")){
            return true;
        }else{

            return false;
        }
    }
  
    public function render()
    {
        return view('livewire.autores',[
            'autores'=>User::search(trim($this->search))
                        ->Where('id', '!=', auth()->id())->paginate($this->perpage),
        ]);
       /*  return view('livewire.autores',[
            'autores' =>User::where('id', '!=',auth()->id())->paginate(4),
        ]); */
    }
    
}
