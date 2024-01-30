
<!doctype html>
   
    <html lang="pt-pt">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>@yield('pageTitle')</title>
        <base href="/">
        <!-- CSS files -->
        <link href="./back/dist/css/tabler.min.css" rel="stylesheet"/>
        <link href="./back/dist/css/tabler-flags.min.css" rel="stylesheet"/>
        <link href="./back/dist/css/tabler-payments.min.css" rel="stylesheet"/>
        <link href="./back/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
        @stack('stylesheets')
        @livewireStyles

        <style>

            .password-toggle{

                position:relative;

            }

            .password-toggle input{

                padding-right: 30px;

            }

            .toggle-btn {

                position: absolute;
                right:5px;
                top:50%;
                transform: translateY(-50%);
                cursor:pointer;

            }


        </style>
        <link href="./back/dist/css/demo.min.css" rel="stylesheet"/>
    </head>
    <body class="border-top-wide border-primary d-flex flex-column">
        @yield('content')
        <!-- Libs JS -->



        
        <!-- Tabler Core -->
        <script src="./back/dist/js/tabler.min.js"></script>
        @stack('scripts')
        @livewireScripts
        <script src="./back/dist/js/demo.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="{{asset('back/dist/libs/jquery/jquery-3.6.0.min.js')}}"></script>
    
    </body>
</html>