$('body').click(function(e){
	if ($(e.target).is('#img-user')) {
		$('.box-conf_account').toggle();
	}else{
		$('.box-conf_account').hide();
	}
});



//boton de menu de amburguesa
$('#btnMenu').on('click', function(){
	var navLateral=$('.navLateral');
	var pageContent=$('.page-container');
	var navOption=$('.navBar-options');
	if(navLateral.hasClass('navLateral-change')&&pageContent.hasClass('pageContent-change')){
		navLateral.removeClass('navLateral-change');
		pageContent.removeClass('pageContent-change');
		navOption.removeClass('navBar-options-change');
	}else{
		navLateral.addClass('navLateral-change');
		pageContent.addClass('pageContent-change');
		navOption.addClass('navBar-options-change');
	}
});



/*Mostrar y ocultar submenus*/
$('.btn-subMenu').on('click', function(){
	var subMenu=$(this).next('ul');
	var icon=$(this).children("span");
	if(subMenu.hasClass('sub-menu-options-show')){
		subMenu.removeClass('sub-menu-options-show');
		icon.addClass('zmdi-chevron-left').removeClass('zmdi-chevron-down');
	}else{
		subMenu.addClass('sub-menu-options-show');
		icon.addClass('zmdi-chevron-down').removeClass('zmdi-chevron-left');
	}
});