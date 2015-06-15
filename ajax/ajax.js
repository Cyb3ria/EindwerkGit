$(document).ready(function()
{ 
//Add Event	
	//Currently Broadcasting @Zone 
	$('#beacon0').on('change', function () 
	{
		var Selected = $(this).find("option:selected");
     	var SelectedText   = Selected.text();
     	var SelectedEncoded = encodeURIComponent(SelectedText);

     	$.ajax
     	({
    	url: 		'ajax-addevent.php',
    	data: 		'n_beacon='+SelectedEncoded,
    	dataType: 	'JSON',
    	success: function(data)
    		{
    			var CBtitle = data.EventTitle;
    			var CBlink = data.EventLink;
    			var CBdate = data.EventDate;

    			$("#CBtitle").text(CBtitle);
    			$("#CBlink").text(CBlink);
    			$("#CBdate").text(CBdate);
			},
		error: function(xhr, status, error) 
			{
				var errors = JSON.parse(xhr.responseText);
				console.log("failed");
  				console.log (errors);
			}
		});
	});
    
    
    $('.favoriteFalse').on('click', function () 
	{
		var Fav = $('.tempid').val();

     	$.ajax
     	({
    	url: 		'ajax/ajax.php',
    	data: 		'n_id' + Fav,
    	dataType: 	'HTML',
    	success: function(data)
    		{
    			console.log('yay');
			},
		error: function(xhr, status, error) 
			{
				var errors = JSON.parse(xhr.responseText);
				console.log("failed");
  				console.log (errors);
			}
		});
	});
    
    
});
