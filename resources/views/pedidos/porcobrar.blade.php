@extends('inicio.app')
@section('contenido')

<div class="row">
<div class="content">
  <h1>resultados</h1>
<div class="table-responsive">
  <table class="table table-condensed table-striped">
    
    @foreach($pedidos as $ped)
    <?php $var = $ped->id_tikect ?>
      <tr>
        <td width="100px">
          <a href="/pedidos.pedido-pagado.<?php echo $var;?>">
            <?php 
              $ruta_img = "img/clientes/c".$ped->id_cliente.".jpg";
              if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/clientes/c0.jpg";}
            ?>            
            <img src="{{ $ruta_foto }}" class="listado img-circle" alt="foto del cliente">
            
          </a>
        </td>
        <td>
          <a href="/pedidos.pedido-pagado.<?php echo $var;?>">
          <div>
            <h3>{{$ped->cliente}}</h3>
            <span>{{ $ped->ubicacion }}</span><br />
          </div>
          </a>
        </td>  
        <td>  <h1>{{ $ped->total }}</h1><br /></td>
      </tr>
    @endforeach

  </table>
</div>


</div>
</div>


@endsection