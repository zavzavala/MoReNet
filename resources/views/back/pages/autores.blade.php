@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Usuarios')
@section('content')
<br><br><br>
 @livewire('autores')
@endsection
@push('scripts')
<script>
$(window).on('hide.bs.modal', function(){
    Livewire.emit('resetForm');

});

window.addEventListener('hide_modal_autor', function(event){
    $('#add_usuario').modal('hide');
});

window.addEventListener('hide_edit_modal', function(event){
    $('#edit_usuario').modal('hide');
});

window.addEventListener('ShowModalEdit_usuario', function(event){
    $('#edit_usuario').modal('show');
});
    
window.addEventListener('ShowModalEmpresa', function(event){
    $('#company').modal('show');
});
</script>
@endpush