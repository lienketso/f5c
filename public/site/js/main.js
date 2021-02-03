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
				 $('#frmCompare').attr('action', 'http://localhost/f5c/compare/index?product='+id);
			})
			.always(function(resp) {
				setTimeout(() => {
					$('.loading').css('display', 'none');
				}, 2000)
			})
	});

	//remove compare
      $(document).on('click', '.del_compare', function(){  
       var id = $(this).attr("data-id");  
       let url = $(this).attr('data-url');
       	 $.ajax({
       	 	type: 'POST',
       	 	url: url,
       	 	data: {id},
       	 })
       	 .done(function(res){
       	 	$('#'+id+'').remove(); 
       	 })
          
     });  

      $('#btnSS').on('click',function(e){
      	$('#frmCompare').submit();
      })

});