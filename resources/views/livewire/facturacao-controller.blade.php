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
        <!--  -->
                <div class="col-lg-6">
                    <label class="form-label">Cliente/Empresa</label>
                    <select class="form-control" wire:model="cliente" placeholder="Nome da Empresa/Cliente">
                        <option value="">-Selecione-</option>
                        @foreach(\App\Models\empresa::all() as $empresa)
                            <option value = "{{$empresa->id}}">{{$empresa->empresa}}</option>
                        @endforeach
                    </select>
                
                    <span class="text-danger">@error('cliente'){{$message}}@enderror()</span>
                </div>

                <div class="col-lg-6">

                    <label class="form-label">Largura de Banda Contratada</label>
                    <input type="text" name="largura_banda_contratada" wire:model ="largura_banda_contratada" id="largura_banda_contratada" class="form-control">
                    <span class="text-danger">@error('largura_banda_contratada'){{$message}}@enderror()</span>
                </div>
                <div class="col-lg-6">

                    <label class="form-label">Preço unitario</label>
                    <input type="text" name ="preco_unitario" wire:model ="preco_unitario" id="preco_unitario" class="form-control">
                        <span class="text-danger">@error('preco_unitario'){{$message}}@enderror()</span>           
                </div>
                 <div class="col-lg-6">

                    <label class="form-label">Largura de Banda Facturada</label>
                    <input type="text" name="banda_facturada" id="banda_facturada" wire:model ="banda_facturada" class="form-control">
                    <span class="text-danger">@error('banda_facturada'){{$message}}@enderror()</span>           
                </div>
                <div class="col-lg-6">

                    <label class="form-label">Valor Facturado</label>
                    <input type="text" wire:model ="valor_facturado" name="valor_facturado" id="valor_facturado" class="form-control">
                    <span class="text-danger">@error('cliente'){{$message}}@enderror()</span>           
                </div>
                 <div class="col-lg-6">

                    <label class="form-label">Aumento Largura de Banda</label>
                    <input type="text" wire:model ="aumento_banda" id="aumento_banda" class="form-control">
                    <span class="text-danger">@error('aumento_banda'){{$message}}@enderror()</span>           

                </div>
                <div class="col-lg-6">

                    <label class="form-label">Data de Aumento</label>
                    <input type="date" wire:model ="data_aumento_banda" class="form-control">
                    <span class="text-danger">@error('data_aumento_banda'){{$message}}@enderror()</span>           

                </div>
                 <div class="col-lg-6">

                    <label class="form-label">Diminuicao Largura de Banda</label>
                    <input type="text" wire:model ="diminuicao_banda" id="diminuicao_banda" class="form-control">
                    <span class="text-danger">@error('diminuicao_banda'){{$message}}@enderror()</span>           

                </div>
                <div class="col-lg-6">

                    <label class="form-label">Data de Diminuicao</label>
                    <input type="date" wire:model ="data_diminuicao_banda" id="data_diminuicao_banda" class="form-control">
                    <span class="text-danger">@error('data_diminuicao_banda'){{$message}}@enderror()</span>           

                </div>
                 <div class="col-lg-6">

                    <label class="form-label">Comprovativo</label>
                    <input type="text" wire:model ="comprovativo" class="form-control">
                    <span class="text-danger">@error('comprovativo'){{$message}}@enderror()</span>           

                </div>
                <div class="col-lg-6">

                    <label class="form-label">Data de Facturacao</label>
                    <input type="date" wire:model ="data_facturacao" class="form-control">
                    <span class="text-danger">@error('data_facturacao'){{$message}}@enderror()</span>           

                </div>
                 <div class="col-lg-6">

                    <label class="form-label">Valor Pago</label>
                    <input type="text" wire:model ="valor_pago" name="valor_pago" id="valor_pago" class="form-control">
                    <span class="text-danger">@error('valor_pago'){{$message}}@enderror()</span>           

                </div>
                <hr>Notas<hr>
                 <div class="col-lg-6">

                    <label class="form-label">Valor Debito</label>
                    <input type="text" wire:model ="debito" id="debito" class="form-control">
                    <span class="text-danger">@error('debito'){{$message}}@enderror()</span>           

                </div>
                  <div class="col-lg-3">

                    <label class="form-label">Valor Credito</label>
                    <input type="text" wire:model ="credito" id="credito" class="form-control">
                    <span class="text-danger">@error('credito'){{$message}}@enderror()</span>           

                </div>
                <div class="col-lg-3">

                    <label class="form-label">Divida</label>
                    <input type="text" wire:model ="divida" id="divida" class="form-control">
                    <span class="text-danger">@error('divida'){{$message}}@enderror()</span>           

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

@push('scripts')

<script>
    jQuery(document).ready(function(e){
       // e.preventDefault();
        jQuery('input').on('keyup',function(){
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
            
        });

    });
</script>
<!-- 
<script>
        function ValorDivida() {
        /* var DividaTotal = $("#divida").val();
        console.log(DividaTotal); */
        var valorPago = $("#valor_pago").val();
        console.log(valorPago);

        var credito = $("#credito").val();
        console.log(credito);
        var debito = $("#debito").val();
        console.log(debito);

        var ValorFacturado = $("#valor_facturado").val();
        console.log(valor_facturado);

        var total;

        total = ValorFacturado + debito - credito - valorPago;
      
        ValorDivida = total.toLocaleString("pt-PT", {
            style: "currency",
            currency: "MZN"
        });
        console.log(ValorDivida);
        $("#divida").val(ValorDivida);
    }
</script> -->
@endpush
</div>
