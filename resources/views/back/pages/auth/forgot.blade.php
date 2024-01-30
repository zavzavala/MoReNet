@extends('back.layouts.auth-layouts')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Forgot Password')
@section('content')
<div class="page page-center">
      <div class="container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./back/static/logo.png" height="100" alt=""></a>
        </div>
        @livewire('autor-forgot-form')
        <div class="text-center text-muted mt-3">
          <a href="{{route('autor.login')}}">Voltar</a> para a tela de Login.
        </div>
      </div>
      @include('back.layouts.inc.footerLogin')

    </div>
@endsection