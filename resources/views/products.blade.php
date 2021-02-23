@extends('public/layout')

@section('resources-page')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
	<div>
		<button type="button" style="float: right;" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Agregar</button>
		<br>
		<br>
		<br>
		<table id="myTable" class="table table-bordered">
			<thead class="thead-light">
				<tr>
					<th>Codigo</th>
					<th>Medida</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Existencia</th>
					<th>Vendidas</th>
					<th>Disponibles</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form id="create-product" action="{{ route('products.store') }}" method="POST">
					@csrf
			      	<div style="padding: 30px;">
				      	<div class="form-group">
					      	<label for="">Id</label>
					        <input id="inp-id" name="id" class="form-control" type="text">
		   					<span class="text-danger"> {!! $errors->first('id', ':message') !!} </span>
				      	</div>
				      	<div class="form-group">
					        <label for="">Marca</label>
					        <input id="inp-Measure" name="measure" class="form-control" type="text">
		   					<span class="text-danger"> {!! $errors->first('measure', ':message') !!} </span>
				      	</div>
				      	<div class="form-group">
					        <label for="">Modelo</label>
					        <input id="inp-Model" name="model" class="form-control" type="text">
		   					<span class="text-danger"> {!! $errors->first('model', ':message') !!} </span>
				      	</div>
				      	<div class="form-group">
					        <label for="">Medida</label>
					        <input id="inp-brand" name="brand" class="form-control" type="text">
		   					<span class="text-danger"> {!! $errors->first('brand', ':message') !!} </span>
				      	</div>
				      	<div class="form-group">
					        <label for="">Precio</label>
					        <input id="inp-price" name="price" class="form-control" type="text">
		   					<span class="text-danger"> {!! $errors->first('price', ':message') !!} </span>
				      	</div>
				      	<div class="form-group">
					        <label for="">Existencia</label>
					        <input id="inp-stock" name="stock" class="form-control" type="text">
		   					<span class="text-danger"> {!! $errors->first('stock', ':message') !!} </span>
				      	</div>
				    </div>

		      	</form>
		      </div>
		      <div class="modal-footer d-flex justify-content-around">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button type="submit" form="create-product" class="btn btn-primary">Guardar</button>
		      </div>
		    </div>
		  </div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="js/products.js"></script>
@endsection
																														