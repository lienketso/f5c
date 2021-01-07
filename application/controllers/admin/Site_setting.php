<?php 
class Site_setting extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('site_model');
	}
	function index(){
		if($this->input->post()){
				$data = [];
				$input = $this->input->post();
				$check = true;
				foreach($input as $key=>$val){
					$d['key'] = $key;
					$d['value'] = $val;
					$data[] = $d;
					//if record not exit
					$data_update = [
						'key'=>$key,
						'value'=>$val
					];
					$where = ['key'=>$key];
					if($check && $this->site_model->check_not_exits($where) ){
						$this->site_model->create($data_update);
					}
					//end if
				}
				//insert if new record 
				// $this->site_model->insertBacth($data);
				// redirect(admin_url('site_setting'));
				//update all record
				if($this->site_model->updateBatch($data,'ey')){
					$this->session->set_flashdata('message', 'Bạn vừa sửa dữ liệu !');
					redirect(admin_url('site_setting'));
				}else{
					$this->session->set_flashdata('message', 'Sửa dữ liệu');
					$this->session->set_flashdata('alert', 'error');
					redirect(admin_url('site_setting'));
				}
		}

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$input['where'] = [];
		$input['order'] = ['key','asc'];
		$listSetting = $this->site_model->get_list($input);
		$arrSetting = [];
		foreach($listSetting as $key=>$val){
			$arrSetting[$val->key] = $val->value;
		}

		$this->data['arrSetting'] = $arrSetting;	
		$this->data['temp'] = 'admin/site_setting/index';
		$this->load->view('admin/main',$this->data);
	}
	public function contact(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		if($this->input->post()){
			$this->form_validation->set_rules('contact_title','Tiêu đề','required|min_length[2]');
			if($this->form_validation->run()){
				$data = [];
				$input = $this->input->post();
				$check = true;
				foreach($input as $key=>$val){
					$d['setting_key'] = $key;
					$d['setting_value'] = $val;
					$data[] = $d;
					$data_update = [
						'setting_key'=>$key,
						'setting_value'=>$val
					];
					$where = ['setting_key'=>$key];
					if($check && $this->site_model->check_not_exits($where) ){
						$this->site_model->create($data_update);
					}
				}
				//insert if new record
				// $this->site_model->insertBacth($data);
				$this->site_model->updateBatch($data,'setting_key');
				$this->session->set_flashdata('message', 'Bạn vừa cập nhật dữ liệu !');
				redirect(admin_url('site_setting/contact'));
			}
		}
		$listSetting = $this->site_model->get_list();
		$arrSetting = [];
		foreach($listSetting as $key=>$val){
			$arrSetting[$val->setting_key] = $val->setting_value;
		}
		$this->data['arrSetting'] = $arrSetting;
		$this->data['temp'] = 'admin/site_setting/contact';
		$this->load->view('admin/main',$this->data);
	}
	function home(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		if($this->input->post()){
				$data = [];
				$input = $this->input->post();
				$check = true;
				foreach($input as $key=>$val){
					$d['setting_key'] = $key;
					$d['setting_value'] = $val;
					$data[] = $d;
					//if record not exit
					$data_update = [
						'setting_key'=>$key,
						'setting_value'=>$val
					];
					$where = ['setting_key'=>$key];
					if($check && $this->site_model->check_not_exits($where) ){
						$this->site_model->create($data_update);
					}
					//end if
				}
				//insert if new record
				//$this->site_model->insertBacth($data);
				$this->site_model->updateBatch($data,'setting_key');
				$this->session->set_flashdata('message', 'Bạn vừa cập nhật dữ liệu !');
				redirect(admin_url('site_setting/home'));
		}
		$listSetting = $this->site_model->get_list();
		$arrSetting = [];
		foreach($listSetting as $key=>$val){
			$arrSetting[$val->setting_key] = $val->setting_value;
		}
		$this->data['arrSetting'] = $arrSetting;
		$this->data['temp'] = 'admin/site_setting/home';
		$this->load->view('admin/main',$this->data);
	}
	function keyword(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		if($this->input->post()){
				$data = [];
				$input = $this->input->post();
				$check = true;
				foreach($input as $key=>$val){
					$d['setting_key'] = $key;
					$d['setting_value'] = $val;
					$data[] = $d;
					//if record not exit
					$data_update = [
						'setting_key'=>$key,
						'setting_value'=>$val
					];
					$where = ['setting_key'=>$key];
					if($check && $this->site_model->check_not_exits($where) ){
						$this->site_model->create($data_update);
					}
					//end if
				}
				//insert if new record
				//$this->site_model->insertBacth($data);
				$this->site_model->updateBatch($data,'setting_key');
				$this->session->set_flashdata('message', 'Bạn vừa cập nhật dữ liệu !');
				redirect(admin_url('site_setting/keyword'));
		}
		$listSetting = $this->site_model->get_list();
		$arrSetting = [];
		foreach($listSetting as $key=>$val){
			$arrSetting[$val->setting_key] = $val->setting_value;
		}
		$this->data['arrSetting'] = $arrSetting;
		$this->data['temp'] = 'admin/site_setting/keyword';
		$this->load->view('admin/main',$this->data);
	}
		//config email
		function mail(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		if($this->input->post()){
				$data = [];
				$input = $this->input->post();
				$check = true;
				foreach($input as $key=>$val){
					$d['key'] = $key;
					$d['value'] = $val;
					$data[] = $d;
					//if record not exit
					$data_update = [
						'key'=>$key,
						'value'=>$val
					];
					$where = ['key'=>$key];
					if($check && $this->site_model->check_not_exits($where) ){
						$this->site_model->create($data_update);
					}
					//end if
				}
				//insert if new record
				//$this->site_model->insertBacth($data);
				$this->site_model->updateBatch($data,'key');
				$this->session->set_flashdata('message', 'Bạn vừa cập nhật dữ liệu !');
				redirect(admin_url('site_setting/mail'));
		}
		$input['order'] = ['key','asc'];
		$listSetting = $this->site_model->get_list($input);
		$arrSetting = [];
		foreach($listSetting as $key=>$val){
			$arrSetting[$val->key] = $val->value;
		}
		$this->data['arrSetting'] = $arrSetting;
		$this->data['temp'] = 'admin/site_setting/mail';
		$this->load->view('admin/main',$this->data);
	}
}