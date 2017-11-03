@extends('inicio.app')
@section('contenido')

  <div class="content">
    <form action="{{ route('nuevacategoria') }}" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="nombrecategoria">Nombre</label>
        <input type="text" name="nombrecategoria" value="" class="form-control"placeholder="Nombre de Categoria" > 
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