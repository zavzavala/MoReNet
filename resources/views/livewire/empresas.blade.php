<div>
    
    <livewire:tbl_empresas/>
        
    <!-- MODALS -->

    <div wire:ignore.self class="modal modal-blur fade" id = 'edit_empresa' tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Acualizar Empresa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <form wire:submit.prevent = "addUser()" method="post" enctype = "form/multipart-data">
           @csrf
           <input type="text" wire:model="id">
        <div class="mb-3">
           
         <!--    <label class="form-label">Instituicao de Ensino</label> -->
            <div class="form-selectgroup-boxes row mb-3">

            <div class="col-lg-6">
            <label class="form-label">Cliente/Empresa</label>
            <input type="text" class="form-control" wire:model="cliente" placeholder="Nome da Empresa/Cliente">
            <span class="text-danger">@error('cliente'){{$message}}@enderror()</span>
            
            </div>
              <!--   <div class="col-lg-6">
                    <label class="form-selectgroup-item">
                        <input type="radio" wire:model="Inst_ensino" value="Inst_ensino" class="form-selectgroup-input" checked="">
                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                            <span class="me-3">
                            <span class="form-selectgroup-check"></span>
                            </span>
                            <span class="form-selectgroup-label-content">
                            <span class="form-selectgroup-title strong mb-1">Inst_ensino</span>
                        
                            </span>
                        </span>
                        <span class="text-danger">@error('Inst_ensino'){{$message}}@enderror</span>
                    </label>
                </div> -->
                <div class="col-lg-6">
                    <label class="form-label">Data Contrato</label>
                    <input type="date" wire:model="data_contrato" class="form-control">
                    <span class="text-danger">@error('data_contrato'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label class="form-label">Url da Empresa</label>
                        <div class="input-group input-group-flat">
                            <span class="input-group-text">
                            https://www.
                            </span>
                            <input type="text" class="form-control ps-0" wire:model="url" autocomplete="off">
                            
                        </div>
                        <span class="text-danger">@error('url'){{$message}}@enderror()</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                    <label class="form-label">Tipo de Empresa</label>
                    <select class="form-select" wire:model="tipo_empresa">
                        <option value="" selected="">---Selecione---</option>
                        <option value="EP">Ensino-Publica</option>
                        <option value="EPr">Ensino-Privada</option>
                        <option value="P">Empresa-Publica</option>
                        <option value="Pr">Empresa-Privada</option>
                        <option value="M">Ministerio</option>
                    </select>
                    <span class="text-danger">@error('tipo_empresa')@enderror()</span>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    
                    <input type="text" wire:model="email" class="form-control">
                    <span class="text-danger">@error('email'){{$message}}@enderror()</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <div class="input-group input-group-flat">
                        <span class="input-group-text">+258</span>
                        <input type="text" wire:model="telefone" class="form-control">

                    </div>
                    
                    <span class="text-danger">@error('telefone'){{$message}}@enderror()</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Endereco</label>
                        <input type="text" wire:model="endereco" class="form-control">
                        <span class="text-danger">@error('endereco'){{$message}}@enderror()</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label for="" class="form-label">Nuit</label>
                    <input type="text" class="form-control" wire:model="nuit">
                    <span class="text-danger">@error('nuit'){{$message}}@enderror()</span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div>
                    <label class="form-label">Informacao Adicional</label>
                    <textarea class="form-control" wire:model="descricao" rows="3"></textarea>
                    <span class="text-danger">@error('descricao'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>

            <div id="doc">

<label for="documento">Carregar Anexos</label>
<p>OBs: Carrega Fichiros se existirem</p>

<div class="form-rem form-row mb-3">

    <div class="col">
        <input type="file" class="form-control" wire:model="doc"
            value="{{ old('doc[0]') }}" multiple>
        {{-- <label class="custom-file-label" for="doc_anexo">Escolher Ficheiro</label> --}}
        <span class="text-danger">@error('doc'){{$message}}@enderror</span>
    </div>
    <div class="col">
        <input type="text" class="form-control"
        wire:model="desc_doc" placeholder="nome do documento" value="{{ old('dodesc_docc[0]') }}">
        <span>@error('dodesc_docc'){{$message}}@enderror</span>
    </div>
</div>

</div>

<div class="form-group col-md-8">

    <button type="submit" class="btn btn-primary ms-auto">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        Salvar
        </button>
</div>
         
        </div>

           </form>
         </div>
          
        </div>
      </div>
    </div>

      
       
</div>
