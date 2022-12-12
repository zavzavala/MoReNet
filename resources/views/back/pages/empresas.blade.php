@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Empresas')
@section('content')
<br><br><br>
@livewire('empresas')
@endsection
@push('scripts')
<script>
    $(window).on('hide.bs.model', function(){
        Livewire.emit('resetForm');

    });

    window.addEventListener('ShowModalEdit_empresa', function(event){
        $('#edit_empresa').modal('show');
    });
    window.addEventListener('hide_edit_empresa', function(event){
        $('#edit_empresa').modal('hide');

    });
</script>
@endpush