$(document ).ready(function() { 
	const list = [];
	$('.sosanh_page').on('click',function(e){
		$('.sticky_compare').show();

		e.preventDefault();
		let _this = $(e.currentTarget);
		let url = _this.attr('data-url');
		let id = _this.attr('data-id');
		list.push(id);
		if(list.length>3){
			alert('Bạn đã chọn đủ 3 sản phẩm, ấn vào [×] trong danh sách so sánh để bỏ bớt trước khi chọn sản phẩm khác!');
			return false;
		}
		// console.log(list);
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
			$('#frmCompare').append('<input id="Ip'+id+'" type="hidden" name="comparelist[]" value="'+id+'">');
		})
		.always(function(resp) {
			setTimeout(() => {
				$('.loading').css('display', 'none');
			}, 2000)
		})
	});

	//add new compare
	$('.addmorecom').on('click',function(e){
		e.preventDefault();
		let _this = $(e.currentTarget);
		let url = _this.attr('data-href');
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
			$('#themCom').hide();
			$('#modal-id').css('display', 'none');
			$('#modal-id').attr('aria-hidden', 'true');
			$('#modal-id').removeClass('in');
			$('#modal-id').modal('hide');
			$('#CompareID').append(html);
		})
		.always(function(resp) {
			setTimeout(() => {
				$('.loading').css('display', 'none');
			}, 2000)
		});
	});

	//remove compare home
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
			$('#Ip'+id+'').remove();
			list.splice(list.indexOf(id), 1);
		});

	});  

      //remove compare page
      $(document).on('click','.remove_com',function(){
      	let id = $(this).attr("data-id"); 
      	$('#com'+id+'').remove(); 
      	$('#themCom').show();
      });

      $('#btnSS').on('click',function(e){
      	$('#frmCompare').submit();
      })

  });