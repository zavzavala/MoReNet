@extends('back.layouts.users')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Empresa')
@section('content')
    <br><br><br>
    
    <form action="{{ route('autor.empresa.store') }}" method="post" enctype = "form/multipart-data" id="xcad_empresa">   
        @csrf
        </hr>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Campos de cadastro
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <br>
                    <br>
                    <br>
                    <div class="panel-body">
        
                        <div class="mb-3">
                        
                            <!--<label class="form-label">Instituicao de Ensino</label>-->
                            <div class="form-selectgroup-boxes row mb-3">

                            <div class="col-lg-6">
                                <label class="form-label">Cliente/Empresa</label>
                                <input type="text" class="form-control" name="empresa" placeholder="Nome da Empresa/Cliente" value="{{ old('empresa') }}">
                                @if($errors->has('empresa'))
                                    <span role="alert" class="text-danger">{{$errors->first('empresa')}}</span>
                                @endif
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label">Largura Banda Contratada</label>
                                <input type="number" name="largura_banda_contratada" id="banda_contrada" class="form-control" value="{{ old('largura_banda_contratada') }}">
                                @if($errors->has('largura_banda_contratada'))
                                    <span role="alert" class="text-danger">{{$errors->first('largura_banda_contratada')}}</span>
                                @endif
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label">Data Contrato</label>
                                <input type="date" name="data_contrato" class="form-control" value="{{ old('data_contrato') }}">
                                @if($errors->has('data_contrato'))
                                    <span role="alert" class="text-danger">{{$errors->first('data_contrato')}}</span>
                                @endif
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tipo de Empresa</label>
                                    <select class="form-select" name="tipo_empresa">
                                        <option value="" selected="">---Selecione---</option>
                                        @foreach(\App\Models\tipo_empresa::all() as $item)
                                            <option value="{{$item->tipo}}" {{ old('tipo_empresa') == $item->tipo ? 'selected' : '' }}>
                                                {{$item->tipo}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('tipo_empresa'))
                                        <span role="alert" class="text-danger">{{$errors->first('tipo_empresa')}}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Restante do código seguindo o mesmo padrão... -->


                            
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Endereço electrônico da Empresa</label>
                                        <div class="input-group input-group-flat">
                                            <span class="input-group-text">
                                           
                                            </span>
                                            <input type="text" value="{{old('url')}}" placeholder="https://www.site.com" class="form-control ps-0" name="url" autocomplete="off">
                                            
                                        </div>
                                        @if($errors->has('url'))
                                            <span role="alert" class="text-danger">{{$errors->first('url')}}</span>
                                        @endif
                                    </div>
                                </div>
                            
                        
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label class="form-label">E-mail</label>
                                    
                                    <input type="text" name="email" value="{{old('email')}}" class="form-control">
                                    @if($errors->has('email'))
                                        <span role="alert" class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Telefone</label>
                                        <div class="input-group input-group-flat">
                                            <span class="input-group-text">+258</span>
                                            <input type="text" name="telefone" value="{{old('telefone')}}" class="form-control">

                                        </div>
                                    
                                        @if($errors->has('telefone'))
                                            <span role="alert" class="text-danger">{{$errors->first('telefone')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Endereco</label>
                                        <input type="text" name="endereco" value="{{old('endereco')}}" class="form-control">
                                        @if($errors->has('endereco'))
                                            <span role="alert" class="text-danger">{{$errors->first('endereco')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label for="" class="form-label">Nuit</label>
                                    <input type="text" class="form-control" name="nuit" value="{{old('nuit')}}">
                                    @if($errors->has('nuit'))
                                        <span role="alert" class="text-danger">{{$errors->first('nuit')}}</span>
                                    @endif
                                </div>
                                </div>
                            
                                <div class="col-lg-6">
                                    <div id="doc">

                                        <label for="documento">Carregar Anexos</label>
                                    
                                        <div class="form-rem form-row">

                                            <div class="col">
                                                <input type="file" class="form-control" name="doc_anexo">
                                                {{-- <label class="custom-file-label" for="doc_anexo">Escolher Ficheiro</label> --}}
                                                <span class="text-danger error-text doc_anexo_error"></span>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control"
                                                name="desc_doc" placeholder="Descrição do documento" value="{{ old('dodesc_docc[0]') }}">
                                                <span class="text-danger error-text desc_doc_error"></span>
                                            </div>
                                        </div>

                                    </div>
                                    
                                </div>

                                <div class="col-lg-6">
                                    <div>
                                        <label class="form-label">Informação Adicional</label>
                                        <textarea class="form-control" name="descricao" rows="3">{{ old('descricao') }}</textarea>
                                        @if($errors->has('descricao'))
                                            <span role="alert" class="text-danger">{{$errors->first('descricao')}}</span>
                                        @endif
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
        </div>  
    </form> 

@endsection
@push('scripts')

<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>

<script>
    $(document).ready(function(){

        $('form#cad_empresa').on('submit', function(e){
            e.preventDefault();
            var form = this;  // Mova esta linha para cá
          /*   console.log('Formulário submetido!');
            console.log('URL:', $(form).attr('action'));
            console.log('Método:', $(form).attr('method'));
            console.log('Dados:', new FormData(form)); */
            
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
                success: function(response) {
                    // toastr.remove();
                    if (response.code == 0) {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $(form)[0].reset();
                        toastr.success(response.msg);
                    }
                }

            });
        }); 

    });  
   setTimeout(function() {
        $('.alert-success').fadeOut('slow');
    }, 5000); // 5000 milissegundos (5 segundos)
</script>
@endpush
