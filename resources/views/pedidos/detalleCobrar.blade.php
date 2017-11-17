@extends('inicio.app')
@section('contenido')

<?php 
    setlocale(LC_MONETARY, 'en_US');
    $total=0;
?>
<div class="row">
<div class="content">
  <div class="table-responsive">
  <table class="table table-condensed table-striped">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" class="card-ticket-app">
      @foreach ($cliente as $cli)
        <?php
          $var=$cli->id_ticket;
          $ruta_img = "img/clientes/c".$cli->id_cliente.".jpg";
          if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/clientes/p0.jpg";}
        ?>         
      @endforeach
      <h3 style="text-align: right;">TICKET #000{{ $nt }}</h3>
    <tr><td>
      <div class="row">     
        <div style="position: relative; left: 20px;">
          <div style="float: left;">

              <img src="{{ $ruta_foto }}" class="img-circle" alt="foto del cliente" width="64px" height="64px"> 

          </div>
          <div style="position: absolute; left: 55px; width: 270px">
            @foreach ($cliente as $c)
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 4px;">
              <span>{{ $c->cliente }}</span>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <span>{{ $c->ubicacion }}</span>
              </div>
            @endforeach
          </div>
        </div>
      </div>      

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">

              <thead>
                <tr>
                </tr>
                <th>Producto</th> 
                <th style="text-align: right;">Subtotal</th>
              </thead>        

              @foreach ($pedidos as $producto)
                <?php $var=$producto->id_ticket;
                      $subt=$producto->precio*$producto->cantidad;
                      $total=$total+$subt;
                 ?>
                <tr>
                  <td> {{ $producto->cantidad." * ".$producto->producto }}</td>
                  <td style="text-align: right;"> <?php echo number_format($subt,0,',','.'); ?></td> 
                </tr>
              @endforeach

              <tr><td style="text-align: right;"><h4>Total a Pagar:</h4></td><td colspan="2" style="text-align: center;"><h4><strong>${{ number_format($total,0,',','.') }}</strong></h4></td></tr>        
            </table>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div style="text-align: left; display: inline-block;">
            <a href="pedidos.pedido-pagado.<?php echo $var;?>">
              <button class="btn btn-danger" id="eliminar" type="button">Cobrar Ticket</button>
            </a>
          </div>

          <div style="text-align: right; display: inline-block;">
            <a href="pedidos.porcobrar">
              <button class="btn btn-success" id="pedidos" type="button">Pedidos por Cobrar</button>
            </a>
          </div>

        </div>  
      </div>

  </div>

</td>
</tr>
</table>
</div>


</div><!-- div content -->
</div>
@endsection