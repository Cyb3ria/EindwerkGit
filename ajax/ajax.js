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




//Index
	//Favorite
	$('.favoriteFalse').on('click', function () 
	{
		event.preventDefault();
		var butData = $(this).attr("data");
		var userData = $(this).attr("data-user");

     	$.ajax
     	({
     	type:		'GET',
    	url: 		'ajax-favorite.php',
    	data: 		'n_id='+butData+'&uid='+userData,
    	success: function(data)
    		{
    			location.reload(true)
			},
		error: function(xhr, status, error) 
			{
				var errors = JSON.parse(xhr.responseText);
				console.log("failed");
  				console.log (errors);
			}
		});
	});



	//UnFavorite
	$('.favoriteTrue').on('click', function () 
	{
		event.preventDefault();
		var butData = $(this).attr("data");
		var userData = $(this).attr("data-user");

     	$.ajax
     	({
     	type:		'GET',
    	url: 		'ajax-unfavorite.php',
    	data: 		'n_id='+butData+'&uid='+userData,
    	success: function(data)
    		{
    			location.reload(true)
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