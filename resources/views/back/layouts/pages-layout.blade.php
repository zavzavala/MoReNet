
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
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
    @stack('stylesheets')
    @livewireStyles
    <link href="./back/dist/css/demo.min.css" rel="stylesheet"/>
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
    <script src="{{ asset('back/dist/libs/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('back/dist/libs/ijabo/ijaboCropTool.min.js')}}"></script>
    <script src="{{ asset('back/dist/libs/toastr/toastr.min.js')}}"></script>
    <script src="./back/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
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
      //uncao JavaScript
      let doc = document.getElementById('doc')
    let remove_linha = document.getElementById('remove_linha')
    let add_linha = document.getElementById('add_linha')

    window.addEventListener('add_linha', function(event){
      
       //+++++     CRIACAO DO INPUT ANEXO E LABEL DO ANEXO
       let input_doc = document.createElement('input')
      let label_doc = document.createElement('label')

      //Settar os seus atributos
      input_doc.setAttribute('type', 'file')
      input_doc.setAttribute('wire:model', 'doc[]')
      input_doc.setAttribute('class', 'form-control')

      label_doc.setAttribute('class', 'custom-file-label')
      label_doc.innerHTML = 'Escolher ficheiros'

      //++++      CRIACAO DO INPUT DE DESCRICAO
      let input_desc = document.createElement('input')

      //Settar atributos
      input_desc.setAttribute('type', 'text')
      input_desc.setAttribute('class', 'form-control')
      input_desc.setAttribute('wire:model', 'desc_doc[]')
      input_desc.setAttribute('placeholder', 'Nome do documento')
      // input_desc.setAttribute('required')


      //+++++ CRIACAO DE DUAS COLUNAS PARA INPUT E DESCIRCAO
      let div_col = document.createElement('div')
      let div_col2 = document.createElement('div')

      //Settar os atributos
      div_col.setAttribute('class', 'col')
      div_col2.setAttribute('class', 'col')

      //+++++++++CRIACAO DO FORM ROW
      let form_row = document.createElement('div')

      //setar seus atributos
      form_row.setAttribute('class', 'form-row mb-3')

      //adicionar input file e sua label a primeira coluna
      div_col.appendChild(input_doc)
      // div_col.appendChild(label_doc)

      //Adiconar o input da descircao na sugunda coluna
      div_col2.appendChild(input_desc)

      //Adicionar a primeira e sugunda coluna na div form-row
      form_row.appendChild(div_col)
      form_row.appendChild(div_col2)

      //Adicionar a div form-row para o doc
      doc.appendChild(form_row)


    });
    add_linha.onclick = function() {
      event.preventDefault();


      //+++++     CRIACAO DO INPUT ANEXO E LABEL DO ANEXO
      let input_doc = document.createElement('input')
      let label_doc = document.createElement('label')

      //Settar os seus atributos
      input_doc.setAttribute('type', 'file')
      input_doc.setAttribute('wire:model', 'doc[]')
      input_doc.setAttribute('class', 'form-control')

      label_doc.setAttribute('class', 'custom-file-label')
      label_doc.innerHTML = 'Escolher ficheiros'

      //++++      CRIACAO DO INPUT DE DESCRICAO
      let input_desc = document.createElement('input')

      //Settar atributos
      input_desc.setAttribute('type', 'text')
      input_desc.setAttribute('class', 'form-control')
      input_desc.setAttribute('wire:model', 'desc_doc[]')
      input_desc.setAttribute('placeholder', 'Nome do documento')
      // input_desc.setAttribute('required')


      //+++++ CRIACAO DE DUAS COLUNAS PARA INPUT E DESCIRCAO
      let div_col = document.createElement('div')
      let div_col2 = document.createElement('div')

      //Settar os atributos
      div_col.setAttribute('class', 'col')
      div_col2.setAttribute('class', 'col')

      //+++++++++CRIACAO DO FORM ROW
      let form_row = document.createElement('div')

      //setar seus atributos
      form_row.setAttribute('class', 'form-row mb-3')

      //adicionar input file e sua label a primeira coluna
      div_col.appendChild(input_doc)
      // div_col.appendChild(label_doc)

      //Adiconar o input da descircao na sugunda coluna
      div_col2.appendChild(input_desc)

      //Adicionar a primeira e sugunda coluna na div form-row
      form_row.appendChild(div_col)
      form_row.appendChild(div_col2)

      //Adicionar a div form-row para o doc
      doc.appendChild(form_row)

    }

    remove_linha.onclick = function() {
      event.preventDefault();
      let input_tags = doc.getElementsByClassName('form-row')
      if (input_tags.length > 1) {
          doc.removeChild(input_tags[(input_tags.length) - 1])
      }

    }

   </script>
    <script src="./back/dist/js/demo.min.js"></script>
   
  </body>
</html>