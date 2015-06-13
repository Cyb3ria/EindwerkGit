$( document ).ready(function() 
{
	$('#beacon0').on('change', function () 
	{
     	var optionSelected = $(this).find("option:selected");
     	var valueSelected  = optionSelected.val();
     	var Zone = optionSelected.text();
    	alert(Zone);
	});

});