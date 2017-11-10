@extends('inicio.app')
@section('contenido')

<div class="row">
<div class="content">
  <h1>resultados</h1>
<div class="table-responsive">
  <table class="table table-condensed table-striped">
    
    @foreach($cortecaja as $ped)
  
      <tr>
        <td width="100px">
        </td>

        <td>
          <a href="/pedidos.pedido-pagado.<?php echo $var;?>">
          <div>
            <h3>{{$ped->cliente}}</h3>
            <span>{{ $ped->estatus }}</span><br />
          </div>
          </a>
        </td>  
        <td>  <h1>{{ $ped->total }}</h1><br /></td>
      </tr>
    @endforeach

  </table>
  <table class="table table-condensed table-striped">
    
    @foreach($resumen as $re)
   
      <tr>
        <td width="100px">
        </td>
        
        <td>
          <a href="/pedidos.pedido-pagado.<?php echo $var;?>">
          <div>
            <h3>{{$ped->estatus}}</h3>
            <span>{{ $ped->nt }}</span><br />
          </div>
          </a>
        </td>  
        <td>  <h1>nada</h1><br /></td>
      </tr>
    @endforeach

  </table>
</div>


</div>
</div>


@endsection