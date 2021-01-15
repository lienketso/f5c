<?php
Class Support extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('support_model');
		$this->load->model('support_group_model');
	}
	function index(){
		$this->load->library('pagination');
		$total_row = $this->support_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = admin_url('support/index');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows']  = $total_row;
		$config['per_page']    = 15;
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
		$input['where'] = array();
		$name = $this->input->get('name');
		if($name){
			$input['like'] = array('name', $name);
		}
		$list = $this->support_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/support/index';
		$this->load->view('admin/main', $this->data);
	}
	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('name','Họ tên','required|min_length[2]');
			$this->form_validation->set_rules('phone','Số điện thoại','required|min_length[9]');
			if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$name = $this->input->post('name');
				$phone = $this->input->post('phone');
				$mobile = $this->input->post('mobile');
				$email = $this->input->post('email');
				$skype = $this->input->post('skype');
				$yahoo = $this->input->post('yahoo');
				$sort_order = $this->input->post('sort_order');
				$group_id = $this->input->post('group_id');

				$data = array(
					'name'=> $name,
					'phone'=>$phone,
					'mobile'=>$mobile,
					'gmail'=>$email,
					'skype'=>$skype,
					'yahoo'=>$yahoo,
					'sort_order'=>$sort_order,
					'group_id'=>$group_id,
					);
				if($this->support_model->create($data)){
					// tạo nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				}
				else{
					$this->session->set_flashdata('message', 'Lỗi dữ liệu, không thêm được !');
				}
				//chuyển sang trang danh sách admin
				redirect(admin_url('support'));
			}
		}

		$input['where'] = [];
		$input['order'] = ['sort_order','asc'];
		$listGroup = $this->support_group_model->get_list($input);
		$this->data['listGroup'] = $listGroup;

		$this->data['temp'] = 'admin/support/add';
		$this->load->view('admin/main', $this->data);
	}
	function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->support_model->get_info($id);
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên người hỗ trợ','required|min_length[4]');
			$this->form_validation->set_rules('phone','Số điện thoại','required|min_length[9]');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$phone = $this->input->post('phone');
				$mobile = $this->input->post('mobile');
				$email = $this->input->post('email');
				$skype = $this->input->post('skype');
				$yahoo = $this->input->post('yahoo');
				$sort_order = $this->input->post('sort_order');
				$group_id = $this->input->post('group_id');
				$data = array(
					'name'=> $name,
					'phone'=>$phone,
					'mobile'=>$mobile,
					'gmail'=>$email,
					'skype'=>$skype,
					'yahoo'=>$yahoo,
					'sort_order'=>$sort_order,
					'group_id'=>$group_id,
					);
				$this->support_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('support'));
		}
	}
		$input['where'] = [];
		$input['order'] = ['sort_order','asc'];
		$listGroup = $this->support_group_model->get_list($input);
		$this->data['listGroup'] = $listGroup;
		$this->data['temp'] = 'admin/support/edit';
		$this->load->view('admin/main', $this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->support_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('support'));
		}
		$this->support_model->deleteOne($id);
		//xóa ảnh đã upload trên hệ thống kèm tin tức
		$image_link = './uploads/support/'.$info->image;
		if(file_exists($image_link)){
			unlink($image_link);
		}
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('support'));
	}
	function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('support'));
    }
    private function _del($id)
    {
        $support = $this->support_model->get_info($id);
        if(!$support)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại ');
            redirect(admin_url('support'));
        }
        //thuc hien xoa san pham
        $this->support_model->deleteOne($id);
        $image_link = './uploads/support/'.$support->image;
		if(file_exists($image_link)){
			unlink($image_link);
		}
    }
}//end class