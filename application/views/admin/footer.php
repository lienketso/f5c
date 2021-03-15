<footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="https://f5.vn" target="_blank">f5.vn</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= public_url();?>/admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= public_url();?>/admin/vendors/chart.js/Chart.min.js"></script>
  <script src="<?= public_url();?>/admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js" ></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
    <script src="<?= public_url();?>/admin/assets/ajax.js"></script>
  <script src="<?= public_url();?>/admin/js/main.js"></script>
  <script src="<?= public_url();?>/admin/js/formpickers.js" ></script>
  <script src="<?= public_url();?>/admin/vendors/summernote/dist/summernote-bs4.min.js" ></script>
  <script src="<?= public_url();?>/admin/js/editorDemo.js" ></script>
  <script src="<?= public_url();?>/admin/vendors/dropify/dropify.min.js"></script>
  <script src="<?= public_url();?>/admin/js/dropify.js" ></script>
  <script src="<?= public_url();?>/admin/js/off-canvas.js"></script>
  <script src="<?= public_url();?>/admin/js/hoverable-collapse.js"></script>
  <script src="<?= public_url();?>/admin/js/template.js"></script>
  <script src="<?= public_url();?>/admin/js/settings.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= public_url();?>/admin/js/dashboard.js"></script>
  <script src="<?= public_url();?>/admin/ckfinder/ckfinder_v1.js"></script>
  <script src="<?= public_url();?>/admin/ckeditor/ckeditor.js"></script>
  <!-- End custom js for this page-->
<script type="text/javascript">
  var nvcms_url = "<?php echo public_url('admin'); ?>";
  var domain_url = "<?php echo base_url(); ?>";
//   var editor = CKEDITOR.replace( 'editor1', {
//     filebrowserBrowseUrl: nvcms_url+'js/ckfinder/',
//     filebrowserImageBrowseUrl: nvcms_url+'/ckfinder/ckfinder.html?Type=Images',
//     filebrowserUploadUrl: nvcms_url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
//     filebrowserImageUploadUrl: nvcms_url+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
//     filebrowserWindowWidth : '1000',
//     filebrowserWindowHeight: '700'
// } );
$('.makeMeRichTextarea').each( function () {
   var editor = CKEDITOR.replace( this.id, {
    filebrowserBrowseUrl: nvcms_url+'/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: nvcms_url+'/ckfinder/ckfinder.html?Type=Images',
    filebrowserUploadUrl: domain_url+'/upload.php',
    filebrowserUploadMethod  : 'form',
    filebrowserImageUploadUrl: domain_url+'/upload.php',
    filebrowserWindowWidth : '1000',
    filebrowserWindowHeight: '700'
});
     //CKFinder.SetupFCKeditor( editor, '../' );
  });
</script>
<script type="text/javascript">
  var ckfinder_url = "<?php echo public_url('admin/ckfinder/'); ?>";
  var  editedField;
  function browseServer(){
    var finder = new CKFinder();
    finder.BasePath = ckfinder_url;
    finder.SelectFunction = SetFileField;
    finder.Popup();
  }
  function SetFileField(fileurl){
    document.getElementById('xFilePath').value = fileurl;
    document.getElementById('imgreview').src = fileurl;
  }
  function browseServerSetting(field){
    editedField = field;
    var finder = new CKFinder();
     finder.BasePath = ckfinder_url;
     finder.SelectFunction =  SetFileFieldSetting;
     finder.Popup();
    }
    function SetFileFieldSetting(field,fileurl){
    document.getElementById(editedField).value = fileurl.fileUrl;
    }
</script>
  <script type="text/javascript">
        var nodeType = $('select[name="menu_type"]');
        var nodePage = $('.node-page');
        nodePage.hide();
        var nodeNews = $('.node-news');
        nodeNews.hide();
        var nodeProduct = $('.node-product');
        nodeProduct.hide();
        var nodeLink = $('.node-link');
        nodeLink.hide();
        if(nodeType.val() === 'category'){
            nodeNews.show();
        }else if (nodeType.val() === 'page'){
            nodePage.show();
        }else if(nodeType.val() === 'link'){
            nodeLink.show();
        }
        nodeType.on('change', function (e) {
            var _this = $(e.currentTarget);
            var value = _this.val();
            if (value == 'category') {
                nodeNews.show();
                nodePage.hide();
                nodeLink.hide();
                nodeProduct.hide();
                $('#catid').attr('disabled',false);
                $('input[name="link"]').attr('readonly', true);
                $('input[name="link"]').val('');
                $('#pageid').attr('disabled',true);
                $('#categoryid').attr('disabled',true);
            }
            else if(value == 'product'){
                nodeProduct.show();
                nodePage.hide();
                nodeLink.hide();
                nodeNews.hide();
                $('#categoryid').attr('disabled',false);
                $('input[name="link"]').val('');
                $('input[name="link"]').attr('readonly', true);
                $('#pageid').attr('disabled',true);
                $('#catid').attr('disabled',true);
            }
            else if(value == 'chothue'){
                nodePage.hide();
                nodeLink.hide();
                nodeNews.hide();
                nodeProduct.hide();
                $('#categoryid').attr('disabled',true);
                $('input[name="link"]').val('');
                $('input[name="link"]').attr('readonly', true);
                $('#pageid').attr('disabled',true);
                $('#catid').attr('disabled',true);
            }
            else if(value == 'page'){
                nodePage.show();
                nodeLink.hide();
                nodeNews.hide();
                nodeProduct.hide();
                $('input[name="link"]').val('');
                $('input[name="link"]').attr('readonly', true);
                $('#pageid').attr('disabled',false);
                $('#catid').attr('disabled',true);
                $('#categoryid').attr('disabled',true);
            }
            else if(value == 'link'){
                nodeLink.show();
                nodePage.hide();
                nodeNews.hide();
                nodeProduct.hide();
                $('input[name="link"]').attr('readonly', false)
                $('input[name="slug"]').attr('disabled',true)
                $('input[name="slug"]').val('');
                $('#pageid').attr('disabled',true);
                $('#catid').attr('disabled',true);
                $('#categoryid').attr('disabled',true);
            }
            else {
                nodePage.hide();
                nodeNews.hide();
                nodePage.hide();
                nodeProduct.hide();
                $('#pageid').attr('disabled',true);
                $('#catid').attr('disabled',true);
                $('input[name="link"]').removeAttr('readonly')
                $('input[name="link"]').val('');
                $('input[name="name"]').val('');
                ('#categoryid').attr('disabled',true);
            }
        })
        $('select[id="catid"]').on('change', function (e) {
           // var data = $('#taxonomyid').val();
            var selectedData = $(this).children("option:selected").text();
            var slug = menuSlug(selectedData);
            $('input[name="name"]').val(selectedData);
            $('input[name="slug"]').val(slug);
        });
        $('select[id="categoryid"]').on('change', function (e) {
           // var data = $('#taxonomyid').val();
            var selectedData = $(this).children("option:selected").text();
            var selectedSlug = $(this).children("option:selected").val();
            var slug = menuSlug(selectedSlug);
            $('input[name="name"]').val(selectedData);
            $('input[name="slug"]').val(slug);
        });
        $('select[id="pageid"]').on('change', function (e) {
            // var data = $('#taxonomyid').val();
            var selectedData = $(this).children("option:selected").text();
            var selectedVal = $(this).children("option:selected").val();
            var slug = menuSlug(selectedData);
            $('input[name="name"]').val(selectedData);
            $('input[name="slug"]').val(selectedVal);
        });
</script>
<script type="text/javascript">
        var on = $('.opensetting');
        on.hide();
         $('button[id="onset"]').on('click', function (e) {
          on.show();
        });
        $('button[id="offset"]').on('click', function (e) {
          on.hide();
        });
</script>
<link href="<?= public_url('admin/vendors/select2') ?>/select2.min.css" rel="stylesheet" />
<script src="<?= public_url('admin/vendors/select2') ?>/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    if ($(".js-example-basic-single").length) {
    $(".js-example-basic-single").select2();
  }
    $('.js-example-basic-multiple').select2();
});
</script>
</body>
</html>