$(document ).ready(function() { 
	$('.sosanh_page').on('click',function(e){
		$('.sticky_compare').show();
		e.preventDefault();
		let _this = $(e.currentTarget);
		let url = _this.attr('data-url');
		let id = _this.attr('data-id');
		$.ajax({
				type: "POST",
				url: url,
				data: {
					id
				},
			})
			.done(function(res){
				let html = res;
				 $('#list_com').prepend(res);
			})
			.always(function(resp) {
				setTimeout(() => {
					$('.loading').css('display', 'none');
				}, 2000)
			})
	});

});