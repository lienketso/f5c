$(document).ready(function () {
	const list = [];
	$('.sosanh_page').on('click', function (e) {
		$('.sticky_compare').show();

		e.preventDefault();
		let _this = $(e.currentTarget);
		let url = _this.attr('data-url');
		let id = _this.attr('data-id');
		var existed = false;
		_.find(list, function (num) {
			if (num == id) {
				existed = true;
			}
		})
		if (existed) {
			alert("Bạn đã chọn sản phẩm này rồi, vui lòng chọn sản phẩm khác");
			return false;
		}
		console.log(existed);
		list.push(id);
		if (list.length > 3) {
			alert('Bạn đã chọn đủ 3 sản phẩm, ấn vào [×] trong danh sách so sánh để bỏ bớt trước khi chọn sản phẩm khác!');
			return false;
		}
		$('#btnSS').show();
		if (list.length == 1) {
			$('#btnSS').hide();
		}
		console.log(list);
		$.ajax({
			type: "POST",
			url: url,
			data: {
				id
			},
		})
			.done(function (res) {
				let html = res;
				$('#list_com').prepend(res);
				$('#frmCompare').append('<input id="Ip' + id + '" type="hidden" name="comparelist[]" value="' + id + '">');
			})
			.always(function (resp) {
				setTimeout(() => {
					$('.loading').css('display', 'none');
				}, 2000)
			})
	});

	//add new compare
	$('.addmorecom').on('click', function (e) {
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
			.done(function (res) {
				let html = res;
				$('#modal-id').css('display', 'none');
				$('#modal-id').attr('aria-hidden', 'true');
				$('#modal-id').removeClass('in');
				$('#modal-id').modal('hide');
				$(html).insertBefore($('#themCom'));	
				if($('.bao_border').length>=3){
					$('#themCom').hide();
				}		
			})
			.always(function (resp) {
				setTimeout(() => {
					$('.loading').css('display', 'none');
				}, 2000)
			});
	});

	//remove compare home
	$(document).on('click', '.del_compare', function () {
		var id = $(this).attr("data-id");
		let url = $(this).attr('data-url');
		$.ajax({
			type: 'POST',
			url: url,
			data: { id },
		})
			.done(function (res) {
				$('#' + id + '').remove();
				$('#Ip' + id + '').remove();
				list.splice(list.indexOf(id), 1);
				$('#btnSS').show();
				if (list.length == 1) {
					$('#btnSS').hide();
				}
			});

	});
	// Reset danh sách compare về rỗng
	$('#dong_ss').on('click',function(){
		list.length = 0;
        $('.sticky_compare').hide();
		$('#list_com').html(null);
      })
	//remove compare page
	$(document).on('click', '.remove_com', function () {
		let id = $(this).attr("data-id");
		$('#com' + id + '').remove();
		$('#themCom').show();
	});

	$('#btnSS').on('click', function (e) {
		$('#frmCompare').submit();
	});

	//add item phụ kiện
	$('.alert_add').hide();
	$('.addpk').on('click', function (e) {
		e.preventDefault();
		let _this = $(e.currentTarget);
		let id = _this.attr("data-id");
		let url = _this.attr('data-url');
		$.ajax({
			type: "POST",
			url: url,
			data: {
				id
			},
		})
			.done(function (res) {
				let html = res;
				$('.alert_add').show(500);
				$('#countCart').html(html);
			})

	});
	//end add item pk
	
});