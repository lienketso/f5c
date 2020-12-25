<?php 
class About extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('site_model');
	}

	function setting(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		if($this->input->post()){
			$data = [];
				$input = $this->input->post();
				foreach($input as $key=>$val){
					$d['setting_key'] = $key;
					$d['setting_value'] = $val;
					$data[] = $d;
				}
			 $this->site_model->updateBatch($data,'setting_key');
			 $this->session->set_flashdata('message', 'Bạn vừa sửa dữ liệu !');
			 redirect(admin_url('about/setting'));	
		}

		$listSetting = $this->site_model->get_list();
		$arrSetting = [];
		foreach($listSetting as $key=>$val){
			$arrSetting[$val->setting_key] = $val->setting_value;
		}
		$this->data['arrSetting'] = $arrSetting;	

		$this->data['temp'] = 'admin/about/setting';
		$this->load->view('admin/main',$this->data);

	}

}