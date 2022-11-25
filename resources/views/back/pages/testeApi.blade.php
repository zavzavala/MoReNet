@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Teste')

@section('content')
    <br><br><br>
    <form action="{{ route('test.store') }}" method="POST">
       @CSRF
        <label for="">empresa</label>
        <input type="text" name="name">
        <span class="text-danger name_error">@error('name_error')@enderror</span>
        <br>
        <label for="">telefone</label>
        <input type="text" name="telefone">
        <span class="text-danger telefonee_error">@error('telefone_error')@enderror</span>
        <br><br>
        <input type="submit" class="btn btn-success" value="Save">
    </form>
@endsection