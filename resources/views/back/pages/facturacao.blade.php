
@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Facturacao' )

@section('content')
<br><br>
@livewire('facturacao-controller')

@endsection
