$(document).ready(function(){

	$('select[name="city_id"').on('change',function(e){
		cityid = $('#cityID').val();
		url = $('#cityID').attr('data-url');
		$.ajax({
			type: 'POST',
			url: url,
			data: {cityid: cityid},
		})
		.done(function(resp){
			$('#district').html(resp);
		});
		
	});

	//get Thi xa
		$('select[name="district_id"]').on('change',function(e){
			districtid = $('#district').val();
			link = $('#district').attr('data-link');
			$.ajax({
				type: 'POST',
				url: link,
				data: {districtid: districtid},
			})
			.done(function(resp){
				$('#thiXa').html(resp);
			});
			
		});

	});