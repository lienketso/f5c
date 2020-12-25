<?php
Class Upload_library{
	var $CI = '';
	function __construct(){
		$this->CI = & get_instance();
	}
	//upload_path : đường dẫn lưu file
	//file_name : tên thẻ input upload file
	function upload($upload_path ='',$file_name=''){
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
		      $config = array();
         //thuc mục chứa file
         //$config['encrypt_name'] = TRUE;
         $config['upload_path']   = $upload_path;
         //Định dạng file được phép tải
         $config['allowed_types'] = 'jpg|JPEG|png|gif|pdf';
         //Dung lượng tối đa
         $config['max_size']      = '3000';
         //Chiều rộng tối đa
         return $config;
	}
}