@extends('inicio.app')
@section('contenido')

<div class="row">
<div class="content">
  

<div class="table-responsive">
  <table class="table table-condensed table-striped">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      @if ($searchText)

        La lista está filtrada por el texto "{{ $searchText }}"   y se encontraron "{{ $nr }}" usuarios.

      @endif 
      
      @include('vendedores.search')
  </div>       
    @foreach($vendedores as $vendedor)
      <tr>
        <td width="100px">
          <a href="vendedores.detalle">
            <?php 
              $ruta_img = "img/usuarios/u".$vendedor->id.".jpg";
              if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/usuarios/u0.jpg";}
            ?>
            <img src="{{ $ruta_foto }}" class="listado img-circle" alt="foto del vendedor">
          </a>
        </td>
        <td>
          <a href="vendedores.detalle">
          <div>
            <h3>
              {{$vendedor->name}}
              <small class="text-muted">
                  @if($vendedor->nivel==0)
                    Vendedor<br />
                  @else
                    Administrador<br />
                  @endif                
              </small>
            </h3>
            <span>{{$vendedor->email}}</span><br />
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
