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