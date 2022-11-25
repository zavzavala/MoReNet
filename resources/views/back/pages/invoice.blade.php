@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle: 'Invoice')

@section('content')
<br><br><br>
@livewire('invoice')

@endsection