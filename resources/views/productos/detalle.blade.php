@extends('inicio.app')
@section('contenido')

<div class="content">

    <a href="categorias.categoria">
    <div class="card-producto-app">
      <img src="img/productos/cafe1.jpg">
      <div class="title-card-producto-app"><h1>CAFÉ CAPUCCINO</h1></div>
      <div class="body-card-producto-app">Delicioso Café Capuccino, realizado con el mejor café de nuestra tierra.</div>
      <div class="precio-card-producto-app">Comprar $ 2.500</div>

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
    </div> <!-- final de la card -->
    </a>

</div><!-- capa de contenido principal  ->

@endsection