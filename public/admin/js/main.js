function check_del(){
  if (confirm("Bạn có thực sự muốn xóa [OK]:Yes [Cancel]:No?")) {
    return true;
  }
  else{ return false;}
}
function check_all() {
  var fmobj = document.theForm;
  for (var i=0;i<fmobj.elements.length;i++) {
    var e = fmobj.elements[i];
    if ((e.name != 'allbox') && (e.type=='checkbox') && (!e.disabled)) {
      e.checked = fmobj.allbox.checked;
    }
  }
  return true;
}
function saveIndex(){
  document.theForm.btnOnclick.value= "save"
  document.theForm.submit();
}
function xacnhanDelete(){
  var total = 0;
  var fmobj = document.theForm;
  for (var i=0;i<fmobj.elements.length;i++) {
    var e = fmobj.elements[i];
    if ((e.name != 'allbox') && (e.type=='checkbox') && (!e.disabled)) {
      if (e.checked) total++;
    }
  }
  if (total==0){ 
    alert('Chưa có đối tượng nào được chọn!');
    return false;
  }
  if (confirm("Bạn có thực sự muốn xóa [OK]:Yes [Cancel]:No?")) {
    document.theForm.btnOnclick.value= "delete"
    document.theForm.submit();
    return true;
  }
}
// convert text to slug
function ChangeToSlug() {
  var title, slug, seo_title;
  //Lấy text từ thẻ input title
  title = document.getElementById("input_name").value;
  //Đổi chữ hoa thành chữ thường
  slug = title.toLowerCase();
  //Đổi ký tự có dấu thành không dấu
  slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
  slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
  slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
  slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
  slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
  slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
  slug = slug.replace(/đ/gi, 'd');
  //Xóa các ký tự đặt biệt
  slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
  //Đổi khoảng trắng thành ký tự gạch ngang
  slug = slug.replace(/ /gi, "-");
  //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
  //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
  slug = slug.replace(/\-\-\-\-\-/gi, '-');
  slug = slug.replace(/\-\-\-\-/gi, '-');
  slug = slug.replace(/\-\-\-/gi, '-');
  slug = slug.replace(/\-\-/gi, '-');
  //Xóa các ký tự gạch ngang ở đầu và cuối
  slug = '@' + slug + '@';
  slug = slug.replace(/\@\-|\-\@|\@/gi, '');
  //In slug ra textbox có id “slug”
  if ($('#input-seo-title').length > 0) {
    seo_title = $('#input-seo-title');
    seo_title.val(title);
  }
  document.getElementById('input_slug').value = slug;
  $('.title-change').val(title);
  //$("#sortable").sortable();
}
function keyupMeta(){
  var desc;
  desc = document.getElementById("metadesc").value;
  $('.meta-desc').val(desc);
}
function menuSlug(Title) {
    //var title, slug, seo_title;
    //Lấy text từ thẻ input title
    //title = document.getElementById("input_name").value;
    //Đổi chữ hoa thành chữ thường
    slug = Title.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    return slug;
    //$("#sortable").sortable();
  }
  var inputnumber = 'Giá trị nhập vào không phải là số';
  function FormatNumber(str) {
    var strTemp = GetNumber(str);
    if (strTemp.length <= 3)
      return strTemp;
    strResult = "";
    for (var i = 0; i < strTemp.length; i++)
      strTemp = strTemp.replace(",", "");
    var m = strTemp.lastIndexOf(".");
    if (m == -1) {
      for (var i = strTemp.length; i >= 0; i--) {
        if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
          strResult = "," + strResult;
        strResult = strTemp.substring(i, i + 1) + strResult;
      }
    } else {
      var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
      var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."),
        strTemp.length);
      var tam = 0;
      for (var i = strphannguyen.length; i >= 0; i--) {
        if (strResult.length > 0 && tam == 4) {
          strResult = "," + strResult;
          tam = 1;
        }
        strResult = strphannguyen.substring(i, i + 1) + strResult;
        tam = tam + 1;
      }
      strResult = strResult + strphanthapphan;
    }
    return strResult;
  }
  function GetNumber(str) {
    var count = 0;
    for (var i = 0; i < str.length; i++) {
      var temp = str.substring(i, i + 1);
      if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
        alert(inputnumber);
        return str.substring(0, i);
      }
      if (temp == " ")
        return str.substring(0, i);
      if (temp == ".") {
        if (count > 0)
          return str.substring(0, ipubl_date);
        count++;
      }
    }
    return str;
  }
  function IsNumberInt(str) {
    for (var i = 0; i < str.length; i++) {
      var temp = str.substring(i, i + 1);
      if (!(temp == "." || (temp >= 0 && temp <= 9))) {
        alert(inputnumber);
        return str.substring(0, i);
      }
      if (temp == ",") {
        return str.substring(0, i);
      }
    }
    return str;
  }
  $(document).ready(function(){      
    var i=1;  
    $('#addImgList').click(function(){  
     i++;  
     $('#listImage').after('<div class="form-group" id="list'+i+'"><label></label><div class="input-group col-xs-12"><input type="text" name="image_list[]" id="'+i+'" class="form-control file-upload-info" placeholder="Upload Image"><span class="input-group-append"><button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('+i+')" type="button">Chọn</button></span><button type="button" class="btn-del btn_remove" id="'+i+'">X</button></div></div>');  
   });
    $(document).on('click', '.btn_remove', function(){  
     var button_id = $(this).attr("id");   
     $('#list'+button_id+'').remove();  
   });  
      //edit product
      $(document).on('click', '.btn_remove_e', function(){  
       var button_id = $(this).attr("id");   
       $('#liste'+button_id+'').remove();  
     });  
      // add new list service
      var k = 1;
      $('#addBox').click(function(){
        k++;
        $('#listBox').append('<div class="form-group" id="listS'+k+'"><label>Nội dung box <button type="button" class="btn-del btn_remove_service" id="'+k+'">Xóa</button></label><div class="input-group col-xs-12"><textarea name="meta_box_content[]" class="makeMeRichTextarea" id="edts'+k+'"></textarea></div></div>');
        var editor = CKEDITOR.replace( 'edts'+k, {
          filebrowserBrowseUrl: nvcms_url+'js/ckfinder/',
          filebrowserImageBrowseUrl: nvcms_url+'/ckfinder/ckfinder.html?Type=Images',
          filebrowserUploadUrl: nvcms_url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
          filebrowserImageUploadUrl: nvcms_url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
          filebrowserWindowWidth : '1000',
          filebrowserWindowHeight: '700'
        });
      });
      //delete service
      $(document).on('click', '.btn_remove_service', function(){  
       var service_id = $(this).attr("id");   
       $('#listS'+service_id+'').remove();  
     });  
      // delete edit service
      $(document).on('click', '.btn_remove_service_e', function(){  
       var service_id = $(this).attr("id");  
       if(confirm("Bạn có thực sự muốn xóa [OK]:Yes [Cancel]:No?")){ 
         $('#listEdit'+service_id+'').remove();  
       }
     });  
      //thêm lịch trình tour
      var l = 1;
      $('#addlt').click(function(){
        k++;
        $('#listLichtrinh').append('<div class="form-group lichtrinh-box" id="listL'+l+'"><input class="form-control" placeholder="Tiêu đề lịch trình" type="text" name="meta_lt_title[]" ><textarea class="form-control" placeholder="Nội dung lịch trình" rows="4" name="meta_lt_content[]"></textarea><button type="button" id="'+l+'" class="btn btn_remove_lt">Xóa lịch trình</button></div>');
      });
      //delete lịch trình
      $(document).on('click', '.btn_remove_lt', function(){  
       var service_id = $(this).attr("id");   
       $('#listL'+service_id+'').remove();  
     });  
      // delete edit lịch trình
      $(document).on('click', '.btn_remove_lt_e', function(){  
       var service_id = $(this).attr("id");  
       if(confirm("Bạn có thực sự muốn xóa [OK]:Yes [Cancel]:No?")){ 
         $('#listELT'+service_id+'').remove();  
       }
     }); 
      //end add lịch trình

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


  //select phụ kiện sản phẩm
  $(document).on('keyup', '.select2-search__field', function (e) {
    e.preventDefault();
    let _this = $(e.currentTarget);
    let keyword = $('.select2-search__field').val();
    let url = $('#slectPK').attr('data-url');

    $.ajax({
      type: "POST",
      url: url,
      data: {
        keyword
      },
    })
    .done(function(res){
      let html = res;
      $('#slectPK').html(res);
    })
    .always(function(resp) {
      setTimeout(() => {
        $('.loading').css('display', 'none');
      }, 2000)
    })
//end select

});
  $(document).ready(function(){
    $(".number").autoNumeric('init',{aPad:false});
    
    $(".number").blur(function(){
      let old = $(this).data('old-number');
      let new_n = $(this).autoNumeric('get');
      let url = $(this).data('url');    
      let id=$(this).attr('id'); 
      if(old!= new_n){
        $.post(url,{id:id, price:new_n})
        .done(function(res){
          $('input#'+id).attr('data-old-number',new_n);

          $.notify("Cập nhật thành công",'info',{showDuration:20000});
        });
      }
    });

    //change VAT
    $('.vat').on('blur',function(e){

      e.preventDefault();
      let _this = $(e.currentTarget);
      let id = _this.attr('data-id');
      let old = _this.attr('data-vat-old');
      let new_n = $('#vat_' + id).val();
      let url = _this.attr('data-url');
      
      let vat = $('#vat_' + id).val();
      if (old != new_n) {
        $.ajax({
          type: "POST",
          url: url,
          data: {
            id, vat
          },
        })
        .done(function(res) {
          $('#vat_' + id).attr('data-vat-old', new_n);

          $.notify("Cập nhật thành công", 'info');
        });
      }
    });
    //change status

    $('.product_status').on('click',function(e){
      e.preventDefault();
      let _this = $(e.currentTarget);
      var id = _this.attr('data-id');
      let show = _this.attr('data-show');
      let url = _this.attr('data-url');
      if (show == "0") {
        _this.attr('title', 'Click để ẩn sản phẩm');
        _this.removeClass('an_sp');
        _this.addClass('hien_sp');
        _this.html('Hiện')
        _this.attr('data-show', 1);
      } else {
        _this.attr('title', 'Click để hiện sản phẩm');
        _this.removeClass('hien_sp');
        _this.addClass('an_sp');
        _this.html('Ẩn'),
        _this.attr('data-show', 0);
      }
      $.post(url, {
            id: id,
            hide: show
        })
        .done(function(res) {
            $.notify('Trạng thái đã cập nhật !', 'info')
        })

    });

    //change feature
    $('.show_hot').on('click',function(e){
      e.preventDefault();
      let _this = $(e.currentTarget);
      var id = _this.attr('data-id');
      let show = _this.attr('data-show');
      let url = _this.attr('data-url');
      if (show == "0") {
        _this.attr('title', 'Click để ẩn nổi bật');
        _this.removeClass('hien_sp');
        _this.addClass('an_sp');
        _this.html('Nổi bật')
        _this.attr('data-show', 1);
    } else {
        _this.attr('title', 'Click để hiện nổi bật');
        _this.removeClass('an_sp');
        _this.addClass('hien_sp');
        _this.html('Không'),
        _this.attr('data-show', 0);
    }
    $.post(url, {
            id: id,
            feature: show
        })
        .done(function(res) {
            $.notify('Nổi bật đã cập nhật !', 'info')
        })


    });
    //change vat show or hide
    $('.vat_status').on('click',function(e){
      e.preventDefault();
      let _this = $(e.currentTarget);
      var id = _this.attr('data-id');
      let show = _this.attr('data-show');
      let url = _this.attr('data-url');
      if (show == "0") {
        _this.attr('title', 'Click để ẩn vat');
        _this.removeClass('hien_sp');
        _this.addClass('an_sp');
        _this.html('Hiện')
        _this.attr('data-show', 1);
    } else {
        _this.attr('title', 'Click để hiện vat');
        _this.removeClass('an_sp');
        _this.addClass('hien_sp');
        _this.html('Không'),
        _this.attr('data-show', 0);
    }
    $.post(url, {
            id: id,
            vatstatus: show
        })
        .done(function(res) {
            $.notify('Đã cập nhật trạng thái VAT !', 'info')
        })

    });

          //upload multifile ajax
    $('#files').change(function(e){
      let domaim = window.location.protocol+'//'+window.location.hostname+'/f5c/upload/public/media/';
      let admindomain = window.location.protocol+'//'+window.location.hostname+'/f5c/admin/';
      let publicadmin = window.location.protocol+'//'+window.location.hostname+'/f5c/public/admin/';
      let productid = $('#productid').val();
      e.preventDefault();
      let _this = $(e.currentTarget);
      var form_data = new FormData();
      let url = _this.attr('data-url');
      // Read selected files
      var totalfiles = document.getElementById('files').files.length;
      for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('files').files[index]);
      }
      form_data.append('productid',productid);
      // AJAX request
     $.ajax({
     url: url, 
     type: 'post',
     data: form_data,
     dataType: 'json',
     contentType: false,
     processData: false,
     success: function (response) {

       for(var index = 0; index < response.length; index++) {
         var src = response[index];
         // Add img element in <div id='preview'>
         $('#previewIMG').append('<div class="img_att_list" id="del'+index+'"><span data-id="'+index+'" data-link="upload/public/media/'+src+'" data-url="'+admindomain+'product/deleteFile" class="del_image"><img src="'+publicadmin+'images/delete.png"></span><img class="img_at" src="'+domaim+src+'"></div>');
       }

     }
   });

 });

        //del image ajax
    $(document).on('click', '.del_image', function(e){  
       e.preventDefault();
       let _this = $(e.currentTarget);
       let url = _this.attr('data-url');
       let link = _this.attr('data-link');
       var img_id = _this.attr("data-id"); 
       if(confirm("Bạn có thực sự muốn xóa [OK]:Yes [Cancel]:No?")){  
        $('#del'+img_id+'').remove();  
        }
        //ajax unlink and remove database
        $.ajax({
          url: url,
          type: 'post',
          data : {link,img_id},
          success: function (response) {
            console.log('success');
          }
        });

     });  

  }); //end document

  