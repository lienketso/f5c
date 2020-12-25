<?php
Class User extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
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
	// page home admin
	function index(){
		$this->load->library('pagination');
		$total_row = $this->admin_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('admin/index');
		$config['total_rows']  = $total_row;
		$config['per_page']    = 10;
		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<ul class="pagination pagination-flat pagination-success">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$config['first_link'] = '<i class="mdi mdi-chevron-left"></i>';
		$config['last_link'] = '<i class="mdi mdi-chevron-right"></i>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '<i class="mdi mdi-chevron-right"></i>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="mdi mdi-chevron-left"></i>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(4);
		$segment = intval($segment);
		$input = array();
		$input["limit"] = array($config['per_page'], $segment);
		$input['where'] = [];
		$name = $this->input->get('name');
		if($name){
			$input['like'] = array('name', $name);
		}
		$list = $this->admin_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$alert = $this->session->flashdata('alert');
		$this->data['message'] = $message;
		$this->data['alert'] = $alert;
		$this->data['temp'] = 'admin/user/index';
		$this->load->view('admin/main', $this->data);
	}
	//kiểm tra callback username
	function check_username(){
		$action = $this->uri->rsegment(2);
		$username = $this->input->post('username');
		$where = array('username'=> $username);
		$check = true;
		if($action == 'edit'){
			$info = $this->data['info'];
			if($info->username == $username){
				$check = false;
			}
		}
		if($check && $this->admin_model->check_exits($where)){
			//trả về thông báo lỗi
			$this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại !');
			return false;
		}
		else{
			return true;
		}
	}
	function add(){
	//neu co du lieu post len
		if($this->input->post()){
			$this->form_validation->set_rules('name','Họ và tên','required|min_length[4]');
			$this->form_validation->set_rules('username','Tên tài khoản','required|min_length[4]|callback_check_username');
			$this->form_validation->set_rules('password','Mật khẩu','required|min_length[4]');
			$this->form_validation->set_rules('repassword','Nhâp lại mật khẩu','matches[password]');
			if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');
				$email = $this->input->post('email');
				$image = $this->input->post('image');
				$type = $this->input->post('type');
				$data = array(
					'name'=> $name,
					'username' => $username,
					'password' => md5($password),
					'address' => $address,
					'phone' => $phone,
					'email'=>$email,
					'image'=>$image,
					'type'=>$type
					);
				$permission = $this->input->post('permission');
				$data['permission'] = json_encode($permission);
				if($this->admin_model->create($data)){
					// tạo nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				}
				else{
					$this->session->set_flashdata('message', 'Lỗi dữ liệu, không thêm được !');
				}
				//chuyển sang trang danh sách admin
				redirect(admin_url('user'));
			}
		}
		//lay ra phan quyen module
		$this->config->load('permission',true);
		$config_permission = $this->config->item('permission');
		$this->data['config_permission'] = $config_permission;
		$this->data['temp'] = 'admin/user/add';
		$this->load->view('admin/main', $this->data);
	}
	function edit(){
		//lấy ra id để edit
		$admin_id = $this->uri->rsegment('3');
		$admin_id = intval($admin_id);
		//$cond = "admin_id = '$admin_id'";
		//lấy thông tin quản trị viên
		$info = $this->admin_model->get_info($admin_id);
		if(!$info){
			$this->session->set_flashdata('message', 'Không tồn tại tài khoản này !');
			redirect(admin_url('admin'));
		}
		$this->data['info'] = $info;
		$info->permission = json_decode($info->permission);
		if($this->input->post()){
		$this->form_validation->set_rules('name','Họ và tên','required|min_length[8]');
		$this->form_validation->set_rules('username','Tên tài khoản','required|min_length[4]');
		//nếu trường password được nhập
		$password = $this->input->post('password');
		if($password){
		$this->form_validation->set_rules('password','Mật khẩu','required|min_length[6]');
		}
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');
				$email = $this->input->post('email');
				$image = $this->input->post('image');
				$type = $this->input->post('type');
				$data = array(
					'name'=> $name,
					'username' => $username,
					'address' => $address,
					'phone' => $phone,
					'email'=>$email,
					'image'=>$image,
					'type'=>$type
					);
				$permission = $this->input->post('permission');
				$data['permission'] = json_encode($permission);
				//nếu tồn tại mật khẩu mới gán mật khẩu
			if($password){
			$data['password'] = md5($password);
			}
			if($this->admin_model->update($admin_id,$data)){
				$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công !');
			}
			else{
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công !');
				}
			//chuyển sang trang danh sách admin
				redirect(admin_url('user'));
			}
			}
		//lay ra phan quyen module
		$this->config->load('permission',true);
		$config_permission = $this->config->item('permission');
		$this->data['config_permission'] = $config_permission;
		//load view
		$this->data['temp'] = 'admin/user/edit';	
		$this->load->view('admin/main', $this->data);
	}
		function del(){
		$admin_id = $this->uri->rsegment('3');
		$admin_id = intval($admin_id);
		//lấy thông tin quản trị viên
		$info = $this->admin_model->get_info($admin_id);
		if($admin_id==6){
			$this->session->set_flashdata('message', 'Bạn không thể xóa admin mặc định !');
			$this->session->set_flashdata('alert','error');
			redirect(admin_url('user'));
		}
		if(!$info){
			$this->session->set_flashdata('message', 'Không tồn tại tài khoản này !');
			redirect(admin_url('user'));
		}
				$this->admin_model->deleteOne($admin_id);
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
				redirect(admin_url('user'));
		}
		function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('user'));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $admin = $this->admin_model->get_info($id);
        if($id==6){
			$this->session->set_flashdata('message', 'Bạn không thể xóa admin mặc định !');
			$this->session->set_flashdata('alert', 'error');
			redirect(admin_url('user'));
		}
        if(!$admin)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại người dùng này');
            redirect(admin_url('user'));
        }
        //thuc hien xoa san pham
        $this->admin_model->deleteOne($id);
    }
}//  end class