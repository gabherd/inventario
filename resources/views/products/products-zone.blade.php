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
	<link rel="stylesheet" href="css/products.css">
	<!--Ratatable responsive-->
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
@endsection

@section('content')
	<div class="content-page">
		
		<div style="color: #A1A1A1"> 
			Productos en inventario <b>Zone</b>
		</div>
		<div style="margin: 25px 0">
			<button id="open-modal-saveProduct" type="button" data-toggle="modal" data-target="#mdl-save-product" class="btn btn-add">
				<i class="zmdi zmdi-plus"></i>Agregar producto 
			</button>
			<button class="btn btn-secondary float-right" data-toggle="modal" data-target="#mdl-measure"> Medidas </button>
			<button class="btn btn-secondary float-right mx-1" data-toggle="modal" data-target="#mdl-model"> Modelos </button>
			<button class="btn btn-secondary float-right" data-toggle="modal" data-target="#mdl-brand"> Marcas </button>
		</div>


		<table id="tbl-product-zone" class="table table-bordered display responsive nowrap" cellspacing="0" width="100%">
			<thead class="thead-light">
				<tr>
					<th>Medida</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Existencia</th>
					<th>Precio</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		
	</div>

		<!--Modal product-->
	<div class="modal fade" id="mdl-save-product"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="title-modal-product">Agregar producto</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="content-loading">
		      		<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
		      	</div>
		      	<form id="create-product-zone">
					@csrf
			      	<div class="p-30">
				      	<div class="form-group">
					        <label for="brand">Marca</label>
					        <select class="form-control" name="brand" id="inp-brand">
					        	<option  value="0" selected>Selecciona una opcion...</option>
					        </select>
				      	</div>
				      	<div class="form-group">
					        <label for="model">Modelo</label>
					        <!--input id="inp-Model" name="model" class="form-control" type="text"-->
					        <select class="form-control" name="model" id="inp-model">
					        	<option  value="0" selected>Selecciona una opcion...</option>
					        </select>
				      	</div>
				      	<div class="form-group">
					        <label for="measure">Medida</label>
					        <!--input id="inp-brand" name="brand" class="form-control" type="text"-->
					         <select class="form-control" name="measure" id="inp-measure">
					        	<option  value="0" selected>Selecciona una opcion...</option>
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
				    <button id="submit-product" class="d-none"></button>
		      	</form>
		      </div>
		      <div class="modal-footer d-flex justify-content-around">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button id="btn-save-product" data-submit="create" class="btn btn-primary">Guardar</button>
		      </div>
		    </div>
		  </div>
	</div>
	
<!----------------- Brand ----------------->
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
		      	<button id="open-modal-saveBrand" type="button" data-toggle="modal" data-target="#mdl-save-brand" class="btn btn-add mb-3">
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
	<div class="modal fade" id="mdl-save-brand"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="title-modal-brand">Agregar marca</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="content-loading">
		      		<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
		      	</div>
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
		        <button id="btn-save-brand" data-submit="create"  data-id="" class="btn btn-primary">Guardar</button>
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
		      	<button id="open-modal-SaveModel" type="button" data-toggle="modal" data-target="#mdl-save-model" class="btn btn-add mb-3">
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
	<div class="modal fade" id="mdl-save-model"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"><span id="title-modal-model">Agregar modelo</span></h5>
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
					        <select id="model-name-brand"  class="form-control" name="id_brand" id="inp-Model">
					        	<option value="0" selected>Selecciona una marca...</option>
					        </select>
				      	</div>
				    </div>
				    <button id="submit-model" class="d-none"></button>
		      	</form>
		      </div>
		      <div class="modal-footer d-flex justify-content-around">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button id="btn-save-model" data-submit="create" class="btn btn-primary"><span id="btn-save-model">Guardar</span></button>
		      </div>
		    </div>
		  </div>
	</div>
	
	<!----------------- Measure ----------------->
	<!--Modal measure-->
	<div class="modal fade" id="mdl-measure"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Medidas</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<button id="open-modal-saveMeasure" type="button" data-toggle="modal" data-target="#mdl-save-measure" class="btn btn-add mb-3">
					<i class="zmdi zmdi-plus"></i>
					Agregar Medidas
				</button>
			  	<table id="tbl-measure" class="table table-bordered" width=100%>
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

	<!--Modal save measure-->
	<div class="modal fade" id="mdl-save-measure"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="title-modal-measure">Agregar medida</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="content-loading">
		      		<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
		      	</div>
		      	<form id="create-measure">
					@csrf
			      	<div class="p-30">
				      	<div class="form-group">
					        <label for="measure">Medida</label>
					        <input id="inp-number-measure" name="measure" class="form-control" type="text" placeholder="Introduce la medida">
				      	</div>
				    </div>
				    <button id="submit-measure" class="d-none"></button>
		      	</form>
		      </div>
		      <div class="modal-footer d-flex justify-content-around">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button id="btn-save-measure" data-submit="create"  data-id="" class="btn btn-primary">Guardar</button>
		      </div>
		    </div>
		  </div>
	</div>

	<!----------------- Sale ----------------->
	<!--Modal sale-->
	<div class="modal fade" id="mdl-sale"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Venta</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form id="create-sale">
					@csrf
			      	<div class="p-30">
				      	<div class="form-group">
					        <label for="measure">Medida</label>
					        <input id="inp-sale-measure" name="measure" class="form-control" type="text" readonly>
				      	</div>
				      	<div class="form-group">
					        <label for="brand">Marca</label>
					        <input id="inp-sale-brand" name="brand" class="form-control" type="text" readonly>
				      	</div>
				      	<div class="form-group">
					        <label for="stock">Existencia</label>
					        <input id="inp-sale-stock" name="stock" class="form-control" type="number" readonly>
				      	</div>
				      	<div class="form-group">
					        <label for="sale">Cantidad a vender</label>
					        <input id="inp-number-sale" name="sale" class="form-control" type="number">
					        <div id="inp-number-sale-error" class="error">La cantidad es superior a la existencia</div>
				      	</div>
				    </div>
				    <button id="submit-sale" class="d-none"></button>
		      	</form>
		      </div>
		      <div class="modal-footer d-flex justify-content-around">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button id="btn-save-sale" data-submit="create"  data-id-product="" class="btn btn-primary">Guardar</button>
		      </div>
		    </div>
		  </div>
	</div>

@endsection

@section('scripts')
	<script type="text/javascript" src="js/products.js"></script>
@endsection
	


																														