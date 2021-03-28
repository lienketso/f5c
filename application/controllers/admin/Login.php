<?php

Class Login extends MY_Controller{

	function index(){

		if($this->input->post()){

			$this->form_validation->set_rules('login','Login','callback_check_login');

			if($this->form_validation->run()){

				$this->session->set_userdata('login',true);

				redirect(admin_url('home'));

			}

		}

		$this->load->view('admin/login/index');

	}

	function check_login(){

		$username = $this->input->post('username');

		$password = $this->input->post('password');

		$password = md5($password);

		$this->load->model('admin_model');

		$where = array('username'=>$username, 'password'=>$password);

		$admin = $this->admin_model->get_info_rule($where);
		$this->session->set_userdata('userlogin',$admin);
		if($admin){

			$this->session->set_userdata('permission',json_decode($admin->permission));

			$this->session->set_userdata('admin_id', $admin->id);

			return true;

		}

		else{

			$this->form_validation->set_message(__FUNCTION__,'<div class="alert alert-danger" role="alert">Tài khoản hoặc mật khẩu không đúng !</div>');

			return false;

		}

	}

}