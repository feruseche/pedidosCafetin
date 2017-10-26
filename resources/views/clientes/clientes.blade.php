@extends('inicio.app')
@section('contenido')

<div class="row">
<div class="content">
  

<div class="table-responsive">
  <table class="table table-condensed table-striped">
    
    @foreach($clientes as $cliente)
      <tr>
        <td width="100px">
          <a href="clientes.detalle">
            <?php 
              $ruta_img = "img/clientes/c".$cliente->id_cliente.".jpg";
              if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/clientes/c0.jpg";}
            ?>            
            <img src="{{ $ruta_foto }}" class="listado img-circle" alt="foto del cliente">
            
          </a>
        </td>
        <td>
          <a href="clientes.detalle">
          <div>
            <h3>{{$cliente->cliente}}</h3>
            <span>{{$cliente->ubicacion}}</span><br />
          </div>
          </a>
        </td>  
      </tr>
    @endforeach

  </table>
</div>


</div>
</div>


@endsection