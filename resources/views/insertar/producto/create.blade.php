@extends('inicio.app')
@section('contenido')

  <div class="content">

    <form action="{{ route('nuevoproducto') }}" method="POST">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="categoria">Categorías</label>
        <select name="categoria" class="selectpicker" data-style="btn-danger" title="Seleccione una Categoría...">
        
          @foreach($categorias as $categoria)
            <option value="{{ $categoria->id_categoria }}">{{ $categoria->categoria }}</option>
          @endforeach          
        </select>   
      </div>
      
      <div class="form-group">
        <label for="nombreproducto">Nombre del Producto</label>
        <input type="text" name="nombreproducto" value="" class="form-control"placeholder="nombre del producto"> 
      </div>
      
      <div class="form-group">
        <label for="describeproducto">Descripción del Producto</label>
        <input type="text" name="describeproducto" value="" class="form-control"placeholder="Describe del producto"> 
      </div>

      <div class="form-group">
        <label for="precioproducto">Precio</label>
        <input type="text" name="precioproducto" value="" class="form-control"placeholder="1500" > 
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