<?php
Class Support extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('support_model');
	}
	function index(){
		$this->load->library('pagination');
		$total_row = $this->support_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('support/index');
		$config['total_rows']  = $total_row;
		$config['per_page']    = 10;
		$config['uri_segment'] = 4;
		$config['next_link']   = "Next page";
		$config['prev_link']   = "Prev page";
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
			$this->form_validation->set_rules('name','Tên khóa học','required|min_length[2]');
			if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$name = $this->input->post('name');
				$status = $this->input->post('status');
				//load thư viện uploads ảnh
				$this->load->library('upload_library');
				$upload_path = './uploads/support';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$data = array(
					'name'=> $name,
					'status'=>$status
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
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$status = $this->input->post('status');
				//lấy tên file ảnh, upload ảnh đại diện
				$this->load->library('upload_library');
				$upload_path = './uploads/support';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$data = array(
					'name'=>$name,
					'status'=>$status
					);
				if($image_link!=''){
					$data['image'] = $image_link;
				}
				$this->support_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('support'));
		}
	}
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