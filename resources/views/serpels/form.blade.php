
<div class="form-group">
<label for="Nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" class="form-control {{$errors->has('Nombre')?'is-invalid':'' }}" name="Nombre" id="Nombre" 
value="{{ isset($serpel->Nombre)?$serpel->Nombre:old('Nombre') }}"> 
{!! $errors->first('Nombre','<div class="invalid-feedback">:message </div>') !!}

</div>

<div class="form-group">
<label for="Tipo" class="control-label">{{'Tipo de entretenimiento'}} </label> 
<select name="Tipo" class="form-control" id="Tipo">
	<option value="Serie">Serie</option>
	<option value="Pelicula">Pelicula</option>
</select>
</div>

<div class="form-group">
<label for="Genero" class="control-label">{{'Genero'}}</label>
<input type="text" class="form-control {{$errors->has('Genero')?'is-invalid':'' }}" name="Genero" id="Genero" value="{{ isset($serpel->Genero)?$serpel->Genero:old('Genero') }}">  
{!! $errors->first('Genero','<div class="invalid-feedback">:message </div>') !!}

</div>

<div class="form-group">
<label for="Año" class="control-label">{{'Año'}}</label>
<input type="number" class="form-control {{$errors->has('Año')?'is-invalid':'' }}" name="Año" id="Año" value="{{ isset($serpel->Año)?$serpel->Año:old('Año') }}">  
{!! $errors->first('Año','<div class="invalid-feedback">:message </div>') !!}
</div>

<div class="form-group">
<label for="Sinopsis" class="control-label">{{'Sinopsis'}}</label>
<textarea name="Sinopsis" class="form-control {{$errors->has('Sinopsis')?'is-invalid':'' }}" rows="5" cols="60">{{ isset($serpel->Sinopsis)?$serpel->Sinopsis:old('Sinopsis') }} </textarea>
{!! $errors->first('Sinopsis','<div class="invalid-feedback">:message </div>') !!}
</div>

<div class="form-group">
<label for="Foto" class="control-label">{{'Foto'}}</label>
@if(isset($serpel->Foto))
<br>
<img src="{{ asset('storage').'/'.$serpel->Foto}}" class="img-thumbnail img-fluid" alt="" width="150" >  
<br>
@endif
<input type="file" class="form-control {{$errors->has('Foto')?'is-invalid':'' }}" name="Foto" id="Foto" value="">  
{!! $errors->first('Foto','<div class="invalid-feedback">:message </div>') !!}
</div>

<input type="submit" class="btn btn-success" value="{{ $Modo== 'crear' ? 'Agregar':'Modificar'}}">

<a href="{{ url('serpels') }}" class="btn btn-dark">Retornar</a>
