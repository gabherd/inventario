$(document).ready( function () {
	$("#create-product").validate({
		rules: {
			'id':     { required: true },
			'measure':{ required: true },
			'model':  { required: true },
			'brand':  { required: true },
			'price':  { required: true },
			'stock':  { required: true },
		},
		messages : {
      		'id': { minlength: "Name should be at least 3 characters" },
      		'measure': "La marca es requerida",
      		'model': "El modelo es requerido",
      		'brand': "La medida es requerida",
      		'price': "El precio es requerido",
      		'stock': "La cantidad es requerida"
      	},
		submitHandler: function(form, event){ 
		    event.preventDefault();
		}
	});

	$('#tbl-product').DataTable({
	    language: {
	        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
	    },
	    lengthMenu: [20, 40, 80, 160, 400, 500, 1000],
	    responsive: true,
		 	    ajax: {
         	            url: '/inventario/productos',
         	            dataSrc: '',
         	        },
		 	    columns: [
		 	        {data: 'id'},
		 	        {data: 'Measure'},
		 	        {data: 'Brand'},
		 	        {data: 'Model'},
		 	        {data: 'Stock'},
		 	        {data: 'Sale'},
		 	        {data: 'Price'},
		 	        {data: 'Price'}
		 	    ]
	});

});

$("#btn-save").on('click', function(){

	$("#submit-createProduct").click();

	$.ajax({
		url: "productos",
		method:"POST",
		data: $("#create-product").serialize(),
		success: function(res){
			
			if (res.status) {
				Swal.fire({
				  position: 'top-end',
				  icon: 'success',
				  title: 'Producto guardado',
				  showConfirmButton: false,
				  timer: 900
				});

				$('#tbl-product').DataTable().ajax.reload();

				$("#create-product").trigger("reset");
				$('#mdl-AddProduct').modal('hide');
			}
		}
	});	
});

$("#btn-mdlAddProduct").on('click', function(){
	$("#create-product").trigger("reset");
	$("#create-product").validate().resetForm();
});