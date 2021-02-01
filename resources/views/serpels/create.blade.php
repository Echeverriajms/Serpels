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
<form  action="{{ url('/serpels')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{csrf_field() }}

<h1> Agregar registro</h1>

@include ('serpels.form', ['Modo'=>'crear'])


</form>
</div>
@endsection
