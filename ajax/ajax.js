$(document).ready(function()
{ 
    // Saving Notes
	$(".titleNote").on("click", function(a)
	{
		var title = $(this).data('title');
        var beacon = $(this).data('beacon');
        var teaser = $(this).data('teaser');
        var link = $(this).data('link');
        var date = $(this).data('date');
        
		var url="specificEvent.php";

		var request = $.ajax
		({
			url: "ajax/ajax.php",
			type: "POST",
			data: 
			{ title : title, beacon : beacon, teaser : teaser, link : link, date : date }
			
		});

		request.done(function(){
			window.location = url;
		});

	
	a.preventDefault();
	});
    
    //Remove Item
    
    $('.removalLink').on('click', function(e)
	{
		e.preventDefault;
		console.log('remove werkt');
	});
    
});
