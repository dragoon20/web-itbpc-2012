function show_loader()
{
	$('#blacktrans').fadeIn(20);
	$('#loader').fadeIn(50);
	var loader_space_y = (screen.height-30)/2 -50;
	$('#loader').animate({top: loader_space_y+'px'},0);
}

function hide_loader() {
	$('#blacktrans').fadeOut(20);
	$('#loader').fadeOut(50);
	$('#loader').animate({top: '0px'},0);
}