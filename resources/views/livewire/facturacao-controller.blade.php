<div>
    {{-- Stop trying to control. --}}
    <div>
    {{-- The best athlete wants his opponent at his best. --}}

 <!-- EMpresas -->
 
    <form wire:submit.prevent = "store()" method="post">   
        @CSRF
        <div class="mb-3">
           
         <!--    <label class="form-label">Instituicao de Ensino</label> -->
            <div class="form-selectgroup-boxes row mb-3">

            <div class="col-lg-6">
            <label class="form-label">Cliente/Empresa</label>
            <input type="text" class="form-control" wire:model="cliente" placeholder="Nome da Empresa/Cliente">
            <span class="text-danger">@error('cliente'){{$message}}@enderror()</span>
            
            </div>
       
                <div class="col-lg-6">
                    <label class="form-label">Largura Banda</label>
                    <input type="date" wire:model="banda" class="form-control">
                    <span class="text-danger">@error('banda'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Aumento Banda</label>
                        <div class="input-group input-group-flat">
                           
                            <input type="text" class="form-control ps-0" wire:model="a_banda" autocomplete="off">
                            
                        </div>
                        <span class="text-danger">@error('a_banda'){{$message}}@enderror()</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label class="form-label">Preco Unitario</label>
                    <div class="input-group input-group-flat">
                           
                            <input type="text" class="form-control ps-0" wire:model="preco_unitario" autocomplete="off">
                            
                        </div>
                    <span class="text-danger">@error('preco_unitario')@enderror()</span>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label class="form-label">Ano</label>
                    
                    <input type="number" wire:model="ano" class="form-control">
                    <span class="text-danger">@error('ano'){{$message}}@enderror()</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label class="form-label">Mes</label>
                    <select wire:model="mes" id="" class="form-select">
                        <option value="">--Selecione--</option>
                        <option value="janeiro">Janeiro</option>
                        <option value="fevereiro">Fevereiro</option>
                        <option value="Marco">Marco</option>
                        <option value="Abril">Abril</option>
                    </select>
                    
                    <span class="text-danger">@error('mes'){{$message}}@enderror()</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Numero Factura</label>
                        <input type="text" wire:model="n_factura" class="form-control">
                        <span class="text-danger">@error('n_factura'){{$message}}@enderror()</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label for="" class="form-label">Valor Facturado</label>
                    <input type="text" class="form-control" wire:model="V_facturado">
                    
                    <span class="text-danger">@error('V_facturado'){{$message}}@enderror()</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Debito </label>
                    <input type="text" class="form-control" wire:model="debito">
                    
                    <span class="text-danger">@error('debito'){{$message}}@enderror</span>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Credito </label>
                    <input type="text" class="form-control" wire:model="credito">
                    
                    <span class="text-danger">@error('credito'){{$message}}@enderror</span>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Valor Pago </label>
                    <input type="text" class="form-control" wire:model="v_pago">
                    
                    <span class="text-danger">@error('v_pago'){{$message}}@enderror</span>
                    </div>
                </div>

                
                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Divida/Saldo</label>
                    <input type="text" class="form-control" wire:model="divida">
                    
                    <span class="text-danger">@error('divida'){{$message}}@enderror</span>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Data de Pagamento</label>
                    <input type="text" class="form-control" wire:model="data_pagamento">
                    
                    <span class="text-danger">@error('data_pagamento'){{$message}}@enderror</span>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Numero Documento</label>
                    <input type="text" class="form-control" wire:model="n_doc">
                    
                    <span class="text-danger">@error('n_doc'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
        
           <div class="form-footer">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="m-3">
                            <a href="{{route('autor.home')}}" class="btn btn-link link-secondary">
                            Cancelar
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-2"></div>
                    
                    <div class="col-lg-2">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary ms-auto">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            Cadastrar empresa
                            </button>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </form> 
</div>

</div>
