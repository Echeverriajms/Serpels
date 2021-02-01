@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))

<div class="alert alert-success" role="alert">

    {{ Session::get('Mensaje') }}

</div>



@endif

<a href="{{ url('serpels/create') }}" class="btn btn-info">Agregar Serie/Película</a>
<br>
<br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Genero</th>
            <th>Año</th>
            <th>Sinopsis</th>
            <th>Acciones</th>
        </tr>
    </thead>


    <tbody>
    
    @foreach ($serpels as $serpel)
        
    
    
        <tr>
            <td>{{$loop->iteration}}</td>

            <td>
            <img src="{{ asset('storage').'/'.$serpel->Foto}}" class="img-thumbnail img-fluid" alt="" width="100" >    
            </td>
            <td>{{$serpel->Nombre}}</td>
            <td>{{$serpel->Tipo}}</td>
            <td>{{$serpel->Genero}}</td>
            <td>{{$serpel->Año}}</td>
            <td>{{$serpel->Sinopsis}}</td>
            <td>
            
            
            <a class="btn btn-warning" href="{{ url ('/serpels/'.$serpel->id.'/edit') }}">
            
            Editar
            
            </a>
            
           <form method="post" action="{{ url('/serpels/'.$serpel->id)}}" style='display:inline'>
           {{csrf_field() }} 
           {{ method_field('DELETE') }}        
           <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');" >Borrar</button>  
           
           </form>
            
             </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$serpels->links() }}
</div>
@endsection

