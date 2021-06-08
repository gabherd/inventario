
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
					$('#tbl-product-over').DataTable().ajax.reload();
				}
			},
			error: function(xhr) {
		        var errors = JSON.parse(xhr.responseText);
		        console.log(errors)
		    }
		});	
	});

	$("#tbl-product-over").delegate('.btn-deleteProduct', 'click', function(){
		var id = $(this).attr('data-id-product');
		var itemName = $(this).attr('data-name');
		console.log(itemName)
		deleteItem(id, itemName, 'productos', 'Producto eliminado', '#tbl-product-over');
		
	});

	$("#tbl-product-over").delegate('.btn-editProduct', 'click', function(){
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

	$("#tbl-product-over").delegate('.btn-saleProduct', 'click', function(){
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