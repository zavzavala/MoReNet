@extends('back.layouts.tables-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Empresas')
@section('content')
<br><br><br>
@livewire('empresas')
@endsection
@push('scripts')
<script>
     $(document).ready(function() {

    $(document).on('click','#deletefactura', function(e){
        e.preventDefault();
        var factura_id = $(this).data('id');
        var url = '<?= route("autor.facturacao.destroy") ?>';

        swal.fire({
            title:'Atencao!',
            html:'Deseja <b>eliminar</b> este registro?',
            showCancelButton:true,
            showCloseButton:true,
            cancelButtonText:'Cancelar',
            confirmButtonText:'Sim, eliminar',
            cancelButtonColor:'#d33',
            confirmButtonColor:'#556ee6',
            width:400,
            allowOutsideClick:false
        }).then(function(result){
                if(result.value){
                    $.post(url,{factura_id:factura_id}, function(data){
                        if(data.code == 1){
                            
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                    }, 'json');
                }
        });

    });
 
});
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