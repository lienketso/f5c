$( document ).ready(function() {

	$('#btnGetphone').on('click',function(e){
		e.preventDefault();
		let _this = $(e.currentTarget);
		let mess = '';
		let phone = $('input[name="txt_phone"]').val();
		let title = _this.attr('data-title');
		let url = _this.attr('data-url');

		if (phone.length <= 0) {
			mess += '<p><i class="glyphicon glyphicon-info-sign"></i> Vui lòng nhập số điện thoại !</p>';
		}
		if(phone.length>=13){
			mess += '<p><i class="glyphicon glyphicon-info-sign"></i> Số điện thoại không đúng !</p>';
		}

		if(mess.length <=0 ){
			$('.loading').css('display', 'inline-flex');
			$.ajax({
				type: "POST",
				url: url,
				data: {
					phone,title
				},
			})
			.done(function(res){
				let html = res;
				 $('#successID').html(res);
				 $('input[name="txt_phone"]').val('');
				 $('.alert-content').fadeOut(1000);
			})
			.always(function(resp) {
				setTimeout(() => {
					$('.loading').css('display', 'none');
				}, 2000)
			})

		}else{
			$('.alert-content').fadeIn(2000);
			$('.alert-content').html(mess);
		}

	});

});