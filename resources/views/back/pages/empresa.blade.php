@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Empresa')
@section('content')
<br><br><br>
@livewire('empresa')
@endsection