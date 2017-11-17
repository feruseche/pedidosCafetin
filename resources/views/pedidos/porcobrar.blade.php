@extends('inicio.app')
@section('contenido')

<div class="row">
<div class="content">
  <h2 style="text-align: center;">Pedidos por Cobrar</h2>
    <div class="table-responsive">
      <table class="table table-condensed table-striped">
        
        @foreach($pedidos as $ped)
        <?php $var = $ped->id_ticket ?>
          <tr>
            <td width="100px">
              <a href="pedidos.detalleCobrar.<?php echo $var;?>">
                <?php 
                  $ruta_img = "img/clientes/c".$ped->id_cliente.".jpg";
                  if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/clientes/c0.jpg";}
                ?>            
                <img src="{{ $ruta_foto }}" style="width: 100px;" class="img-circle" alt="foto del cliente">
                
              </a>
            </td>
            <td>
              <a href="pedidos.detalleCobrar.<?php echo $var;?>">
                <h4>{{$ped->cliente}} <br />
                <small>{{ $ped->ubicacion }}</small><br />
                </h4>
              </a>
              <a href="pedidos.detalleCobrar.<?php echo $var;?>"> <button class="btn btn-success" id="ticket" type="button">Ticket: #000{{ $ped->id_ticket }}</button></a>
              <a href="pedidos.detalleCobrar.<?php echo $var;?>"> <button class="btn btn-danger" id="ticket" type="button">$ {{ number_format($ped->total, 0,',','.') }}</button></a>

              <br /></td>
          </tr>
        @endforeach

      </table>
    </div>


</div>
</div>


@endsection