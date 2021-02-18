$(document).ready( function () {
		    $('#myTable').DataTable({
			    language: {
			        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
			    },
			    lengthMenu: [20, 40, 80, 160, 400, 500, 1000],
			    responsive: true,
		        ajax: {
                        url: 'http://localhost:8000/inventario/productos',
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