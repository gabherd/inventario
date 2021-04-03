$(document).ready( function () {
	$("#create-product").validate({
		rules: {
			'measure':{ required: true },
			'model':  { required: true },
			'brand':  { required: true },
			'price':  { required: true },
			'stock':  { required: true },
		},
		messages : {
      		'measure': "La marca es requerida",
      		'model': "El modelo es requerido",
      		'brand': "La medida es requerida",
      		'price': "El precio es requerido",
      		'stock': "La cantidad es requerida"
      	},
		submitHandler: function(form, event){ 
		    event.preventDefault();
		}
	});//validation

	$("#create-brand").validate({
		rules: {
			'brand': { required: true, lettersonly: true }
		},
		messages: {
      		'brand': { required:"La marca es requerida", lettersonly: 'Introduce solamente letras'}
      	},
		submitHandler: function(form, event){ 
		    event.preventDefault();
		}
	});//validation

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
			{data: 'Measure'},
		    {data: 'Brand'},
		    {data: 'Model'},
		    {data: 'Stock'},
		    {data: 'Sale'},
		    {data: 'Price'},
		    {data: null,
                render: function (data, type, row) {
                	return "<div class='d-flex justify-content-around'>" +
		                   		"<button class='btn btn-info btn-edit' "+
		                   		"data-toggle='modal' "+
		                   		"data-edtId='"+data.id+"' "+
		                   		"data-target='#mdl-user'>Editar</button>" + 
						   		"<button type='submit' id='"+data.id+"' class='btn btn-danger btn-delete' data-token='{{ csrf_token() }}' data-name='"+data.name+"'>Borrar</button>"+
						   	"</div>";
					;
                }
            }
		]
	}); //dataTable

	$('#tbl-brand').DataTable({
	    language: {
	        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
	    },
	    lengthMenu: [20, 40, 80, 160, 400, 500, 1000],
	    responsive: true,
		ajax: {
                url: '/marca',
                dataSrc: '',
        },
		columns: [
			{ data: 'name', "width": "70%" },
			{ data: null,   "width": "30%",
                render: function (data, type, row) {
                	return "<div class='d-flex justify-content-around'>" +
		                   		"<button class='btn btn-info btn-editBrand'" +
		                   		"data-toggle='modal'"+
		                   		"data-target='#mdl-saveBrand'" +
		                   		"data-brandId='"+data.id+"'" + 
		                   		"data-name='"+data.name+"'>Editar</button>" + 
						   		"<button class='btn btn-danger btn-deleteBrand' data-brandId='"+data.id+"' data-token='{{ csrf_token() }}' data-name='"+data.name+"'>Borrar</button>"+
						   	"</div>";
					;
                }
            }
		]
	}); //dataTable

	$('#tbl-model').DataTable({
	    language: {
	        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
	    },
	    lengthMenu: [20, 40, 80, 160, 400, 500, 1000],
	    responsive: true,
		ajax: {
                url: '/inventario/modelos',
                dataSrc: '',
        },
        createdRow: function( row, data, dataIndex ) {
		    	$(row).addClass("trModel-"+data.id);
		},
		columns: [
			{ data: 'model', "width": "35%" },
			{ data: 'brand', "width": "35%" },
			{ data: null,   "width": "30%",
                render: function (data, type, row) {
                	return "<div class='d-flex justify-content-around'>" +
		                   		"<button class='btn btn-info btn-editModel' " + 
		                   			"data-modelId='"+data.idModel+"' " +
		                   			"data-toggle='modal' "+
		                   			"data-target='#mdl-saveModel' " + 
		                   			"data-nameModel='"+data.model+"'"+
		                   			"data-idBrand='"+data.idBrand+"'> Editar </button>" + 
						   		"<button class='btn btn-danger btn-deleteModel' data-modelId='"+data.idModel+"' data-token='{{ csrf_token() }}' data-name='"+data.model+"'>Borrar</button>"+
						   	"</div>";
					;
                }
            }
		]
	}); //dataTable

	$.ajax({
		url: "inventario/marcas",
		success: function(res){
			for(item in res){
				$("#model-nameBrand").append('<option value="'+res[item].id+'" id="inp-Measure">'+res[item].name+'</option>');
			}
		}
	});

});//documentReady


//------------------- Prpductd -------------------------------
	$("#btn-save").on('click', function(){
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
		$.ajax({
			url: "inventario/marcas",
			success: function(res){
				for(item in res){
					$("#inp-Measure").append('<option value="'+res[item].id+'" id="inp-Measure">'+res[item].name+'</option>');
				}
			}
		});	

		$.ajax({
			url: "inventario/measure",
			success: function(res){
				for(item in res){
					$("#inp-brand").append('<option value="'+res[item].id+'" id="inp-Measure">'+res[item].number+'</option>');
				}
			}
		});	
	});

	$("#tbl-brand").delegate('.btn-editBrand', 'click', function(){
		$("#titleModalBrand").text('Editar marca');
		$("#btn-saveBrand").text('Actualizar');

		var id = $(this).attr('data-brandId');
		var name = $(this).attr('data-name');

		$("#inp-brandBrand").val(name);
	});

	$('#inp-Measure').on('change', function(e){
		var model = this.value;
		
		$("#inp-Model").empty();

		$("#inp-Model").append('<option value="0" id="inp-Measure">Cargando...</option>');

		$.ajax({
			url: "inventario/model/"+model,
			success: function(res){
				$("#inp-Model").empty();
				for(item in res){
					$("#inp-Model").append('<option value="'+res[item].id+'" id="inp-Measure">'+res[item].name+'</option>');
				}
			}
		});
	});
//------------------- end Prpductd -------------------------------


//------------------- Brand-------------------------------
	$("#btn-mdlSaveBrand").on('click', function(){
		$("#titleModalBrand").text('Agregar marca')
		$("#btn-saveBrand").text('Guardar');

		$("#create-brand").trigger("reset");
	});


	$("#btn-saveBrand").on('click', function(){
		$("#submit-brand").click();

		$.ajax({
			url: "marca",
			method:"POST",
			data: $("#create-brand").serialize(),
			success: function(res){
				if (res.status) {
					Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: 'Producto guardado',
					  showConfirmButton: false,
					  timer: 900
					});

					$('#tbl-brand').DataTable().ajax.reload();

					$("#create-brand").trigger("reset");
					$('#mdl-saveBrand').modal('hide');
				}
			}
		});		
	});

	$("#tbl-brand").delegate('.btn-editBrand', 'click', function(){
		$("#titleModalBrand").text('Editar marca');
		$("#btn-saveBrand").text('Actualizar');

		var id = $(this).attr('data-brandId');
		var name = $(this).attr('data-name');

		$("#inp-brandBrand").val(name);
	});

	$("#tbl-brand").delegate('.btn-deleteBrand', 'click', function(){
		var id = $(this).attr('data-brandId');
		var name = $(this).attr('data-name');
		
		Swal.fire({
			title: '¿Estas seguro?',
			text: "Eliminar a " + name,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí, eliminar',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
		  	if (result.isConfirmed) {
				$.ajax({
					url: "marca/"+id,
					type: 'DELETE', 
					dataType: "JSON",
					headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    	},
					data: { 
							"id": id, 
					 		"_method": 'DELETE', 
					},
					success: function(res){
						if (res.status) {
							Swal.fire({
								position: 'center',
								icon: 'success',
								title: 'Marca eliminada',
								showConfirmButton: false,
								timer: 900
							});
							$('#tbl-brand').DataTable().ajax.reload();
						}
					}
				});	
		  	}
		});
	});

//-------------------end brand-------------------------------


//------------------- Model-------------------------------

$("#btn-mdlAddModel").on('click', function(){
	$("#create-Model").trigger("reset");
	
	$("#titleModalModel").text('Agregar modelo');
	$("#submitModalModel").text('Guardar');

	$("#model-nameBrand option:selected").attr('selected', false);
	$("#model-nameBrand option[value='0']").attr('selected', true);
});

$("#tbl-model").delegate('.btn-editModel', 'click', function(){
	$("#titleModalModel").text('Editar modelo');
	$("#submitModalModel").text('Actualizar');

	var id = $(this).attr('data-idBrand');
	var name = $(this).attr('data-nameModel');

	$("#model-nameBrand option:selected").attr('selected', false);
	
	$("#nameModel").val(name);
	$("#model-nameBrand option[value='"+id+"']").attr('selected', true);
});

$("#tbl-model").delegate('.btn-deleteModel', 'click', function(){
	var id = $(this).attr('data-brandId');
	var name = $(this).attr('data-name');
	
	Swal.fire({
		title: '¿Estas seguro?',
		text: "Eliminar " + name,
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí, eliminar',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
	  	if (result.isConfirmed) {
			$.ajax({
				url: "usuarios/"+id,
				type: 'DELETE', 
				dataType: "JSON",
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    	},
				data: { 
						"id": id, 
				 		"_method": 'DELETE', 
				},
				success: function(res){
					if (res.status) {
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Usuario eliminado',
							showConfirmButton: false,
							timer: 900
						});
						$('#tbl-users').DataTable().ajax.reload();
					}
				}
			});	
	  	}
	});
});

//-------------------end model-------------------------------



$(document).on('show.bs.modal', '.modal', function (event) {
    var zIndex = 1040 + (10 * $('.modal:visible').length);
    $(this).css('z-index', zIndex);
    setTimeout(function() {
        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
    }, 0);
});