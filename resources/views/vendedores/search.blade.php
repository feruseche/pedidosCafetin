{!! Form::open(array('url'=>'vendedores.filtro','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="escriba nombre..." value="<?php if($searchText){echo $searchText;} ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-danger">Buscar</button>
		</span>
		<span class="input-group-btn">
			<a href="{{ url('register') }}" class="btn btn-success">Nuevo Usuario Vendedor</a>
			
		</span>
	</span>

</div>
{{Form::close()}}