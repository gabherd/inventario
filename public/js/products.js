$(document).ready( function () {
		    $('#myTable').DataTable({
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
		} );

$("#btn-save").on('click', function(){
	$.ajax({
		url: "productos",
		method:"POST",
		data:$("#create-product").serialize(),
		success: function(res){
			if (res.status) {
				Swal.fire({
				  position: 'top-end',
				  icon: 'success',
				  title: 'Producto guardado',
				  showConfirmButton: false,
				  timer: 800
				});

				$("#create-product").trigger("reset");
				$('#mdl-AddProduct').modal('hide');
			}
		}
	});	
});