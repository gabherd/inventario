$(document).ready(function() {
	jQuery.validator.addMethod("lettersonly", function(value, element) {
		return this.optional(element) || /^[a-z ]+$/i.test(value);
	}, "Letters and spaces only please");

	$('#tbl-users').DataTable({
		language: {
	        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
	    },
	    responsive: true,
		ajax: {
			url: '/registros/usuarios',
			dataSrc: '',
        },
        createdRow: function( row, data, dataIndex ) {
		    	$(row).addClass("tr-"+data.id);
		},
		columns: [
            { data: "name", 	 className: "name" },
            { data: "last_name", className: "last_name" },
            { data: "email", 	 className: "email" },
            { data: null,
                render: function (data, type, row) {
                	return "<div class='d-flex justify-content-around'>" +
		                   		"<button class='btn btn-info btn-edit' data-toggle='modal' data-edtId='"+data.id+"' data-target='#mdl-user'>Editar</button>" + 
						   		"<button type='submit' id='"+data.id+"' class='btn btn-danger btn-delete' data-token='{{ csrf_token() }}' data-name='"+data.name+"'>Borrar</button>"+
						   	"</div>";
					;
                }
            }
        ]
	});

	$("#create-user").validate({
		rules: {
			'name':      { required: true, lettersonly: true},
			'last_name': { required: true },
			'email':     { required: true, email: true },
		},
		messages : {
      		'name': { required: "El nombre es requerido", lettersonly: "El nombre es invalido" },
      		'last_name': { required: "El apellido es requerido", lettersonly: "El apellido es invalido" },
      		'email': { required: "El correo es requerido", email: "Debe se un correo valido" },
      	},
		submitHandler: function(form, event){ 
		    event.preventDefault();
		}
	});
} );


$("#tbl-users").delegate('.btn-delete', "click", function(){
	var id = $(this).attr('id');
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

$("#tbl-users").delegate('.btn-edit', "click", function(){
	clearValidationError('#create-user');

	var id = $(this).attr('data-edtId');
	var name = $(".tr-"+id).find('.name').text();
	var last_name = $(".tr-"+id).find('.last_name').text();
	var email = $(".tr-"+id).find('.email').text();

	$("#txt-save").text('Actualizar');	
	$("#txt-titleModal").text('Editar usuario');	
	$("#btn-save").attr("data-submit", "update");
	$("#btn-save").attr("data-id", id);

	$("#inp-name").val(name);
	$("#inp-last_name").val(last_name);
	$("#inp-email").val(email);
});

$("#btn-AddUser").on('click', function(){
	$("#create-user").trigger("reset");
	$("#txt-titleModal").text('Agregar usuario');	
	$("#txt-save").text('Guardar');	
	$("#btn-save").attr("data-submit", "create");
});

$("#btn-save").on('click', function(){
	
	$("#submit-createUser").click();

	if ($(this).attr("data-submit") == "create"){
		console.log('creando');
		$.ajax({
			url: "/usuarios",
			method:"POST",
			data: $("#create-user").serialize(),
			success: function(res){
				console.log(res);
				if (res.status) {
					Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: 'Usuario registrado',
					  showConfirmButton: false,
					  timer: 900
					});

					$('#tbl-users').DataTable().ajax.reload();
					$('#mdl-user').modal('hide');
				}
			},
			error: function(xhr) {
		        var errors = JSON.parse(xhr.responseText);
		        console.log(errors)
		    }
		});	
	}else{
		console.log('editando');
		
		var id = $("#btn-save").attr("data-id");

		$.ajax({
			url: "/usuarios/"+id,
			type: 'PUT', 
			dataType: "JSON",
			data: $("#create-user").serialize()  + '&_method=' + "PUT",
			success: function(res){
				console.log(res);
				if (res.status) {
					Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: 'Usuario registrado',
					  showConfirmButton: false,
					  timer: 900
					});

					$('#tbl-users').DataTable().ajax.reload();
					$('#mdl-user').modal('hide');
				}
			},
			error: function(xhr) {
		        var errors = JSON.parse(xhr.responseText);
		        console.log(errors)
		    }
		});	
	}
});


function clearValidationError(idForm){
	$(idForm).data('validator').resetForm();
	$(idForm).find('.form-control').removeClass('error');
}
