@extends('inicio.app')
@section('contenido')

<div class="row">
  
<div class="content">

<div class="col-md-6 col-xs-12">
<div class="table-responsive">
  <table class="table table-condensed table-striped">
    
    @foreach($productos as $producto)    
    
      <tr>
        <td width="100px">
          <a href="{{ route('articulo', ['id' => $producto->id_producto]) }}">
              <?php
                $ruta_img = "img/productos/p".$producto->id_producto.".jpg";
                if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/productos/p0.jpg";}
              ?>         
              <img src="{{ $ruta_foto }}" class="listado">
          </a>
        </td>
        <td>
          <a href="{{ route('articulo', ['id' => $producto->id_producto]) }}">
          <div>
            <h4>{{ $producto->producto }}</h4>
            <span style="text-align: right;"><h4><?php echo "$ ".number_format($producto->precio,0,',','.'); ?></h4></span>
          </div>
          </a>
        </td>  
      </tr>
      
    @endforeach

  </table>
</div>


</div>
</div>
</div>
@endsection