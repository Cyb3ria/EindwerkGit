$( document ).ready(function() 
{

//Add Event	
	//Currently Broadcasting @Zone 
	$('#beacon0').on('change', function () 
	{
     	var optionSelected = $(this).find("option:selected");
     	var valueSelected  = optionSelected.val();
     	var Zone = optionSelected.text();
    	alert(Zone);
	});

//My Events
	//Remove Item
    $('.removalLink').on('click', function(e)
	{
		e.preventDefault;
		console.log('remove werkt');
	});

});