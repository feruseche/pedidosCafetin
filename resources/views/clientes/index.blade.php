@extends('inicio.app')
@section('contenido')

<div class="row">
<div class="content">

<div class="table-responsive">
  <table class="table table-condensed table-striped">

  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      @if ($searchText)

        La lista está filtrada por el texto "{{ $searchText }}"   y se encontraron "{{ $nr }}" clientes.

      @endif 
      
      @include('clientes.search')
  </div>  
    
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
            <h3>{{ $cliente->cliente }}
              <small class="text-muted">{{ $cliente->ubicacion }}</small>
            </h3>
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