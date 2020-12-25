<?php
Class Home extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('site_model');
	}
	function lang($lang=''){
		$language_list = $this->config->item('language_list');
		if(!isset($language_list[$lang])){
			$this->session->set_userdata('language_current','vn');
			redirect(admin_url('home'));
		}else{
			$this->session->set_userdata('language_current', $lang);
			redirect(admin_url('home'));
		}
	}
	function index(){
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->load->model('product_model');
		$allProduct = $this->product_model->get_total();
		$this->data['allProduct'] = $allProduct;

		$xx['where'] = ['count_view>='=>10];
		$xx['order'] = ['count_view','desc'];
		$xx['limit'] = [5,0];
		$productViewmore = $this->product_model->get_list($xx);
		$this->data['productViewmore'] = $productViewmore;

		$this->load->model('news_model');
		$allNews = $this->news_model->get_total();
		$this->data['allNews'] = $allNews;


		$this->data["temp"] = 'admin/home/index';
		$this->load->view('admin/main',$this->data);
	}
	function service_setting(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$listSetting = $this->site_model->get_list();
		$arrSetting = [];
		foreach($listSetting as $key=>$val){
			$arrSetting[$val->setting_key] = $val->setting_value;
		}
		$this->data['arrSetting'] = $arrSetting;
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
				// $this->site_model->insertBacth($data);
				// redirect(admin_url('site_setting'));
				//update all record
			if($this->site_model->updateBatch($data,'setting_key')){
				$this->session->set_flashdata('message', 'Bạn vừa sửa dữ liệu !');
				redirect(admin_url('home/service_setting'));
			}else{
				$this->session->set_flashdata('message', 'Sửa dữ liệu');
				$this->session->set_flashdata('alert', 'error');
				redirect(admin_url('home/service_setting'));
			}
		}
		$this->data["temp"] = 'admin/news/templates/service/setting';
		$this->load->view('admin/main',$this->data);
	}
	function tour_setting(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$listSetting = $this->site_model->get_list();
		$arrSetting = [];
		foreach($listSetting as $key=>$val){
			$arrSetting[$val->setting_key] = $val->setting_value;
		}
		$this->data['arrSetting'] = $arrSetting;
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
			if($this->site_model->updateBatch($data,'setting_key')){
				$this->session->set_flashdata('message', 'Bạn vừa sửa dữ liệu !');
				redirect(admin_url('home/tour_setting'));
			}else{
				$this->session->set_flashdata('message', 'Sửa dữ liệu');
				$this->session->set_flashdata('alert', 'error');
				redirect(admin_url('home/tour_setting'));
			}
		}
		$this->data["temp"] = 'admin/news/templates/tour/setting';
		$this->load->view('admin/main',$this->data);
	}
	function real_setting(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$listSetting = $this->site_model->get_list();
		$arrSetting = [];
		foreach($listSetting as $key=>$val){
			$arrSetting[$val->setting_key] = $val->setting_value;
		}
		$this->data['arrSetting'] = $arrSetting;
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
			if($this->site_model->updateBatch($data,'setting_key')){
				$this->session->set_flashdata('message', 'Bạn vừa sửa dữ liệu !');
				redirect(admin_url('home/real_setting'));
			}else{
				$this->session->set_flashdata('message', 'Sửa dữ liệu');
				$this->session->set_flashdata('alert', 'error');
				redirect(admin_url('home/real_setting'));
			}
		}
		$this->data["temp"] = 'admin/news/templates/real/setting';
		$this->load->view('admin/main',$this->data);
	}
function car_setting(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$listSetting = $this->site_model->get_list();
		$arrSetting = [];
		foreach($listSetting as $key=>$val){
			$arrSetting[$val->setting_key] = $val->setting_value;
		}
		$this->data['arrSetting'] = $arrSetting;
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
			if($this->site_model->updateBatch($data,'setting_key')){
				$this->session->set_flashdata('message', 'Bạn vừa sửa dữ liệu !');
				redirect(admin_url('home/car_setting'));
			}else{
				$this->session->set_flashdata('message', 'Sửa dữ liệu');
				$this->session->set_flashdata('alert', 'error');
				redirect(admin_url('home/car_setting'));
			}
		}
		$this->data["temp"] = 'admin/news/templates/car/setting';
		$this->load->view('admin/main',$this->data);
	}
	function changeurl(){
		$this->load->model('news_model');
		$posts = $this->news_model->get_list();
		foreach($posts as $post){
			$content = str_replace('http://localhost/lanbali/uploads/',base_url('uploads/'),
				$post->content);
			$data = ['content'=>$content];
			$this->news_model->updateBatch($data);
		}
	}
	function logout(){
		if($this->session->userdata('login')){
			$this->session->unset_userdata('login');
			redirect(admin_url('login'));
		}
	}
}