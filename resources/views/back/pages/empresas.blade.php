@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Empresas')
@section('content')
<br><br><br>
@livewire('empresas')
@endsection