@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Perfil')
@section('content')



@livewire('autor-header')
<hr>
<div class="row">
  <div class="card">
    <ul class="nav nav-tabs" data-bs-toggle="tabs">
      <li class="nav-item">
        <a href="#tabs-detalhes" class="nav-link active" data-bs-toggle="tab">Detalhes Pessoais</a>
      </li>
      <li class="nav-item">
        <a href="#tabs-password" class="nav-link" data-bs-toggle="tab">Alterar Password</a>
      </li>
    </ul>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane active show" id="tabs-detalhes">
          <div>
          @livewire('autor-personal-details')
          </div>
       
         
        </div>
        <div class="tab-pane" id="tabs-password">
          <div>
            @livewire('autor-change-password')
          </div>

        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
$('#changeProfilePicture').ijaboCropTool({
  preview : '',
  setRatio:1,
  allowedExtensions: ['jpg','jpeg','png'],
  buttonsText:['Recortar','Sair'],
  buttonsColor:['#30bf7d','#ee5155',-15],
  processUrl:'{{ route("autor.change-profile-picture")}}',
  withCSRF:['_token','{{csrf_token()}}'],
  onSuccess:function(message,element,status){
      //alert(message);
      toastr.success(message);     
      Livewire.emit('updateRefreshAutorProfileHeader');
      Livewire.emit('updateTopHeader');
  },
  onError:function(message,element,status){
    //alert(message);
    toastr.error(message);
  }
});
</script>
@endpush