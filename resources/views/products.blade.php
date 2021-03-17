@extends('public/layout')

@section('title') Productos @endsection

@section('resources-page')
	<!--DataTables-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
	<!--Sweetalert-->
	<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
@endsection

@section('content')
	<div class="content-page">
		<div style="color: #A1A1A1">Productos en inventario</div>
		<button id="btn-mdlAddProduct" type="button" data-toggle="modal" data-target="#mdl-AddProduct" class="btn btn-primary float-right">Agregar</button>
		<br>
		<br>
		<br>
		<table id="tbl-product" class="table table-bordered">
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
	<div class="modal fade" id="mdl-AddProduct"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
		      	<form id="create-product">
					@csrf
			      	<div class="p-30">
				      	<div class="form-group">
					      	<label for="inp-id">Id</label>
					        <input id="inp-id" name="id" class="form-control" type="text" >
				      	</div>
				      	<div class="form-group">
					        <label for="measure">Marca</label>
					        <input id="inp-Measure" name="measure" class="form-control" type="text">
				      	</div>
				      	<div class="form-group">
					        <label for="model">Modelo</label>
					        <input id="inp-Model" name="model" class="form-control" type="text">
				      	</div>
				      	<div class="form-group">
					        <label for="">Medida</label>
					        <input id="inp-brand" name="brand" class="form-control" type="text">
				      	</div>
				      	<div class="form-group">
					        <label for="">Precio</label>
					        <input id="inp-price" name="price" class="form-control" type="text">
				      	</div>
				      	<div class="form-group">
					        <label for="">Existencia</label>
					        <input id="inp-stock" name="stock" class="form-control" type="text">
				      	</div>
				    </div>
				    <button id="submit-createProduct" class="d-none"></button>
		      	</form>
		      </div>
		      <div class="modal-footer d-flex justify-content-around">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button id="btn-save" class="btn btn-primary">Guardar</button>
		      </div>
		    </div>
		  </div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/products.js"></script>
@endsection
																														