$('#entrance').change(function(){
	if ($(this).val() == 'timer')/*if the value is timer*/
	{
		$('#timer').show();/*show the div*/
	} else {
		$('#timer').hide();/*hide the div*/
	}
	
	if ($(this).val() == 'click')/*if the value is click*/
	{
		$('#button').show();/*show the div*/
	} else {
		$('#button').hide();/*hide the div*/
	}
	
	if ($(this).val() == 'konami-code')/*if the value is konami-code*/
	{
		$('#code').show();/*show the div*/
	} else {
		$('#code').hide();/*hide the div*/
	}
});