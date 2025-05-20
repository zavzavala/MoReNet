
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('pageTitle')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS files -->
    <base href="/">
 
    <link rel="stylesheet" href="{{asset('back/dist/libs/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{ asset('back/sweetalert2/sweetalert2.min.css') }}">
   
    <link href="/back/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="/back/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="/back/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="/back/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/back/dist/libs/ijabo/ijabo.min.css">
    <script src="/back/dist/libs/ijaboViewer/jquery.ijaboViewer.min.js"></script>
    <link rel="stylesheet" href="/back/dist/libs/ijaboCropTool/ijaboCropTool.min.css">
    
    @stack('stylesheets')
    @livewireStyles
    
    <link href="back/dist/css/demo.min.css" rel="stylesheet"/>
    <style>
      .swal2-popup{
        font-size: .85rem;
      }
    </style>
  </head>
  <body >
    <div class="wrapper">
      @include('back.layouts.inc.header')
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          @yield('pageHeader')
        </div>
        <div class="page-body">
            
          <div class="container-xl">
            @yield('content')
            </div>
        </div>
          @include('back.layouts.inc.footer')
        
      </div>
    </div>
   
    <!-- Libs JS -->
    <script src="{{asset('back/dist/libs/jquery/jquery-3.6.0.min.js')}}"></script>

  <!--  <script src="assets/js/jquery-1.10.2.js"></script> -->
<!-- CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
  <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
  <script src="assets/js/morris/morris.js"></script>
<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script src="{{ asset('back/dist/libs/ijabo/ijaboCropTool.min.js')}}"></script>
    <script src="{{ asset('back/dist/libs/toastr/toastr.min.js')}}"></script>
    <script src="./back/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('back/sweetalert2/sweetalert2.min.js') }}"></script>
    
    <!-- Tabler Core -->
    <script src="./back/dist/js/tabler.min.js"></script>
  
    @stack('scripts')
    @livewireScripts
    
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
    
    
    <script src="./back/dist/js/demo.min.js"></script>
    <script>
   
   window.addEventListener('add_usuario', function(event){
    $('#add_usuario').modal('show');
});

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
  </body>
</html>