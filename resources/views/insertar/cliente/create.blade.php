@extends('inicio.app')
@section('contenido')

  <div class="content">
    <form action="{{ route('nuevocliente') }}" method="POST">
      {{ csrf_field() }}
      
      <div class="form-group">
        <label for="nombrecliente">Nombre del Cliente</label>
        <input type="text" name="nombrecliente" value="" class="form-control"placeholder="Nombre del cliente"> 

        <label for="cedulacliente">Cédula del Cliente</label>
        <input type="text" name="cedulacliente" value="" class="form-control"placeholder="Cédula del cliente"> 

        <label for="clavecliente">Clave de Autopedidos</label>
        <input type="text" name="clavecliente" value="" class="form-control"placeholder="Clave de autopedidos"> 

        <label for="ubicacion">Ubicación</label>
        <input type="text" name="ubicacion" value="" class="form-control"placeholder="Ubicación"> 

        <label for="celular">Celular</label>
        <input type="text" name="celular" value="" class="form-control"placeholder="Celular"> 

      </div>

      <div class="form-group">
         <label for="imagen">Imagen</label>
         <input type="file" name="imagen" class="form-control">
      </div>

      <div class="form-group">
      	<button class="btn btn-primary" type="submit">Guardar</button>
      	<button class="btn btn-danger" type="reset">Cancelar</button>
      </div>
    </form>
  </div>

@endsection