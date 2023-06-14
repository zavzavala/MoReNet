@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Empresa')
@section('content')
<br><br><br>
<div>
    {{-- The best athlete wants his opponent at his best. --}}

 <!-- EMpresas -->

    <form action="{{ route('autor.empresa.update', ['id'=>Request('id')])}}" method="post" id="edistEmpresa" enctype = "form/multipart-data">   
        @csrf
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Campos de cadastro
                    </div>
                    <div class="panel-body">
                        <div class="mb-3">
                        
                            <!--<label class="form-label">Instituicao de Ensino</label> -->
                            <div class="form-selectgroup-boxes row mb-3">

                                <div class="col-lg-6">
                                    <label class="form-label">Cliente/Empresa</label>
                                    <input type="text" class="form-control" name="cliente" value="{{old('cliente',$data->empresa)}}" placeholder="Nome da Empresa/Cliente">
                                @if($errors->has('cliente'))
                                    <span role="alert" class="text-danger">{{$errors->first('cliente')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Largura Banda Contratada</label>
                                    <input type="number" name="largura_banda_contratada" value="{{$data->largura_banda_contratada}}" id="banda_contrada" class="form-control">
                                @if($errors->has('largura_banda_contratada'))
                                    <span role="alert" class="text-danger">{{$errors->first('largura_banda_contratada')}}</span>
                                @endif
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Data Contrato</label>
                                    <input type="date" name="data_contrato" value="{{old('data_contrato', $data->data_contrato)}}" class="form-control">
                                    @if($errors->has('data_contrato'))
                                    <span role="alert" class="text-danger">{{$errors->first('data_contrato')}}</span>
                                @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label class="form-label">Tipo de Empresa</label>
                                    <select class="form-select" name="tipo_empresa" value="{{old('tipo_empresa', $data->tipo_empresa)}}">
                                        <option value="" selected="">---Selecione---</option>
                                    @foreach(\App\Models\tipo_empresa::all() as $item)
                                    <option value="{{$item->tipo}}" {{$data->tipo_empresa == $item->tipo ? 'selected ' : '' }}>{{$item->tipo}}</option>
                                    @endforeach
                        
                                    </select>
                                    @if($errors->has('tipo_empresa'))
                                        <span role="alert" class="text-danger">{{$errors->first('tipo_empresa')}}</span>
                                    @endif
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Página Web da Empresa</label>
                                        <div class="input-group input-group-flat">
                                            <span class="input-group-text">
                                            https://www.
                                            </span>
                                            <input type="text" class="form-control ps-0" name="url" value="{{old('url',$data->url)}}" autocomplete="off">
                                            
                                        </div>
                                        @if($errors->has('url'))
                                            <span role="alert" class="text-danger">{{$errors->first('url')}}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label class="form-label">E-mail</label>
                                    
                                    <input type="text" name="email"  value="{{old('email',$data->email)}}" class="form-control">
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
                                        <input type="text" name="telefone"  value="{{old('telefone',$data->telefone)}}" class="form-control">

                                    </div>
                                    @if($errors->has('telefone'))
                                    <span role="alert" class="text-danger">{{$errors->first('telefone')}}</span>
                                    @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Endereco</label>
                                        <input type="text" name="endereco" value="{{old('endereco',$data->localizacao)}}" class="form-control">
                                        @if($errors->has('endereco'))
                                        <span role="alert" class="text-danger">{{$errors->first('endereco')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label for="" class="form-label">Nuit</label>
                                    <input type="text" class="form-control" name="nuit" value="{{old('nuit',$data->nuit)}}">
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
                                        <textarea class="form-control" name="descricao" value="{{old('descricao',$data->descricao)}}" rows="3">{{$data->descricao}}</textarea>
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
        </div>
    </form> 
</div>
<script>
  
 </script>
@endsection

@push('scripts')
    <script src="/back/dist/libs/jquery/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function(){

            $('#editEmpresa').on('submit', function(e){
            
                e.preventDefault();
            // alert('success');
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