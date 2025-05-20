
<!doctype html>
<html lang="pt-Pt">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('pageTitle')</title>
    
    <!-- CSS files -->
    <base href="/">

    <link href="./back/dist/css/tabler.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('back/dist/libs/toastr/toastr.min.css')}}">
    <link href="./back/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./back/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./back/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('back/dist/libs/ijabo/ijaboCropTool.min.css') }}">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('back/sweetalert2/sweetalert2.min.css') }}">

    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    @stack('stylesheets')
    @livewireStyles
   <!--  @powerGridStyles -->
    <link href="/back/dist/css/demo.min.css" rel="stylesheet"/>
    <style>
      .swal2-popup{
        font-size: .85rem;
      }
    </style>
  </head>
  <body >
    <div class="wrapper">
      @include('back.layouts.inc.header_tables')
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
    <script src="{{ asset('back/dist/libs/jquery/jquery-3.6.0.min.js')}}"></script>

    
<!--    <script src="assets/js/jquery-1.10.2.js"></script> -->

    <script src="{{ asset('back/dist/libs/ijabo/ijaboCropTool.min.js')}}"></script>
    <script src="{{ asset('back/dist/libs/toastr/toastr.min.js')}}"></script>
    <script src="./back/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <!-- Tabler Core -->
    <script src="./back/dist/js/tabler.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" ></script> -->
    <script src="./back/dist/js/demo.min.js"></script>
   
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="{{ asset('back/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- <script src="{{ asset('back/js/bootstrap.min.js') }}"></script> -->

    @stack('scripts')
    @livewireScripts
    <!-- @powerGridScripts -->
    <script>
       
     


   </script>
  
  </body>
</html>