@extends('inicio.app')
@section('contenido')

<div class="content">

 @foreach($categorias as $categoria)

    <a href="{{ route('detalle', ['id' => $categoria->id_categoria]) }}">
    <div class="card-categoria-app">
      <?php 
        $ruta_img = "img/categorias/t".$categoria->id_categoria.".jpg";
        if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/categorias/t0.jpg";}
      ?>         
      <img src="{{ $ruta_foto }}">
      <div class="title-card-categoria-app"><h4>{{ $categoria->categoria }}</h4></div>
      <div class="footer-card-categoria-app"><span>Cafetín Los Andes</span></div>  
    </div> <!-- final de la card -->
    </a>

  @endforeach

</div>

@endsection