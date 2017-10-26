@extends('inicio.app')
@section('contenido')

<div class="row">
<div class="content">
  

<div class="table-responsive">
  <table class="table table-condensed table-striped">
    
    @foreach($vendedores as $vendedor)
      <tr>
        <td width="100px">
          <a href="vendedores.detalle">
            <?php 
              $ruta_img = "img/vendedores/v".$vendedor->id_vendedor.".jpg";
              if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/vendedores/v0.jpg";}
            ?>            
            <img src="{{ $ruta_foto }}" class="listado img-circle" alt="foto del vendedor">
            
          </a>
        </td>
        <td>
          <a href="vendedores.detalle">
          <div>
            <h3>{{$vendedor->vendedor}}</h3>
            <span>{{$vendedor->celular}}</span><br />
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