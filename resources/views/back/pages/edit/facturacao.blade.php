
@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Editar Dados' )

@section('content')
    <br><br>

    <form action="{{route('autor.facturacao.update', ['id'=>Request('id')]) }}" method="post" id="editFactura">   
        @CSRF
        <div class="mb-3">
           
         <!--    <label class="form-label">Instituicao de Ensino</label> -->
            <div class="form-selectgroup-boxes row mb-3">
            <!--  -->
            <div class="col-lg-6">
            <label class="form-label">Cliente/Empresa</label>
            <select class="form-control" name="cliente" placeholder="Nome da Empresa/Cliente">
               
                @foreach(\App\Models\empresa::all() as $empresa)
                    <option value = "{{$empresa->id}}" {{$data->empresa_id == $empresa->id ? 'selected' : ''}}>{{$empresa->empresa}}</option>
                @endforeach
            </select>
           
            <span class="text-danger error-text cliente_error"></span>
            
            </div>
       
                <div class="col-lg-6">
                    <label class="form-label">Data de pagamento</label>
                    <input type="date" name="data_pagamento" value="{{$data->data_pagamento}}" class="form-control">
                    <span class="text-danger error-text data_pagamento_error"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Aumento Banda</label>
                        <div class="input-group input-group-flat">
                           
                            <input type="text" class="form-control ps-0" value="{{$data->aumento_banda}}" name="aumento_banda" autocomplete="off">
                            
                        </div>
                        <span class="text-danger error-text aumento_banda_error"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preço Unitario</label>
                        <div class="input-group input-group-flat">
                            
                            <input type="text" class="form-control ps-0" value="{{$data->preco_unitario}}" name="preco_unitario" autocomplete="off">
                                
                        </div>
                         <span class="text-danger error-text preco_unitario_error"></span>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label class="form-label">Ano</label>
                    
                    <input type="number" name="ano" value="{{$data->ano}}" maxlength="4" class="form-control">
                    <span class="text-danger error-text ano_error"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label class="form-label">Mes</label>
                    <select name="mes" id="" class="form-select">
                        <option value="">--Selecione--</option>
                            @foreach(\App\Models\Moth::all() as $mes){
                                <option value="{{$mes->mes}}" {{$data->mes == $mes->mes ? 'selected' : ''}}>{{$mes->mes}}</option>
                            }@endforeach
                    </select>
                    
                    <span class="text-danger error-text mes_error"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Numero Factura</label>
                        <input type="text" name="n_factura" value="{{$data->n_factura}}" class="form-control">
                        <span class="text-danger error-text n_factura_error"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                    <label for="" class="form-label">Valor Facturado</label>
                    <input type="text" class="form-control" name="valor_facturado" value="{{$data->valor_facturado}}">
                    
                    <span class="text-danger error-text valor_facturado_error"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Debito </label>
                    <input type="text" class="form-control" name="debito" value="{{$data->debito}}">
                    
                    <span class="text-danger error-text debito_error"></span>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Credito </label>
                    <input type="text" class="form-control" name="credito" value="{{$data->credito}}">
                    
                    <span class="text-danger error-text credito_error"></span>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Valor Pago </label>
                    <input type="text" class="form-control" name="valor_pago" value="{{$data->valor_pago}}">
                    
                    <span class="text-danger error-text valor_pago_error"></span>
                    </div>
                </div>

                
                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Divida/Saldo</label>
                    <input type="text" class="form-control" name="divida" value="{{$data->divida_saldo}}">
                    
                    <span class="text-danger error-text divida_error"></span>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Largura de Banda</label>
                    <input type="text" class="form-control" name="largura_banda" value="{{$data->largura_banda}}">
                    
                    <span class="text-danger error-text banda_error"></span>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div>
                    <label class="form-label">Numero Documento</label>
                    <input type="text" class="form-control" name="numero_doc" value="{{$data->n_documento}}">
                    
                    <span class="text-danger error-text numero_doc_error"></span>
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
                            Alterar empresa
                            </button>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </form> 

@endsection

@push('scripts')
<script src="/back/dist/libs/jquery/jquery-3.6.0.min.js"></script>
<script src="/ckeditor/ckeditor.js"></script>
<script>
    $(function(){

        $('form#editFactura').on('submit', function(e){
            e.preventDefault();
            toastr.remove();
            var form = this;
        
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(response){
                    toastr.remove();
                    if(response.code == 1){
                    toastr.success(response.msg);
                    }else{
                        toastr.error(response.msg);
                    }
                },
                error:function(response){
                    toastr.remove();
                    $.each(response.responseJSON.errors, function(prefix,val){
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                }
            });
        }); 

    });  
      
</script>
@endpush
