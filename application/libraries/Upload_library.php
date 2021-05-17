<?php
Class Upload_library{
  var $CI = '';
  function __construct(){
    $this->CI = & get_instance();
  }
  //upload_path : đường dẫn lưu file
  //file_name : tên thẻ input upload file
  function upload($upload_path ='',$file_name=''){
    if (!is_dir($upload_path))
    {
        mkdir($upload_path, 0777, true);
    }
    $config = $this->config($upload_path);
    $this->CI->load->library('upload',$config);
    if($this->CI->upload->do_upload($file_name)){
      $data = $this->CI->upload->data();
    }
    else{
      $data = $this->CI->upload->display_errors();
    }
    return $data;
  }
  //upload nhiều file
  function upload_file($upload_path ='',$file_name=''){
    if (!is_dir($upload_path))
    {
        mkdir($upload_path, 0777, true);
    }
    $config = $this->config($upload_path);
    //lưu biến môi trường khi thực hiện upload
    $file  = $_FILES['image_list'];
    $image_list = array();
        $count = count($file['name']);//lấy tổng số file được upload
        for($i=0; $i<=$count-1; $i++) {
              $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
              $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
              $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
              $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
              $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
              //load thư viện upload và cấu hình
              $this->CI->load->library('upload', $config);
              $wm_font_size = 16; // Watermark height (font size) contains 16% of image 
              $config['max_size']      = '3000';
              // $config['image_library'] = 'GD2';
              // $config['source_image'] = $file['tmp_name'][$i];
              // $config['wm_text'] = '0975236688';
              // $config['wm_type'] = 'text';
              // $config['wm_font_size'] = '40';
              // $config['wm_vrt_alignment'] = 'bottom';
              // $config['wm_hor_alignment'] = 'left';
              // $config['wm_opacity'] = '100';
              // $this->CI->load->library('image_lib',$config);
              // $this->CI->image_lib->initialize($config);
              // $this->CI->image_lib->watermark();

              
              // $config['wm_overlay_path'] = base_url('watermark.png');
              // $config['wm_type'] = 'overlay';
              // $config['width'] = '50';
              // $config['height'] = '50';
              // $config['padding'] = '50';
              // $config['wm_opacity'] = '100';
              // $config['wm_vrt_alignment'] = 'bottom';
              // $config['wm_hor_alignment'] = 'right';
              // $config['wm_vrt_offset'] = '100';
              // $this->CI->image_lib->initialize($config);
              // $this->CI->image_lib->watermark();

              //thực hiện upload từng file
              if($this->CI->upload->do_upload())
              {
                  //nếu upload thành công thì lưu toàn bộ dữ liệu
                $data = $this->CI->upload->data();
                $image_list[] = $data['file_name'];
                  //in cấu trúc dữ liệu của các file
              }     
              else{
                $data = $this->CI->upload->display_errors();
              }
            }
            return $image_list;
          }
  //cấu hình upload file
          function config($upload_path =''){
          // $this->CI->load->helper('common');
          // $new_name = slug().$_FILES["userfiles"]['name'];
            $config = array();
          // $config['file_name'] = $new_name;
         //thuc mục chứa file
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['upload_path']   = $upload_path;
         //Định dạng file được phép tải
            $config['allowed_types'] = 'jpg|JPEG|png|gif|pdf';
         //Dung lượng tối đa

         //Chiều rộng tối đa
            return $config;
          }
        }