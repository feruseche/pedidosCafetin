@extends('inicio.app')
@section('contenido')

<div class="content">

  @foreach ($productos as $producto)

    <a href="categorias.categoria">
    <div class="card-producto-app">
      <?php
        $ruta_img = "img/productos/p".$producto->id_producto.".jpg";
        if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/productos/p0.jpg";}
      ?>         
      <img src="{{ $ruta_foto }}">
      <div class="title-card-producto-app"><h1>{{ $producto->producto }}</h1></div>
      <div class="body-card-producto-app">{{ $producto->descripcion }}</div>
      <div class="precio-card-producto-app">Comprar <?php echo "$ ".number_format($producto->precio,0,',','.'); ?></div>

      <div class="social-card-producto-app">
        <ul class="social-header list-inline text-sm-right">
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x fa-inverse" aria-hidden="true"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x fa-inverse" aria-hidden="true"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-instagram fa-stack-1x fa-inverse" aria-hidden="true"></i>
              </span>
            </a>
          </li>
        </ul>
      </div><!-- div col redes sociales -->
      <div class="footer-card-producto-app"></div>        
    </div> 
    </a>
  
  @endforeach

</div>

@endsection