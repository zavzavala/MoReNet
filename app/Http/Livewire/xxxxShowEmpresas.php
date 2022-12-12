<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\empresa as Company;
use Livewire\WithPagination;

class ShowEmpresas extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.show-empresas', [
            "empresas"=>Company::all()
        ]);
    }

    public function store(){
        dd("Saves");
    }
    public function editEmpresa($empresa){

        dd('edit');
    }
}
