$("#change-password").validate({
	rules: {
		'current_password': { required: true},
		'new_password': 	{ required: true, min:6},
		'confirm_password':	{ required: true, min:6}
	},
	messages : {
  		'current_password': { required: "Introduce la contraseña actual"},
  		'new_password': 	{ required: "Introduce la nueva contraseña", min: "Deben ser minimo 6 caracteres"},
  		'confirm_password': { required: "Confirma la nueva contraseña",  min: "Deben ser minimo 6 caracteres"}
  	},
	submitHandler: function(form, event){ 
	    event.preventDefault();
	}
});

$("#update-account").validate({
	rules: {
		'name':      { required: true, lettersonly: true},
		'last_name': { required: true,  lettersonly: true },
	},
	messages : {
  		'name': { required: "El nombre es requerido", lettersonly: "El nombre es invalido" },
  		'last_name': { required: "El apellido es requerido", lettersonly: "El apellido es invalido" },
  	},
	submitHandler: function(form, event){ 
	    event.preventDefault();
	}
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#img-img_user').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#inp-img_user").change(function() {
	readURL(this);
});

$('#btn-img_change').click(function(){
    $('#inp-img_user').click();
});

$("#btn-save").on('click', function(){
	var id = $("#btn-save").attr("data-id");
	
	$("#submit-createUser").click();

	$.ajax({
			url: "/cuenta/"+id,
			type: 'PUT', 
			dataType: "JSON",
			data: $("#update-account").serialize()  + '&_method=' + "PUT",
			success: function(res){
				console.log(res);
				if (res.status) {
					Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: 'Datos actualizados',
					  showConfirmButton: false,
					  timer: 900
					});

					$("#main-nameUser").text($("#inp-user_name").val());
				}
			},
			error: function(xhr) {
		        var errors = JSON.parse(xhr.responseText);
		        console.log(errors)
		    }
		});	
});


$("#btn-changePassword").on('click', function(){
	
	$("#submit-changePassword").click();

	console.log( $("#change-password").serialize())

	if (checkPassword("#change-password")) {
		$.ajax({
			url: "password",
			type: 'PUT', 
			dataType: "JSON",
			data: $("#change-password").serialize()  + '&_method=' + "PUT",
			success: function(res){
				console.log(res);
				if (res.status) {
					Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: 'Contraseña actualizada',
					  showConfirmButton: false,
					  timer: 900
					});
				}
			},
			error: function(xhr) {
		        var errors = JSON.parse(xhr.responseText);
		        console.log(errors)
		    }
		});	
	}
});


 function checkPassword(form) {
                password1 = $('input[name = new_password]').val();
                password2 = $('input[name = confirm_password]').val();
  
                // If Not same return False.    
                else if (password1 != password2) {
                    alert ("\nLas contraseñas no coinciden...")
                    return false;
                }
  
                // If same return True.
                else{
                    return true;
                }
            }