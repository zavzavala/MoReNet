@extends('back.layouts.auth-layouts')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('content')
<div class="page page-center">
      <div class="container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./back/static/logo.png" height="36" alt=""></a>
        </div>
        @livewire('autor-login-form') 
      </div>
    </div>
@endsection