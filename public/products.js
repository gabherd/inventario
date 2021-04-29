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

	$("#create-model").validate({
		rules: {
			'nameModel': { required: true },
			'id_Brand' : { required: true }

		},
		messages: {
      		'nameModel': { required: "El nombre del modelo es requerido" },
			'id_Brand' : { required: "Selecciona una marca" }
      	},
		submitHandler: function(form, event){ 
		    event.preventDefault();
		}
	});//validation

	$("#create-measure").validate({
		rules: {
			'measure': { required: true}
		},
		messages: {
      		'measure': { required:"La medida es requerida"}
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
		                   		"<button class='btn btn-info btn-editProduct' "+
		                   		"data-toggle='modal' "+
		                   		"data-id='"+data.id+"' "+
		                   		"data-target='#mdl-user'>Editar</button>" + 
						   		"<button type='submit' id='"+data.id+"' class='btn btn-danger btn-deleteProduct' "+
						   			"data-token='{{ csrf_token() }}' "+
						   			"data-id='"+data.id+"' "+
						   			"data-name='"+data.Measure+" - "+data.Brand+" - "+data.Measure+"'>Borrar</button>"+
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
                url: '/modelo',
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

	$('#tbl-measure').DataTable({
	    language: {
	        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
	    },
	    lengthMenu: [20, 40, 80, 160, 400, 500, 1000],
	    responsive: true,
		ajax: {
                url: '/medida',
                dataSrc: '',
        },
		columns: [
			{ data: 'number', "width": "70%" },
			{ data: null,   "width": "30%",
                render: function (data, type, row) {
                	return "<div class='d-flex justify-content-around'>" +
		                   		"<button class='btn btn-info btn-editMeasure'" +
			                   		"data-toggle='modal'"+
			                   		"data-target='#mdl-saveMeasure'" +
			                   		"data-MeasureId='"+data.id+"'" + 
			                   		"data-name='"+data.number+"'>Editar</button>" + 
						   		"<button class='btn btn-danger btn-deleteMeasure' "+
						   			"data-measureId='"+data.id+"' " + 
						   			"data-token='{{ csrf_token() }}' "+
						   			"data-name='"+data.number+"'>Borrar</button>"+
						   	"</div>";
					;
                }
            }
		]
	}); //dataTable

	$.ajax({
		url: "marca",
		success: function(res){
			for(item in res){
				$("#model-nameBrand").append('<option value="'+res[item].id+'" id="inp-Measure">'+res[item].name+'</option>');
			}
		}
	});

	$.ajax({
		url: "marca",
		success: function(res){
			for(item in res){
				$("#inp-brand").append('<option value="'+res[item].id+'">'+res[item].name+'</option>');
			}
		}
	});	
		
	$.ajax({
		url: "inventario/measure",
		success: function(res){
			for(item in res){
				$("#inp-measure").append('<option value="'+res[item].id+'" >'+res[item].number+'</option>');
			}
		}
	});	
});//documentReady


//------------------- Product -------------------------------
	$("#btn-saveProduct").on('click', function(){
		$("#submit-product").click();

		var id = $("#btn-saveProduct").attr('data-id');

		if ($(this).attr("data-submit") == "create"){
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
						$('#mdl-saveProduct').modal('hide');
					}
				}
			});	
		}else{
			$.ajax({
				url: "/productos/"+id,
				type: 'PUT', 
				dataType: "JSON",
				data: $("#create-product").serialize()  + '&_method=' + "PUT",
				success: function(res){
					console.log(res);
					if (res.status) {
						Swal.fire({
						  position: 'top-end',
						  icon: 'success',
						  title: 'Producto actualizado',
						  showConfirmButton: false,
						  timer: 900
						});

						$('#tbl-product').DataTable().ajax.reload();
						$('#mdl-saveProduct').modal('hide');
					}
				},
				error: function(xhr) {
			        var errors = JSON.parse(xhr.responseText);
			        console.log(errors)
			    }
			});	
		}
	});

	$("#open-modal-saveProduct").on('click', function(){
		$("#titleModalProduct").text('Agregar producto');
		$("#btn-saveModel").text('Guardar');
		$("#btn-saveModel").attr('data-submit', 'create');

		$("option:selected").removeAttr("selected");
		$("#create-product").trigger("reset");
		$("#create-product").validate().resetForm();

		$("#inp-model").empty();
		$("#inp-model").append('<option value="0">Selecciona una opcion...</option>');
	});

	$("#tbl-product").delegate('.btn-deleteProduct', 'click', function(){
		var id = $(this).attr('data-id');
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
					url: "productos/"+id,
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
								title: 'Producto eliminado',
								showConfirmButton: false,
								timer: 900
							});
							$('#tbl-product').DataTable().ajax.reload();
						}
					}
				});	
		  	}
		});
	});

	$("#tbl-product").delegate('.btn-editProduct', 'click', function(){
		var id = $(this).attr('data-id');
		$(".content-loading").css('display', 'block');

		$.ajax({
			url: "productos/"+id,
			success: function(res){
				var res = res[0];
				console.log(res)
				$("#create-product").trigger("reset");
				
				$("option:selected").removeAttr("selected");

				$("#inp-brand option[value='"+res.idBrand+"']").attr('selected', true);
				$("#inp-measure option[value='"+res.idMeasure+"']").attr('selected', true);

				$.ajax({
					url: "modelo/"+res.idBrand,
					success: function(response){
						var selected = "";
						

						for(item in response){
							console.log(response[item].id + " - " + res.idModel);
							if (response[item].id == res.idModel) {
								selected = 'selected';
							}else{
								selected = '';
							}

							$("#inp-model").append('<option value="'+response[item].id+'" id="inp-Measure" '+ selected +'>'+response[item].name+'</option>');
						}

						$(".content-loading").css('display', 'none');
					}
				});

				$("#inp-price").val(res.price);
				$("#inp-stock").val(res.stock);
			}
		});

		$("#mdl-saveProduct").modal('show');

		$("#titleModalProduct").text('Editar producto');
		$("#btn-saveProduct").attr('data-id', id);
		$("#btn-saveProduct").text('Actualizar');
		$("#btn-saveProduct").attr('data-submit', 'update');
	});

	$('#inp-brand').on('change', function(e){
		var model = this.value;
		
		$("#inp-model").empty();
		$("#inp-model").append('<option value="0" id="inp-Measure">Cargando...</option>');

		if (model != 0) {
			$.ajax({
				url: "modelo/"+model,
				success: function(res){
					$("#inp-model").empty();
					for(item in res){
						$("#inp-model").append('<option value="'+res[item].id+'" id="inp-Measure">'+res[item].name+'</option>');
					}
				}
			});
		}
	});
//------------------- end Product -------------------------------


//------------------- Brand-------------------------------
	$("#btn-mdlSaveBrand").on('click', function(){
		$("#titleModalBrand").text('Agregar marca')
		$("#btn-saveBrand").text('Guardar');
		$("#btn-saveBrand").attr('data-submit', 'create');

		$("#create-brand").trigger("reset");
	});

	$("#btn-saveBrand").on('click', function(){
		$("#submit-brand").click();

		if ($(this).attr("data-submit") == "create"){
			$.ajax({
				url: "marca",
				method:"POST",
				data: $("#create-brand").serialize(),
				success: function(res){
					if (res.status) {
						Swal.fire({
						  position: 'top-end',
						  icon: 'success',
						  title: 'Marca agregada',
						  showConfirmButton: false,
						  timer: 900
						});

						$('#mdl-saveBrand').modal('hide');
						$('#tbl-brand').DataTable().ajax.reload();
						$("#create-brand").trigger("reset");
					}
				}
			});	
		}else{
			var id = $("#btn-saveBrand").attr("data-id");

			$.ajax({
				url: "/marca/"+id,
				type: 'PUT', 
				dataType: "JSON",
				data: $("#create-brand").serialize()  + '&_method=' + "PUT",
				success: function(res){
					console.log(res);
					if (res.status) {
						Swal.fire({
						  position: 'top-end',
						  icon: 'success',
						  title: 'Marca actualizada',
						  showConfirmButton: false,
						  timer: 900
						});

						$('#mdl-saveBrand').modal('hide');
						$('#tbl-brand').DataTable().ajax.reload();
					}
				},
				error: function(xhr) {
			        var errors = JSON.parse(xhr.responseText);
			        console.log(errors)
			    }
			});	
		}
	});

	$("#tbl-brand").delegate('.btn-editBrand', 'click', function(){
		$("#titleModalBrand").text('Editar marca');
		$("#btn-saveBrand").text('Actualizar');
		$("#btn-saveBrand").attr('data-submit', 'update');

		var id = $(this).attr('data-brandId');
		var name = $(this).attr('data-name');

		$("#inp-brandBrand").val(name);
		$("#btn-saveBrand").attr('data-id', id);
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

	$("#open-modal-SaveModel").on('click', function(){
		$("#create-Model").trigger("reset");
		
		$("#titleModalModel").text('Agregar modelo');
		$("#submitModalModel").text('Guardar');

		$("#btn-saveModel").attr('data-submit', 'create');

		$("#model-nameBrand option:selected").attr('selected', false);
		$("#model-nameBrand option[value='0']").attr('selected', true);
	});

	$("#tbl-model").delegate('.btn-editModel', 'click', function(){
		$("#titleModalModel").text('Editar modelo');
		$("#submitModalModel").text('Actualizar');

		var id_brand = $(this).attr('data-idBrand');
		var id_model = $(this).attr('data-modelId');
		var name = $(this).attr('data-nameModel');

		$("#btn-saveModel").attr('data-submit', 'update');

		$("#model-nameBrand option:selected").attr('selected', false);
		
		$("#nameModel").val(name);
		$("#model-nameBrand option[value='"+id_brand+"']").attr('selected', true);

		$("#btn-saveBrand").attr('data-id', id_model);
	});

	$("#btn-saveModel").on('click', function(){
		$("#submit-model").click();

		if ($(this).attr("data-submit") == "create"){
			$.ajax({
				url: "modelo",
				method:"POST",
				data: $("#create-model").serialize(),
				success: function(res){
					if (res.status) {
						Swal.fire({
						  position: 'top-end',
						  icon: 'success',
						  title: 'Modelo agregado',
						  showConfirmButton: false,
						  timer: 900
						});

						$('#mdl-saveModel').modal('hide');
						$('#tbl-model').DataTable().ajax.reload();
						$("#create-model").trigger("reset");
					}
				}
			});	
		}else{
			var id = $("#btn-saveBrand").attr("data-id");

			$.ajax({
				url: "/modelo/"+id,
				type: 'PUT', 
				dataType: "JSON",
				data: $("#create-model").serialize()  + '&_method=' + "PUT",
				success: function(res){
					console.log(res);
					if (res.status) {
						Swal.fire({
						  position: 'top-end',
						  icon: 'success',
						  title: 'Modelo actualizado',
						  showConfirmButton: false,
						  timer: 900
						});

						$('#mdl-saveModel').modal('hide');
						$('#tbl-model').DataTable().ajax.reload();
						$("#create-model").trigger("reset");
					}
				},
				error: function(xhr) {
			        var errors = JSON.parse(xhr.responseText);
			        console.log(errors)
			    }
			});	
		}
	});

	$("#tbl-model").delegate('.btn-deleteModel', 'click', function(){
		var id = $(this).attr('data-modelId');
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
					url: "modelo/"+id,
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
								title: 'Modelo eliminado',
								showConfirmButton: false,
								timer: 900
							});
							$('#tbl-model').DataTable().ajax.reload();
						}
					}
				});	
		  	}
		});
	});

//-------------------end model-------------------------------


//------------------- Measure-------------------------------
	$("#btn-mdlSaveMeasure").on('click', function(){
		$("#titleModalMeasure").text('Agregar medida')
		$("#btn-saveMeasure").text('Guardar');
		$("#btn-saveMeasure").attr('data-submit', 'create');

		$("#create-measure").trigger("reset");
	});

	$("#btn-saveMeasure").on('click', function(){
		$("#submit-measure").click();

		if ($(this).attr("data-submit") == "create"){
			$.ajax({
				url: "medida",
				method:"POST",
				data: $("#create-measure").serialize(),
				success: function(res){
					if (res.status) {
						Swal.fire({
						  position: 'top-end',
						  icon: 'success',
						  title: 'Medida agregada',
						  showConfirmButton: false,
						  timer: 900
						});

						$('#mdl-saveMeasure').modal('hide');
						$('#tbl-measure').DataTable().ajax.reload();
						$("#create-measure").trigger("reset");
					}
				}
			});	
		}else{
			var id = $("#btn-saveMeasure").attr("data-id");

			$.ajax({
				url: "/medida/"+id,
				type: 'PUT', 
				dataType: "JSON",
				data: $("#create-measure").serialize()  + '&_method=' + "PUT",
				success: function(res){
					console.log(res);
					if (res.status) {
						Swal.fire({
						  position: 'top-end',
						  icon: 'success',
						  title: 'Medida actualizada',
						  showConfirmButton: false,
						  timer: 900
						});

						$('#mdl-saveMeasure').modal('hide');
						$('#tbl-measure').DataTable().ajax.reload();
					}
				},
				error: function(xhr) {
			        var errors = JSON.parse(xhr.responseText);
			        console.log(errors)
			    }
			});	
		}
	});

	$("#tbl-measure").delegate('.btn-editMeasure', 'click', function(){
		$("#titleModalMeasure").text('Editar medida');
		$("#btn-saveMeasure").text('Actualizar');
		$("#btn-saveMeasure").attr('data-submit', 'update');

		var id = $(this).attr('data-measureId');
		var name = $(this).attr('data-name');

		$("#inp-numberMeasure").val(name);
		$("#btn-saveMeasure").attr('data-id', id);
	});

	$("#tbl-measure").delegate('.btn-deleteMeasure', 'click', function(){
		var id = $(this).attr('data-measureId');
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
					url: "medida/"+id,
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
								title: 'Medida eliminada',
								showConfirmButton: false,
								timer: 900
							});
							$('#tbl-measure').DataTable().ajax.reload();
						}
					}
				});	
		  	}
		});
	});
//-------------------end brand-------------------------------


$(document).on('show.bs.modal', '.modal', function (event) {
    var zIndex = 1040 + (10 * $('.modal:visible').length);
    $(this).css('z-index', zIndex);
    setTimeout(function() {
        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
    }, 0);
});