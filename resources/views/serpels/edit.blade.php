@extends('layouts.app')

@section('content')

<div class="container">

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)

        <li> {{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ url('/serpels/' . $serpel->id) }}"  method="POST"  enctype="multipart/form-data">
{{csrf_field()}}
{{ method_field('PATCH') }}

<h1> Modificar registro</h1>

@include ('serpels.form', ['Modo'=>'editar'])
    

</form>
</div>
@endsection