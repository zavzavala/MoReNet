@extends('back.layouts.auth-layouts')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Usuario')
@section('content')
<div class="page page-center">
      <div class="container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./back/static/logo.png" height="36" alt=""></a>
        </div>
        @livewire('register-user')
        <div class="text-center text-muted mt-3">
       <a href="{{ route('autor.home') }}" tabindex="-1">Cancelar</a>
        </div>
      </div>
    </div>
@endsection