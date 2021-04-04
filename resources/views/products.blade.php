@extends('public/layout')

@section('title') Productos @endsection

@section('resources-page')
	<!--DataTables-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
	<!--Sweetalert-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.css"/>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
	<!--Token-->
	<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
	<div class="content-page">
		<div style="color: #A1A1A1">Productos en inventario</div>
		<div style="margin: 25px 0">
			<button id="btn-mdlAddProduct" type="button" data-toggle="modal" data-target="#mdl-AddProduct" class="btn btn-add">
				<i class="zmdi zmdi-plus"></i>
				Agregar producto
			</button>
			<button class="btn btn-secondary float-right" data-toggle="modal" data-target="#mdl-model">
				Modelos
			</button>
			<button class="btn btn-secondary float-right" data-toggle="modal" data-target="#mdl-brand">
				Marcas
			</button>
		</div>
		<table id="tbl-product" class="table table-bordered">
			<thead class="thead-light">
				<tr>
					<th>Medida</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Existencia</th>
					<th>Vendidas</th>
					<th>Disponibles</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>

	</div>
	<!--Modal product-->
	<div class="modal fade" id="mdl-AddProduct"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form id="create-product">
					@csrf
			      	<div class="p-30">
				      	<div class="form-group">
					        <label for="brand">Marca</label>
					        <select class="form-control" name="brand" id="inp-Measure">
					        	<option  value="0" selected>Selecciona una opcion</option>
					        </select>
				      	</div>
				      	<div class="form-group">
					        <label for="model">Modelo</label>
					        <!--input id="inp-Model" name="model" class="form-control" type="text"-->
					        <select class="form-control" name="model" id="inp-Model">
					        	<option  value="0" selected>Selecciona una opcion</option>
					        </select>
				      	</div>
				      	<div class="form-group">
					        <label for="measure">Medida</label>
					        <!--input id="inp-brand" name="brand" class="form-control" type="text"-->
					         <select class="form-control" name="measure" id="inp-brand">
					        	<option  value="0" selected>Selecciona una opcion</option>
					        </select>
				      	</div>
				      	<div class="form-group">
					        <label for="price">Precio</label>
					        <input id="inp-price" name="price" class="form-control" type="number">
				      	</div>
				      	<div class="form-group">
					        <label for="stock">Existencia</label>
					        <input id="inp-stock" name="stock" class="form-control" type="number">
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

	<!----------------- brand ----------------->
	<!--Modal brand-->
	<div class="modal fade" id="mdl-brand"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Marcas</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<button id="btn-mdlSaveBrand" type="button" data-toggle="modal" data-target="#mdl-saveBrand" class="btn btn-add mb-3">
					<i class="zmdi zmdi-plus"></i>
					Agregar Marca
				</button>
			  	<table id="tbl-brand" class="table table-bordered" width=100%>
					<thead class="thead-light">
						<tr>
							<th>Nombre</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
		      </div>
		    </div>
		  </div>
	</div>

	<!--Modal save brand-->
	<div class="modal fade" id="mdl-saveBrand"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="titleModalBrand">Agregar marca</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form id="create-brand">
					@csrf
			      	<div class="p-30">
				      	<div class="form-group">
					        <label for="measure">Nombre</label>
					        <input id="inp-brandBrand" name="nameBrand" class="form-control" type="text" placeholder="Nombre de la marca">
				      	</div>
				    </div>
				    <button id="submit-brand" class="d-none"></button>
		      	</form>
		      </div>
		      <div class="modal-footer d-flex justify-content-around">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button id="btn-saveBrand" data-submit="create"  data-id="" class="btn btn-primary">Guardar</button>
		      </div>
		    </div>
		  </div>
	</div>

	<!----------------- Model ----------------->
	<!--Modal Model-->
	<div class="modal fade" id="mdl-model"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modelos</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<button id="open-modal-SaveModel" type="button" data-toggle="modal" data-target="#mdl-saveModel" class="btn btn-add mb-3">
					<i class="zmdi zmdi-plus"></i>
					Agregar modelo
				</button>
			  	<table id="tbl-model" class="table table-bordered" width=100%>
					<thead class="thead-light">
						<tr>
							<th>Modelo</th>
							<th>Marca</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
		      </div>
		    </div>
		  </div>
	</div>

	<!--Modal save Model-->
	<div class="modal fade" id="mdl-saveModel"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"><span id="titleModalModel">Agregar modelo</span></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form id="create-model">
					@csrf
			      	<div class="p-30">
				      	<div class="form-group">
					        <label for="measure">Modelo</label>
					        <input id="nameModel" name="nameModel" class="form-control" type="text" placeholder="Nombre del modelo">
				      	</div>
				      	<div class="form-group">
					        <label for="measure">Marca</label>
					        <select id="model-nameBrand"  class="form-control" name="id_brand" id="inp-Model">
					        	<option value="0" selected>Selecciona una marca</option>
					        </select>
				      	</div>
				    </div>
				    <button id="submit-model" class="d-none"></button>
		      	</form>
		      </div>
		      <div class="modal-footer d-flex justify-content-around">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button id="btn-saveModel" data-submit="create" class="btn btn-primary"><span id="submitModalModel">Guardar</span></button>
		      </div>
		    </div>
		  </div>
	</div>
	
@endsection

@section('scripts')
	<script type="text/javascript" src="js/products.js"></script>
@endsection
																														