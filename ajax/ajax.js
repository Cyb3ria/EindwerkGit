$(document).ready(function() 
{
	var beaconsfieldcounter = 0;
	var pID = 'beaconp'+beaconsfieldcounter+'';

	$('#addbeaconbtn').on('click', function(e) 
	{
		beaconsfieldcounter ++;
    	e.preventDefault();
        $('<p id="beaconp'+beaconsfieldcounter+'"><input type="text" required="required" id="beacon'+beaconsfieldcounter+'" name="beacon'+beaconsfieldcounter+'" ></p>').appendTo('#beaconsdiv');
        $('#removebeaconbtn').css('display', 'block');
	});

	$('.btn-remove').on('click', function(e)
	{
		if(beaconsfieldcounter > 0)
		{
			console.log('kappa');
    		e.preventDefault();
    		$('#beaconp'+beaconsfieldcounter+'').remove();
			beaconsfieldcounter --;

			if(beaconsfieldcounter == 0)
			{
				$('#removebeaconbtn').css('display', 'none');
			}
		}
	});

	$('.removalLink').on('click', function(e)
	{
		e.preventDefault;
		console.log('remove werkt');
	});
});

