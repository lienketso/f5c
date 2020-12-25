<?php
Class Countries extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('countries_model');
	}
	function index(){
		$this->load->library('pagination');
		$input = array();
		$total_row = $this->countries_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = admin_url('countries/index');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows']  = $total_row;
		$config['per_page']    = 20;
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
		$input["limit"] = array($config['per_page'], $segment);
		$name = $this->input->get('name');
		if($name){
			$input['like'] = array('name', $name);
		}
		$input['order'] = ['name','asc'];
		$list = $this->countries_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/countries/index';
		$this->load->view('admin/main', $this->data);
	}
	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên hãng','required|min_length[2]');
			if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$name = $this->input->post('name');

				$data = array(
					'name'=> $name
				);
				if($this->countries_model->create($data)){
					// tạo nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				}
				else{
					$this->session->set_flashdata('message', 'Lỗi dữ liệu, không thêm được !');
				}
				//chuyển sang trang danh sách admin
				redirect(admin_url('countries'));
			}
		}
		$this->data['temp'] = 'admin/countries/add';
		$this->load->view('admin/main', $this->data);
	}
	function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->countries_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('countries'));
		}
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên thành phố','required|min_length[2]');
			if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$name = $this->input->post('name');
				$data = array(
					'name'=> $name
				);

				if($this->countries_model->update($id, $data)){
					// tạo nội dung thông báo
					$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				}
				else{
					$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				}
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('countries'));
			}
		}
		$this->data['temp'] = 'admin/countries/edit';
		$this->load->view('admin/main', $this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->countries_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('countries'));
		}
		$this->data['info'] = $info;

		$this->countries_model->deleteOne($id);
		$this->session->set_flashdata('message','Xóa thành công ! ');
		redirect(admin_url('countries'));
	}
	function delete_all()
	{
		$ids = $this->input->post('id[]');
		foreach ($ids as $id)
		{
			$this->_del($id);
		}
		$this->session->set_flashdata('message','Xóa tùy chọn thành công');
		redirect(admin_url('countries'));
	}
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
    	$category = $this->countries_model->get_info($id);
    	if(!$category)
    	{
            //tạo ra nội dung thông báo
    		$this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
    		redirect(admin_url('countries'));
    	}
        //thuc hien xoa san pham
    	$this->countries_model->deleteOne($id);
    }
}//end classs