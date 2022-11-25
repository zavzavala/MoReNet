<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class testResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
        'id'=> $this->id,
        'cliente'=>$this->cliente,
        'telefone'=>$this->telefone,
        'endereco'=>$this->endereco,
        'email'=>$this->email,
        'localizacao'=>$this->localizacao,
        'data_contrato'=>$this->data_contrato,
        'nuit'=>$this->nuit,
        'descricao'=>$this->descricao,
        'tipo_empresa'=>$this->tipo_empresa,
        //'Empresa'=>$this->Empresa,
        'ministerio'=>$this->ministerio,
        'url'=>$this->url,
        'informacao'=>$this->informacao,

        ];
    }
}
