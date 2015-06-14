$( document ).ready(function() 
{
//Add Event	
	//Currently Broadcasting @Zone 
	$('#beacon0').on('change', function () 
	{
     	var optionSelected = $(this).find("option:selected");
     	var textSelected   = optionSelected.text();
     	$("#zoneBC").text(textSelected);
    	$("#BC").fadeIn(500);
	});

//My Events
	//Remove Item
    $('.removalLink').on('click', function(e)
	{
		e.preventDefault;
		console.log('remove werkt');
	});

});