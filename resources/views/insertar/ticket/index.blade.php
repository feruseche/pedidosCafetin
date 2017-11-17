@extends('inicio.app')
@section('contenido')

<?php 
	setlocale(LC_MONETARY, 'en_US');
	$total=0;
	$subtotal=0;
	$acum=0; 
	foreach ($clientes as $cli)
	{
		$id_cliente=$cli->id_cliente;
	}		
	$ruta_img = "img/clientes/c".$id_cliente.".jpg";
	if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/clientes/c0.jpg";}
?>            
<div class="content">
<div class="row">
  <div class="table-responsive">
  	<table class="table table-condensed table-striped">
  		<tr><td>
  			<div class="col-xs-12 col-sm-12 col-md-6">
  				<h3 style="text-align: right;">TICKET #000{{ $nt }}</h3>	
  			</div>
			
		</td></tr>

		<tr><td>		
			<div class="row">			
				<div style="position: relative; left: 20px;">
					<div style="float: left;">
						<a href="clientes.index">
							<img src="{{ $ruta_foto }}" class="img-circle" alt="foto del cliente" width="64px" height="64px">	
						</a>
					</div>
					<div style="position: absolute; left: 55px; width: 270px">
						@foreach ($clientes as $c)
							<div class="col-sm-12 col-xs-12" style="padding-top: 4px;">
								<h4>{{ $c->cliente }}</h4>
									<small class="text-muted">{{ $c->ubicacion }}</small>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</td></tr>

		<tr><td>
			<div class="row">
				<div class="col-md-6 col-xs-12 col-xs-12">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead>
								<tr>
								</tr>
								<th>Producto</th>	
								<th style="text-align: center;">Precio</th>
								<th style="text-align: right;">Subtotal</th>
							</thead>
			               	@foreach ($productos as $p)
				               	<?php 
				               		$varid=$p->id_ticket;
				               		$subtotal=($p->precio*$p->cantidad);
				               	 	$total=$total+$subtotal;
				               	 	$acum++;
				               	 ?>
								<tr>
									<td>{{ $p->cantidad." * ".$p->producto}}</td>
									<td style="text-align: right;">{{ number_format($p->precio,0) }}</td>
									<td style="text-align: right;">{{ number_format($subtotal, 0) }}</td>
								</tr>
							@endforeach
							<tr><td style="text-align: right;"><h4>Total a Pagar:</h4></td><td colspan="2" style="text-align: center;"><h4><strong>{{ number_format($total,0) }}</strong></h4></td></tr>
						</table>				
					</div>			
				</div>
			</div>
		</td></tr>

		<tr><td>
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<div style="text-align: center;">
						<a href="/categorias.categoria">
							<button class="btn btn-primary" id="guardar" type="button">+ Productos</button>
						</a>
					</div>
				</div>
				<div class="col-md-3 col-xs-6">
<!--						<a href="/clientes.index">
							<button class="btn btn-danger" id="guardar" type="button">Clientes</button>
						</a>
-->						<div style="text-align: center;">
						<a href="{{ route('cerrar-ticket', ['id' =>  $varid ]) }}">
							<button class="btn btn-danger" id="guardar" type="button">Cerrar Ticket</button>
						</a>
					</div>
				</div>
			</div>
		</td></tr>
	</table>
	</div>
</div>
</div>

@endsection