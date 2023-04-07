
<h1> {{ $modo }} empleado</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
    <ul>

    @foreach($errors->all() as $error)
        
        <li> {{ $error }} </li>
        
    @endforeach
    </ul>  
    
    </div>

@endif

<div class="form-group">

<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:'' }}" id="Nombre">

</div>

<div class="form-group">

<label for="ApellidoPaterno"> Apellido paterno </label>
<input type="text" class="form-control" name="ApellidoPaterno" value="{{  isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:'' }}" id="ApellidoPaterno">

</div>

<div class="form-group">

<label for="ApellidoMaterno"> Apellido materno </label>
<input type="text" class="form-control" name="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:'' }}" name="ApellidoMaterno">

</div>

<div class="form-group">

<label for="Correo"> Correo </label>
<input type="text" class="form-control" name="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:'' }}" id="Correo">

</div>

<div class="form-group">

<label for="Foto"></label>
<!-- Validacion de la fotografia -->
@if(isset($empleado->Foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100" alt="">
@endif

<input type="file" class="form-control" name="Foto" value="" id="Foto">
<br/>
</div>

<input type="submit" class="btn btn-success" value="{{ $modo }} empleado">

<a href="{{ url('empleado/') }}" class="btn btn-primary"> Regresar </a>

