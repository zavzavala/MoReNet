@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Servicos')
@section('content')
<br><br><br>
@livewire('services')

@endsection