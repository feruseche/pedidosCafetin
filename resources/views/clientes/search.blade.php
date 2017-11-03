{!! Form::open(array('url'=>'clientes.filtro','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="escriba un apellido, un nombre o un número de cédula..." value="<?php if($searchText){echo $searchText;} ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-danger">Buscar</button>
		</span>
		<span class="input-group-btn">
			<a href="{{ url('insertar.cliente') }}" class="btn btn-success">Nuevo Cliente</a>
			
		</span>
	</span>

</div>
{{Form::close()}}