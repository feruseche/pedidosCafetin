
@extends('inicio.app')
@section('contenido')
<div class="content">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Ventas<a href="/insertar.categoria.create"><button class="btn btn-succes">Nuevo</button></h3></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Categoria</th>	
						<th>imagen</th>
					</thead>
	               	@foreach ($categorias as $cat)
					<tr>
						<td>{{ $cat->categoria}}</td>
						<td><div class="card-categoria-app">
						      <?php 
						        $ruta_img = "img/categorias/t".$cat->id_categoria.".jpg";
						        if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/categorias/t0.jpg";}
						      ?>         
      						<img src="{{ $ruta_foto }}"></td>
					</tr>
					@endforeach
				</table>
				{{ $categorias->links() }}
			</div>
			
		</div>
	</div>

</div>
@endsection