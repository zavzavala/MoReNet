
@extends('back.layouts.users')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Facturacao' )

@section('content')
    <br><br><br><br>
    <div class="mb-3">
        <form action="<?= route('autor.facturacao.store') ?>" method="post" id="xxCad_facturacao">
            @CSRF  
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        Campos de cadastro
                        </div>
                        <div class="panel-body">
                            <div class="form-selectgroup-boxes row mb-3">
                                <!--  -->
                                <div class="col-lg-6">
                                    <label class="form-label">Cliente/Empresa</label>
                                    <select class="form-control"name="cliente" placeholder="Nome da Empresa/Cliente">
                                        <option value="">-Selecione-</option>
                                        @foreach(\App\Models\empresa::all() as $empresa)
                                            <option value = "{{old('cliente',$empresa->id)}}">{{$empresa->empresa}}</option>
                                        @endforeach
                                    </select>
                                        @if($errors->has('cliente'))
                                            <span role="alert" class="text-danger">{{$errors->first('cliente')}}</span>
                                        
                                        @endif
                                    
                                </div>

                                <div class="col-lg-6">

                                    <label class="form-label">Largura de Banda Contratada</label>
                                    <input type="text" name="largura_banda_contratada" value="{{old('largura_banda_contratada')}}" id="largura_banda_contratada" class="form-control">
                                    @if($errors->has('largura_banda_contratada'))
                                    <span role="alert" class="text-danger">{{$errors->first('largura_banda_contratada')}}</span>
                                    
                                    @endif
                                </div>
                                <div class="col-lg-6">

                                    <label class="form-label">Preço unitario</label>
                                    <input type="text" name ="preco_unitario" value="{{old('preco_unitario')}}" id="preco_unitario" class="form-control">
                                    @if($errors->has('preco_unitario'))
                                    <span role="alert" class="text-danger">{{$errors->first('preco_unitario')}}</span> 
                                    
                                    @endif
                                </div>
                                <div class="col-lg-6">

                                    <label class="form-label">Largura de Banda Facturada</label>
                                    <input type="text" name="banda_facturada" value="{{old('banda_facturada')}}" id="banda_facturada" class="form-control">
                                    @if($errors->has('banda_facturada'))
                                    <span role="alert" class="text-danger">{{$errors->first('banda_facturada')}}</span>

                                    @endif
                                </div>
                                <div class="col-lg-6">

                                    <label class="form-label">Valor Facturado</label>
                                    <input type="text" name="valor_facturado" id="valor_facturado" class="form-control">
                                    @if($errors->has('valor_facturado'))
                                        <span role="alert" class="text-danger">{{$errors->first('valor_facturado')}}</span>
                                    
                                    @endif        
                                </div>
                                <div class="col-lg-6">

                                    <label class="form-label">Aumento Largura de Banda</label>
                                    <input type="text" id="aumento_banda" value="{{old('aumento_banda')}}" name="aumento_banda" class="form-control">
                                    @if($errors->has('aumento_banda'))
                                        <span role="alert" class="text-danger">{{$errors->first('aumento_banda')}}</span>
                                    
                                    @endif 

                                </div>
                                <div class="col-lg-6">

                                    <label class="form-label">Data de Aumento</label>
                                    <input type="date" name ="data_aumento_banda" value="{{old('data_aumento_banda')}}" class="form-control">
                                    @if($errors->has('data_aumento_banda'))
                                    {
                                        <span role="alert" class="text-danger">{{$errors->first('data_aumento_banda')}}</span>           

                                    }
                                    @endif
                                </div>
                                <div class="col-lg-6">

                                    <label class="form-label">Diminuicao Largura de Banda</label>
                                    <input type="text" name ="diminuicao_banda" value="{{old('diminuicao_banda')}}" id="diminuicao_banda" class="form-control">
                                    @if($errors->has('diminuicao_banda'))
                                        <span role="alert" class="text-danger">{{$errors->first('diminuicao_banda')}}</span> 
                                    
                                    @endif       

                                </div>
                                <div class="col-lg-6">

                                    <label class="form-label">Data de Diminuicao</label>
                                    <input type="date" name ="data_diminuicao_banda" value="{{old('data_diminuicao_banda')}}" id="data_diminuicao_banda" class="form-control">
                                    @if($errors->has('data_diminuicao_banda'))

                                    <span role="alert" class="text-danger">{{$errors->first('data_diminuicao_banda')}}</span>           

                                    
                                    @endif
                                </div>
                                <div class="col-lg-6">

                                    <label class="form-label">Comprovativo</label>
                                    <input type="text" name ="comprovativo" value="{{old('comprovativo')}}" class="form-control">
                                    @if($errors->has('comprovativo'))
                                    <span role="alert" class="text-danger">{{$errors->first('comprovativo')}}</span>           

                                    
                                    @endif
                                </div>
                                <div class="col-lg-6">

                                    <label class="form-label">Data de Facturacao</label>
                                    <input type="date" name ="data_facturacao" value="{{old('data_facturacao')}}" class="form-control">
                                    @if($errors->has('data_facturacao'))
                                        <span role="alert" class="text-danger">{{$errors->first('data_facturacao')}}</span>           

                                    
                                    @endif
                                </div>
                                <div class="col-lg-6">

                                    <label class="form-label">Valor Pago</label>
                                    <input type="text" name ="valor_pago" name="valor_pago" value="{{old('valor_pago')}}" id="valor_pago" class="form-control">
                                    @if($errors->has('valor_pago'))
                                        <span role="alert" class="text-danger">{{$errors->first('valor_pago')}}</span>           

                                    
                                    @endif
                                </div>
                                <hr>Notas<hr>
                                <div class="col-lg-6">

                                    <label class="form-label">Valor Debito</label>
                                    <input type="text" name ="debito" id="debito" value="{{old('debito')}}" class="form-control">
                                    @if($errors->has('debito'))
                                        <span role="alert" class="text-danger">{{$errors->first('debito')}}</span>           

                                    
                                    @endif
                                </div>
                                <div class="col-lg-3">

                                    <label class="form-label">Valor Credito</label>
                                    <input type="text" name ="credito" id="credito" value="{{old('credito')}}" class="form-control">
                                    @if($errors->has('credito'))
                                        <span role="alert" class="text-danger">{{$errors->first('credito')}}</span>           

                                    
                                    @endif
                                </div>
                                <div class="col-lg-3">

                                    <label class="form-label">Divida</label>
                                    <input type="text" name ="divida" id="divida" value="{{old('divida')}}" class="form-control">
                                    @if($errors->has('divida'))
                                    
                                    <span role="alert" class="text-danger">{{$errors->first('divida')}}</span>           

                                    
                                    @endif
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
                    </div>
                </div>
            </div>
        </form> 
    </div>
    
@endsection
@push('scripts')
<script src="/back/dist/libs/jquery/jquery-3.6.0.min.js"></script>

<script>
    jQuery(document).ready(function(e){
       // e.preventDefault();
        jQuery('input').on('keyup',function(){
            if(jQuery(this).attr('name') === 'divida'){
            return false;
            }
            if(jQuery(this).attr('name') === 'banda_facturada'){
            return false;
            }
            else if(jQuery(this).attr('name') === 'valor_facturado'){
            return false;
            }
            
            //valor_pago
            //debito,credito,divida
            var largura_banda_contratada = (jQuery('#largura_banda_contratada').val() == '' ? 0 : jQuery('#largura_banda_contratada').val());
            var aumento_banda = (jQuery('#aumento_banda').val() == '' ? 0 : jQuery('#aumento_banda').val());
            var diminuicao_banda = (jQuery('#diminuicao_banda').val() == '' ? 0 : jQuery('#diminuicao_banda').val());
            var preco_unitario = (jQuery('#preco_unitario').val() == '' ? 0 : jQuery('#preco_unitario').val());
         
            var banda_facturada = (parseInt(largura_banda_contratada) + parseInt(aumento_banda) - parseInt(diminuicao_banda));
            var valor_facturado = (parseInt(banda_facturada) * parseInt(preco_unitario));
            jQuery('#banda_facturada').val(banda_facturada);
            jQuery('#valor_facturado').val(valor_facturado);        
            ////lmsw.com
            //////////////Notas de débito e credito
            //$divida = $this->valor_facturado + $this->debito - $this->credito - $this->valor_pago;

            var debito = (jQuery('#debito').val() == '' ? 0 : jQuery('#debito').val());
            var credito = (jQuery('#credito').val() == '' ? 0 : jQuery('#credito').val());
            var valor_pago = (jQuery('#valor_pago').val() == '' ? 0 : jQuery('#valor_pago').val());
            //var valor_facturado = (jQuery('#valor_facturado').val() == '' ? 0 : jQuery('#valor_facturado').val());
         
            var divida = (parseInt(valor_facturado) + parseInt(debito) - parseInt(credito) - parseInt(valor_pago) );
         
            //var total2 = (parseInt(divida) - parseInt(total));

            jQuery('#divida').val(divida);

        });

        $('form#Cad_facturacao').on('submit', function(e){
        
        e.preventDefault();
        //alert('success');
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
            success:function(data){
                if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                }else{
                    $(form)[0].reset();
                    
                    toastr.success(data.msg);
                }
            }
        });
    });

    });

     

</script>

@endpush
