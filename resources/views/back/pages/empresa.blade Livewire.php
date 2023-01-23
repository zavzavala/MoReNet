<div>
    {{-- The best athlete wants his opponent at his best. --}}

 <!-- EMpresas -->
 
    <form wire:submit.prevent = "store()" method="post" enctype = "form/multipart-data">   
        @csrf
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
                        <label class="form-label">Endereço electrônico da Empresa</label>
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
<p>OBs: Carrega Ficheiros se existirem</p>

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
<script>
   /*  let doc = document.getElementById('doc')
    let remove_linha = document.getElementById('remove_linha')
    let add_linha = document.getElementById('add_linha')


    add_linha.onclick = function() {
        event.preventDefault()


        //+++++     CRIACAO DO INPUT ANEXO E LABEL DO ANEXO
        let input_doc = document.createElement('input')
        let label_doc = document.createElement('label')

        //Settar os seus atributos
        input_doc.setAttribute('type', 'file')
        input_doc.setAttribute('name', 'doc[]')
        input_doc.setAttribute('class', 'form-control')

        label_doc.setAttribute('class', 'custom-file-label')
        label_doc.innerHTML = 'Escolher ficheiros'

        //++++      CRIACAO DO INPUT DE DESCRICAO
        let input_desc = document.createElement('input')

        //Settar atributos
        input_desc.setAttribute('type', 'text')
        input_desc.setAttribute('class', 'form-control')
        input_desc.setAttribute('name', 'desc_doc[]')
        input_desc.setAttribute('placeholder', 'Nome do documento')
        // input_desc.setAttribute('required')


        //+++++ CRIACAO DE DUAS COLUNAS PARA INPUT E DESCIRCAO
        let div_col = document.createElement('div')
        let div_col2 = document.createElement('div')

        //Settar os atributos
        div_col.setAttribute('class', 'col')
        div_col2.setAttribute('class', 'col')

        //+++++++++CRIACAO DO FORM ROW
        let form_row = document.createElement('div')

        //setar seus atributos
        form_row.setAttribute('class', 'form-row mb-3')

        //adicionar input file e sua label a primeira coluna
        div_col.appendChild(input_doc)
        // div_col.appendChild(label_doc)

        //Adiconar o input da descircao na sugunda coluna
        div_col2.appendChild(input_desc)

        //Adicionar a primeira e sugunda coluna na div form-row
        form_row.appendChild(div_col)
        form_row.appendChild(div_col2)

        //Adicionar a div form-row para o doc
        doc.appendChild(form_row)

    }

    remove_linha.onclick = function() {
        event.preventDefault()
        let input_tags = doc.getElementsByClassName('form-row')
        if (input_tags.length > 1) {
            doc.removeChild(input_tags[(input_tags.length) - 1])
        }
    } */
 </script>