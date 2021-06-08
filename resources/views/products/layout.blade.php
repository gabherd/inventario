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
		
		@yield('name-branch')

		@yield('buttons-actions')

		@yield('table-products')
		
	</div>

	@yield('modals')

@endsection

@section('scripts')
	<script type="text/javascript" src="js/products.js"></script>
@endsection
	


																														