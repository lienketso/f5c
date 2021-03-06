<?php
function admin_url($url){
  return base_url('admin/'.$url);
}

// image url website
function product_link($url){
  return base_url('upload/public/'.$url);
}
if ( ! function_exists('redirect_back'))
{
  function redirect_back($link)
  {
    if(isset($_SERVER['HTTP_REFERER']))
    {
      header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    else
    {
      redirect($link);
    }
    exit;
  }
}
  function language_current(){
   $CI =& get_instance();
   $language_current = $CI->session->userdata('language_current');
   if(!isset($language_current) || empty($language_current)){
    $CI->session->set_userdata('language_current','vn');
    return 'vn';
  }else{
    return $language_current;
  }
}
function input_format_date($date=''){
  return date_format(new DateTime($date),'Y-m-d h:i:s');
}
function input_date($date){
  return date_format(new DateTime($date),'d-m-Y');
}
function changeIntTodate($int){
  return date("d-m-Y", $int);
}
function datenow(){
  return date_format(new DateTime(),'d/m/Y');
}
function showdate($date){
  return date_format(new DateTime($date),'m/d/Y');
}
function showdatefull($date){
  return date_format(new DateTime($date),'d/m/Y - h:i');
}
function showdate_vn($date){
  return date_format(new DateTime($date),'d/m/Y');
}

  /**
   * Tao chữ vào ảnh
   */
  function add_watermark($path_img, $settings = array(), $path_copyright="")
  {
      $CI =& get_instance();
      $wm_font_size = 16; // Watermark height (font size) contains 16% of image 
      $config = array();
      $config['image_library']  = 'gd2';
      $config['source_image']   = $path_img;
  
      if($path_copyright != '')
      {
          $config['wm_type'] = 'overlay';
          $config['wm_overlay_path'] = $path_copyright;
          $config['wm_vrt_alignment'] = 'middle';
          $config['wm_hor_alignment'] = 'center';
          $config['wm_padding'] = '0';
          $config['wm_opacity'] = '50';
      }
      else
      {
          $config['wm_type'] = 'text';
          $config['wm_vrt_alignment'] = 'bottom';
          $config['wm_hor_alignment'] = 'left';
          $config['wm_padding'] = '0';
          $config['wm_hor_offset']    = '0';
          $config['wm_vrt_offset']    = '8';
          $config['wm_text']          = 'f5c.vn';
          $config['wm_font_size']     = '40';
          $config['wm_font_color']    = '#fff';
          $config['wm_opacity']    = '100';
      }
      if(!empty($settings))
      {
          foreach($settings as $k=>$v)
          {
              $config[$k] = $v;
          }
      }
     
  
      //print_r($config);
      $obj = 'image_lib_'.random_string('unique');
      $CI->load->library('image_lib', $config, $obj);
      if ($CI->$obj->watermark())
      {
          return TRUE;
      }
      return FALSE;
  }

function yes_no($v){
  if($v==0){
   echo "<option value='1'>Hiển thị</option>";
   echo "<option value='0' selected=''>Ẩn</option>";
 }
 else if($v==1){
   echo "<option value='1' selected=''>Hiển thị</option>";
   echo "<option value='0'>Ẩn</option>";
 }
 else{
   echo "<option value='1'>Hiển thị</option>";
   echo "<option value='0'>Ẩn</option>";
 }
}
function get_menu_display($v){
  if($v==0){
    echo "<option value='0' selected='' >--Không chọn--</option>"; 
    echo "<option value='1'>Menu top</option>";  
    echo "<option value='2'>Menu chân trang</option>";
  }
  else if($v==1){
    echo "<option value='0'>--Không chọn--</option>"; 
    echo "<option value='1' selected=''>Menu top</option>";  
    echo "<option value='2'>Menu chân trang</option>";
  }
  else if($v==2){
    echo "<option value='0'>--Không chọn--</option>"; 
    echo "<option value='1' >Menu top</option>";  
    echo "<option value='2' selected=''>Menu chân trang</option>";
  }
  else{
    echo "<option value='0'>--Không chọn--</option>"; 
    echo "<option value='1' >Menu top</option>";  
    echo "<option value='2'>Menu chân trang</option>";
  }
}
function get_display($v){
  if($v==0){
    echo "<option value='0' selected=''>--Không chọn---</option>";
    echo "<option value='1'>Danh mục trang chủ</option>";
    echo "<option value='2'>Danh mục chân trang</option>";
  }
  if($v==1){
    echo "<option value='0'>--Không chọn---</option>";
    echo "<option value='1' selected=''>Danh mục trang chủ</option>";
    echo "<option value='2'>Danh mục chân trang</option>";
  }
  else if($v==2){
    echo "<option value='0'>--Không chọn---</option>";
    echo "<option value='1'>Danh mục trang chủ</option>";
    echo "<option value='2' selected=''>Danh mục chân trang</option>";
  }
}
function get_status($t=0,$v=0){
 if($v==0){
  echo "<option value='1'>Hiển thị</option>";
  echo "<option value='0' selected=''>Ẩn hiển thị</option>";
  echo "<option value='2'>Hiện trang chủ</option>";
}
else if($v==1){
  echo "<option value='1' selected=''>Hiển thị</option>";
  echo "<option value='0'>Ẩn hiển thị</option>";
  echo "<option value='2'>Hiện trang chủ</option>";
}
else if($v==2){
  echo "<option value='1'>Hiển thị</option>";
  echo "<option value='0'>Ẩn hiển thị</option>";
  echo "<option value='2' selected=''>Hiện trang chủ</option>";
}
else{
  echo "<option value='1'>Hiển thị</option>";
  echo "<option value='0'>Ẩn hiển thị</option>";
  echo "<option value='2'>Hiện trang chủ</option>";
}
}
function get_news_display($v){
 if($v==0){
  echo "<option value='0' selected='' >--Không chọn--</option>";
  echo "<option value='1'>Tin nổi bật</option>";
  echo "<option value='2' >Tin chân trang</option>";
}
else if($v==1){
  echo "<option value='0' >--Không chọn--</option>";
  echo "<option value='1' selected=''>Tin nổi bật</option>";
  echo "<option value='2' >Tin chân trang</option>";
}
else if($v==2){
  echo "<option value='0' >--Không chọn--</option>";
  echo "<option value='1'>Tin nổi bật</option>";
  echo "<option value='2' selected='' >Tin chân trang</option>";
}
else{
  echo "<option value='0'>--Không chọn--</option>";
  echo "<option value='1'>Tin nổi bật</option>";
  echo "<option value='2' >Tin chân trang</option>";
}
}
function get_adver_status($v=0){
 if($v==0){
  echo "<option value='0'>---Chọn vị trí quảng cáo---</option>";
  echo "<option value='1'>Home (300x230)</option>";
  echo "<option value='2'>Home 2 (570x400)</option>";
  echo "<option value='3'>Home bottom (1170x270)</option>";
}
else if($v==1){
  echo "<option value='0'>---Chọn vị trí quảng cáo---</option>";
  echo "<option value='1' selected=''>Home (300x230)</option>";
  echo "<option value='2'>Home 2 (570x400)</option>";
  echo "<option value='3'>Home bottom (1170x270)</option>";
}
else if($v==2){
  echo "<option value='0'>---Chọn vị trí quảng cáo---</option>";
  echo "<option value='1'>Home (300x230)</option>";
  echo "<option value='2' selected=''>Home 2 (570x400)</option>";
  echo "<option value='3'>Home bottom (1170x270)</option>";
}
else if($v==3){
  echo "<option value='0'>---Chọn vị trí quảng cáo---</option>";
  echo "<option value='1'>Home (300x230)</option>";
  echo "<option value='2'>Home 2 (570x400)</option>";
  echo "<option value='3' seleted=''>Home bottom (1170x270)</option>";
}
else{
  echo "<option value='0'>---Chọn vị trí quảng cáo---</option>";
  echo "<option value='1'>Home (585x262)</option>";
  echo "<option value='2'>Home 2 (292x532)</option>";
  echo "<option value='3'>Category left (293x307)</option>"; 
}
}
function get_product_status($v=0){
 if($v==0){
  echo "<option value='0' selected=''>Không hiển thị</option>";
  echo "<option value='1'>Đang hiển thị</option>";
  echo "<option value='2'>Sản phẩm bán chạy</option>";
  echo "<option value='3'>Sản phẩm mới</option>";
  echo "<option value='4'>Khuyến mại</option>";
}
else if($v==1){
  echo "<option value='0'>Không hiển thị</option>";
  echo "<option value='1' selected=''>Đang hiển thị</option>";
  echo "<option value='2'>Sản phẩm bán chạy</option>";
  echo "<option value='3'>Sản phẩm mới</option>";
  echo "<option value='4'>Khuyến mại</option>";
}
else if($v==2){
  echo "<option value='0'>Không hiển thị</option>";
  echo "<option value='1'>Đang hiển thị</option>";
  echo "<option value='2' selected=''>Sản phẩm bán chạy</option>";
  echo "<option value='3'>Sản phẩm mới</option>";
  echo "<option value='4'>Khuyến mại</option>";
}
else if($v==3){
  echo "<option value='0'>Không hiển thị</option>";
  echo "<option value='1'>Đang hiển thị</option>";
  echo "<option value='2'>Sản phẩm bán chạy</option>";
  echo "<option value='3' selected=''>Sản phẩm mới</option>";
  echo "<option value='4'>Khuyến mại</option>";
}
else if($v==4){
  echo "<option value='0'>Không hiển thị</option>";
  echo "<option value='1'>Đang hiển thị</option>";
  echo "<option value='2'>Hiển thị nổi bật</option>";
  echo "<option value='3'>Hiển thị tin mới</option>";
  echo "<option value='4' selected=''>Hiển thị bán chạy</option>";
}
else{
  echo "<option value='0' selected=''>Không hiển thị</option>";
  echo "<option value='1'>Đang hiển thị</option>";
  echo "<option value='2'>Hiển thị nổi bật</option>";
  echo "<option value='3'>Hiển thị tin mới</option>";
  echo "<option value='4'>Hiển thị bán chạy</option>";
}
}
function read_num_forvietnamese( $num = false ) {
  $str = '';
  $num  = trim($num);
  $arr = str_split($num);
  $count = count( $arr );
  $f = number_format($num);
       //KHÔNG ĐỌC BẤT KÌ SỐ NÀO NHỎ DƯỚI 999 ngàn
  if ( $count < 7 ) {
    $str = $num;
  } else {
        // từ 6 số trở lên là triệu, ta sẽ đọc nó !
        // "32,000,000,000"
    $r = explode(',', $f);
    switch ( count ( $r ) ) {
      case 4:
      $str = $r[0] . ' tỷ';
      if ( (int) $r[1] ) { $str .= ' '. $r[1] . ' Tr'; }
      break;
      case 3:
      $str = $r[0] . ' Triệu';
      if ( (int) $r[1] ) { $str .= ' '. $r[1] . 'K'; }
      break;
    }
  }
  return ( $str . ' ₫' );
}