@extends('inicio.app')
@section('contenido')

<div class="row">
<div class="content">
  
  <h2 style="text-align: center;">Pedidos por Despachar</h2>
  <div class="table-responsive">
  <table class="table table-condensed table-striped">
    
    @foreach($pedidos as $ped)
      <tr>
        <td width="100px">
          <a href="{{ route('detalle-ticket', ['id' => $ped->id_ticket]) }}">
            <?php 
              $ruta_img = "img/clientes/c".$ped->id_cliente.".jpg";
              if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/clientes/c0.jpg";}
            ?>            
            <img src="{{ $ruta_foto }}" class="listado img-circle" alt="foto del cliente">
          </a>
        </td>
        <td>
          <a href="{{ route('detalle-ticket', ['id' => $ped->id_ticket]) }}">
            <h4>{{ $ped->cliente }} <br />
            <small class="text-muted">{{ $ped->ubicacion }}</small>
            </h4>
            <div>
            <a href="{{ route('detalle-ticket', ['id' => $ped->id_ticket]) }}"> <button class="btn btn-primary" id="ticket" type="button">Ticket: #000{{ $ped->id_ticket }}</button></a>
                @foreach ($totales as $total)
                  @if($ped->id_ticket==$total->id_ticket)
                    <a href="{{ route('detalle-ticket', ['id' => $ped->id_ticket]) }}"> <button class="btn btn-success" id="total" type="button">$ {{ number_format($total->total,0,',','.') }}</button></a>
                  @endif
                @endforeach
            </div>
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