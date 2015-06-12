$( document ).ready(function() 
{
	$('#beacon0').on('change', function () 
	{
     	var optionSelected = $(this).find("option:selected");
     	var valueSelected  = optionSelected.val();
     	var textSelected   = optionSelected.text();
    	$("#zoneBC").text(textSelected);
    	$("#BC").fadeIn(500);
	});
});