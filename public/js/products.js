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

	$("#create-sale").validate({
		rules: {
			'sale': { required: true}
		},
		messages: {
      		'sale': { required:"La cantidad es requerida"}
      	},
		submitHandler: function(form, event){ 
		    event.preventDefault();
		}
	});//validation

	$('#tbl-product-zone').DataTable({
	    language: {
	        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
	    },
	    lengthMenu: [20, 40, 80, 160, 400, 500, 1000],
	    responsive: true,
		ajax: {
                url: '/inventario/productos',
                dataSrc: '',
        },
        initComplete: function(settings){
            var api = new $.fn.dataTable.Api( settings );
         	//get branch esta en script.js
            if (branch == 'zone') {
            	api.columns([5]).visible(true);
            }else{
            	api.columns([5]).visible(false);
            }
        },
		columns: [
			{data: 'Measure'},
		    {data: 'Brand'},
		    {data: 'Model'},
		    {data: 'Stock'},
		    {data: 'Price'},
		    {data: null,
                render: function (data, type, row) {
                	return "<div class='d-flex justify-content-around'>" +
		                   		"<button "+
		                   			"class='btn btn-info btn-saleProduct' style='background: #8BC34A' "+
			                   		"data-toggle='modal' "+
			                   		"data-id-product='"+data.id+"' "+
			                   		"data-measure-product='"+data.Measure+"' "+
			                   		"data-brand-product='"+data.Brand+"' "+
			                   		"data-stock-product='"+data.Stock+"' "+
			                   		"data-target='#mdl-sale'>Venta</button>" +
			                   	"<button "+
		                   			"class='btn btn-info btn-editProduct' "+
			                   		"data-toggle='modal' "+
			                   		"data-id-product='"+data.id+"' "+
			                   		"data-target='#mdl-user'>Editar</button>" + 
						   		"<button type='submit' id='"+data.id+"' "+
						   			"class='btn btn-danger btn-deleteProduct' "+
						   			"data-token='{{ csrf_token() }}' "+
						   			"data-id-product='"+data.id+"' "+
						   			"data-name='"+data.Measure+" - "+data.Brand+"'>Borrar</button>"+
						   	"</div>";
                }
            }
		]
	}); //dataTable

		$('#tbl-product-over').DataTable({
	    language: {
	        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
	    },
	    lengthMenu: [20, 40, 80, 160, 400, 500, 1000],
	    responsive: true,
		ajax: {
                url: '/inventario/productos',
                dataSrc: '',
        },
        initComplete: function(settings){
            var api = new $.fn.dataTable.Api( settings );
         	//get branch esta en script.js
            if (branch == 'over') {
            	api.columns([10]).visible(true);
            }else{
            	api.columns([10]).visible(false);
            }
        },
		columns: [
			{data: 'Measure'},
		    {data: 'Brand'},
		    {data: 'Model'},
		    {data: 'Stock'},
		    {data: 'Price'},
		    {data: 'Price'},
		    {data: 'Price'},
		    {data: 'Price'},
		    {data: 'Price'},
		    {data: 'Price'},
		    {data: null,
                render: function (data, type, row) {
                	return "<div class='d-flex justify-content-around'>" +
		                   		"<button "+
		                   			"class='btn btn-info btn-saleProduct' style='background: #8BC34A' "+
			                   		"data-toggle='modal' "+
			                   		"data-id-product='"+data.id+"' "+
			                   		"data-measure-product='"+data.Measure+"' "+
			                   		"data-brand-product='"+data.Brand+"' "+
			                   		"data-stock-product='"+data.Stock+"' "+
			                   		"data-target='#mdl-sale'>Venta</button>" +
			                   	"<button "+
		                   			"class='btn btn-info btn-editProduct' "+
			                   		"data-toggle='modal' "+
			                   		"data-id-product='"+data.id+"' "+
			                   		"data-target='#mdl-user'>Editar</button>" + 
						   		"<button type='submit' id='"+data.id+"' "+
						   			"class='btn btn-danger btn-deleteProduct' "+
						   			"data-token='{{ csrf_token() }}' "+
						   			"data-id-product='"+data.id+"' "+
						   			"data-name='"+data.Measure+" - "+data.Brand+"'>Borrar</button>"+
						   	"</div>";
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
		                   		"data-target='#mdl-save-brand'" +
		                   		"data-id-brand='"+data.id+"'" + 
		                   		"data-name='"+data.name+"'>Editar</button>" + 
						   		"<button class='btn btn-danger btn-deleteBrand' data-id-brand='"+data.id+"' data-token='{{ csrf_token() }}' data-name='"+data.name+"'>Borrar</button>"+
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
		                   			"data-id-model='"+data.idModel+"' " +
		                   			"data-toggle='modal' "+
		                   			"data-target='#mdl-save-model' " + 
		                   			"data-nameModel='"+data.model+"'"+
		                   			"data-idBrand='"+data.idBrand+"'> Editar </button>" + 
						   		"<button class='btn btn-danger btn-deleteModel' "+
						   			"data-id-model='"+data.idModel+"' "+
						   			"data-token='{{ csrf_token() }}' "+
						   			"data-name='"+data.model+"'>Borrar</button>"+
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
			                   		"data-target='#mdl-save-measure'" +
			                   		"data-id-measure='"+data.id+"'" + 
			                   		"data-name='"+data.number+"'>Editar</button>" + 
						   		"<button class='btn btn-danger btn-deleteMeasure' "+
						   			"data-id-measure='"+data.id+"' " + 
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
			//lista agregar producto
			for(item in res){
				$("#inp-brand").append('<option value="'+res[item].id+'">'+res[item].name+'</option>');
			}
			
			//lista agregar modelo
			for(item in res){
				$("#model-name-brand").append('<option value="'+res[item].id+'" id="inp-Measure">'+res[item].name+'</option>');
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
	$("#btn-save-product").on('click', function(){
		$("#submit-product").click();


		if ($(this).attr("data-submit") == "create"){
			ajaxSave('product', 'productos', 'Producto guardado');
		}else{
			ajaxUpdate('product', 'productos', 'Producto actualizado');

		}
	});

	$("#open-modal-saveProduct").on('click', function(){
		openModalSave('product', 'producto');

		$("option:selected").removeAttr("selected");

		$("#inp-model").empty();
		$("#inp-model").append('<option value="0">Selecciona una opcion...</option>');
	});


	$("#tbl-product").delegate('.btn-deleteProduct', 'click', function(){
		var id = $(this).attr('data-id-product');
		var itemName = $(this).attr('data-name');
		console.log(itemName)
		deleteItem(id, itemName, 'productos', 'Producto eliminado', '#tbl-product');
		
	});

	$("#tbl-product").delegate('.btn-editProduct', 'click', function(){
		openModalUpdate('product', 'producto');
		
		var id = $(this).attr('data-id-product');
		$(".content-loading").css('display', 'block');
		$("#mdl-save-product").modal('show');
		$("#btn-save-product").attr('data-id', id);

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
	$("#open-modal-saveBrand").on('click', function(){
		openModalSave('brand', 'marca');
	});

	$("#btn-save-brand").on('click', function(){
		$("#submit-brand").click();

		if ($(this).attr("data-submit") == "create"){
			ajaxSave('brand', 'marca', 'Marca agregada');
		}else{
			ajaxUpdate('brand', 'marca', 'Marca actualizada');

		}
	});

	$("#tbl-brand").delegate('.btn-editBrand', 'click', function(){
		openModalUpdate('brand', 'marca');

		var id = $(this).attr('data-id-brand');
		var name = $(this).attr('data-name');

		$("#inp-brandBrand").val(name);
		$("#btn-save-brand").attr('data-id', id);
	});

	$("#tbl-brand").delegate('.btn-deleteBrand', 'click', function(){
		var id = $(this).attr('data-id-brand');
		var itemName = $(this).attr('data-name');
		
		deleteItem(id, itemName, 'marca', 'Marca eliminada', '#tbl-brand');

	});
//-------------------end brand-------------------------------

//------------------- Model-------------------------------

	$("#open-modal-SaveModel").on('click', function(){
		openModalSave('model', 'modelo');

		$("#model-name-brand option:selected").attr('selected', false);
		$("#model-name-brand option[value='0']").attr('selected', true);
	});

	$("#tbl-model").delegate('.btn-editModel', 'click', function(){
		openModalUpdate('model', 'modelo');

		var id_brand = $(this).attr('data-idBrand');
		var id_model = $(this).attr('data-id-model');
		var name = $(this).attr('data-nameModel');

		$("#btn-save-model").attr('data-submit', 'update');

		$("#model-name-brand option:selected").attr('selected', false);
		
		$("#nameModel").val(name);
		$("#model-name-brand option[value='"+id_brand+"']").attr('selected', true);

		$("#btn-save-model").attr('data-id', id_model);
	});

	$("#btn-save-model").on('click', function(){
		$("#submit-model").click();

		if ($(this).attr("data-submit") == "create"){
			
			ajaxSave('model', 'modelo', 'Modelo agregado');

		}else{
			ajaxUpdate('model', 'modelo', 'Modelo actualizado');

		}
	});

	$("#tbl-model").delegate('.btn-deleteModel', 'click', function(){
		var id = $(this).attr('data-id-model');
		var itemName = $(this).attr('data-name');
		
		deleteItem(id, itemName, 'modelo', 'Modelo eliminado', '#tbl-model');

	});
//-------------------end model-------------------------------

//------------------- Measure-------------------------------
	$("#open-modal-saveMeasure").on('click', function(){
		openModalSave('measure', 'medida');
	});

	$("#btn-save-measure").on('click', function(){
		$("#submit-measure").click();

		if ($(this).attr("data-submit") == "create"){
			ajaxSave('measure', 'medida', 'Medida agregada');
	
		}else{
			ajaxUpdate('measure', 'medida', 'Medida actualizada');
		}
	});

	$("#tbl-measure").delegate('.btn-editMeasure', 'click', function(){
		openModalUpdate('measure', 'medida');

		var id = $(this).attr('data-id-measure');
		var element = $(this).attr('data-name');

		$("#inp-number-measure").val(element);
		$("#btn-save-measure").attr('data-id', id);
	});

	$("#tbl-measure").delegate('.btn-deleteMeasure', 'click', function(){
		var id = $(this).attr('data-id-measure');
		var itemName = $(this).attr('data-name');

		deleteItem(id, itemName, 'medida', 'Medida eliminada', '#tbl-measure');
		
	});
//-------------------end Measure-------------------------------

//------------------- Sale-------------------------------
	$("#tbl-product").delegate('.btn-saleProduct', 'click', function(){
		var id      = $(this).attr('data-id-product');
		var measure = $(this).attr('data-measure-product');
		var brand   = $(this).attr('data-brand-product');
		var stock   = $(this).attr('data-stock-product');

		//add id button to save
		$("#btn-save-sale").attr('data-id-product', id);

		$("#inp-sale-measure").val(measure);
		$("#inp-sale-brand").val(brand);
		$("#inp-sale-stock").val(stock);

		$("#create-sale").validate().resetForm();
		$('#mdl-sale').modal('hide');
	});

	$("#inp-number-sale").on('keyup', function(){
		var stock = $("#inp-sale-stock").val();
		var qtySale = $("#inp-number-sale").val();

		if (parseInt(qtySale) > parseInt(stock)) {
			$("#inp-number-sale-error").css('display', 'block');
		}else{
			$("#inp-number-sale-error").css('display', 'none');
		}
	});

	$("#btn-save-sale").on('click', function(){
		var qtySale = $("#inp-number-sale").val();
		var id = $(this).attr('data-id-product');

		$("#submit-sale").click();

		$.ajax({
			url: "/sale/"+id,
			type: 'PUT', 
			dataType: "JSON",
			data: $("#create-sale").serialize()  + '&_method=' + "PUT",
			success: function(res){
				console.log(res);
				if (res.status) {
					$(".content-loading").css('display', 'none');
					
					Swal.fire({
					  position: 'center',
					  icon: 'success',
					  title: 'Venta realizada',
					  showConfirmButton: false,
					  timer: 900
					});

					$('#mdl-sale').modal('hide');
					$("#create-sale").trigger("reset");
					$('#tbl-product').DataTable().ajax.reload();
				}
			},
			error: function(xhr) {
		        var errors = JSON.parse(xhr.responseText);
		        console.log(errors)
		    }
		});	
	});
//-------------------end Sale-------------------------------


function ajaxSave(name, url, swalTitle){
	$(".content-loading").css('display', 'block');

	$.ajax({
		url: url,
		method:"POST",
		data: $("#create-"+name).serialize(),
		success: function(res){
			if (res.status) {
				$(".content-loading").css('display', 'none');

				Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: swalTitle,
				  showConfirmButton: false,
				  timer: 900
				});

				$('#mdl-save-'+name).modal('hide');
				$('#tbl-'+name).DataTable().ajax.reload();
				$("#create-"+name).trigger("reset");
			}
		}
	});	
}

function ajaxUpdate(name, url, swalTitle){
	var id = $("#btn-save-"+name).attr("data-id");
	$(".content-loading").css('display', 'block');

	$.ajax({
		url: "/"+url+"/"+id,
		type: 'PUT', 
		dataType: "JSON",
		data: $("#create-"+name).serialize()  + '&_method=' + "PUT",
		success: function(res){
			console.log(res);
			if (res.status) {
				$(".content-loading").css('display', 'none');
				
				Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: swalTitle,
				  showConfirmButton: false,
				  timer: 900
				});

				$('#mdl-save-'+name).modal('hide');
				$('#tbl-'+name).DataTable().ajax.reload();
				$("#create-"+name).trigger("reset");

			}
		},
		error: function(xhr) {
	        var errors = JSON.parse(xhr.responseText);
	        console.log(errors)
	    }
	});	
}

function deleteItem(id, itemName, url, swalTitle, table){
	Swal.fire({
		title: '¿Estas seguro?',
		text: "Eliminar " + itemName,
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí, eliminar',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
	  	if (result.isConfirmed) {
			Swal.fire({
			  title: 'Eliminando...',
			  timerProgressBar: true,
			  showConfirmButton: false,
			  allowOutsideClick: false,
			  allowEscapeKey: false,
			  didOpen: () => {
			    Swal.showLoading()
				
				$.ajax({
					url: url+"/"+id,
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
							Swal.close();

							Swal.fire({
								position: 'center',
								icon: 'success',
								title: swalTitle,
								showConfirmButton: false,
								timer: 900
							});

							$(table).DataTable().ajax.reload();
						}
					}
				});	
			    
			  }
			}).then((result) => {
			  if (result.dismiss === Swal.DismissReason.timer) {
			    console.log('I was closed by the timer')
			  }
			});


	  	}
	});
}

function openModalSave(name, message){
	$("#title-modal-"+name).text('Agregar '+message);
	$("#btn-save-"+name).text('Guardar');
	$("#btn-save-"+name).attr('data-submit', 'create');
	$(".content-loading").css('display', 'none');

	$("#create-"+name).trigger("reset");
	$("#create-"+name).validate().resetForm();
}

function openModalUpdate(name, nameTranslate){
	$("#title-modal-" + name).text('Editar ' + nameTranslate);
	$("#btn-save-" + name).text('Actualizar');
	$("#btn-save-" + name).attr('data-submit', 'update');
}

$(document).on('show.bs.modal', '.modal', function (event) {
    var zIndex = 1040 + (10 * $('.modal:visible').length);
    $(this).css('z-index', zIndex);
    setTimeout(function() {
        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
    }, 0);
});