<?php
Class Upload extends MY_Controller{
	function __construct(){
		parent::__construct();

	}
	function index(){
		$this->load->library('upload_library');
		 if($this->input->post('submit'))
      	{
      		$file_path = './uploads';
      		$data = $this->upload_library->upload($file_path, 'image');
         	echo '<pre>';
         	print_r($data);
  		}

		$this->data['temp'] = 'admin/upload/index';
		$this->load->view('admin/main', $this->data);
	}
	function upload_file(){
		$this->load->library('upload_library');
		if($this->input->post('submit'))
      	{
      		$upload_path = './uploads';
      		$data = $this->upload_library->upload_file($upload_path, 'image_list');
      		echo '<pre>';
         	print_r($data);
         	echo '</pre>';
  		}

		$this->data['temp'] = 'admin/upload/upload_file';
		$this->load->view('admin/main', $this->data);
	}




}