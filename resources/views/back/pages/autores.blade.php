@extends('back.layouts.users')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Usuarios')
@section('content')
    <br><br><br>
    @livewire('autores')
@endsection
@push('scripts')
<script>
    window.addEventListener('showToastr',function(event){
      toastr.remove();
      if(event.detail.type === 'info'){
        toastr.info(event.detail.message);
      }else if(event.detail.type === 'success'){
          toastr.success(event.detail.message);
      }else if(event.detail.type === 'error'){
        toastr.error(event.detail.message);
      }else if(event.detail.type === 'warning'){
          toastr.warning(event.detail.message);
      }else{
        return false;
      }
    });
     
   
    
   </script>
<script>
    
$(document).ready(function() {

    $.ajaxSetup({
        headers: {
    
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

$(document).on('click','#deleteUser', function(e){
    //e.preventDefault();
    var id = $(this).data('id');
  
    var url = '<?= route("autor.deleteUser") ?>';

    swal.fire({
        title:'Atenção!',
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
            $.post(url,{id:id}, function(data){
                if(data.code == 1){
                
                    toastr.success(data.msg);
                }else{
                    toastr.error(data.msg);
                }
            },'json');
        }

    });

});




});
</script>
@endpush