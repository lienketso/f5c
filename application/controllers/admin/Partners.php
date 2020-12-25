<?php
Class Partners extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('partners_model');
	}
	function index(){
		$this->load->library('pagination');
		$total_row = $this->partners_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('partners/index');
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

		$list = $this->partners_model->get_list($input);
		$this->data['list'] = $list;
		
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/partners/index';
		$this->load->view('admin/main',$this->data);
	}

	function add(){

		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề','required|min_length[6]');
			//$this->form_validation->set_rules('image','Hình ảnh slide','required');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$link = $this->input->post('link');
				$is_order = $this->input->post('is_order');
				$status = $this->input->post('status');
				//load thư viện uploads ảnh
				$this->load->library('upload_library');
				$upload_path = './uploads/partner';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}

				$data = array(
					'name' => $name,
					'image' => $image_link,
					'link' => $link,
					'is_order' => $is_order,
					'status' => $status
					);

				$this->partners_model->create($data);
				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				redirect(admin_url('partners'));
			}
		}

		$this->data['temp'] = 'admin/partners/add';
		$this->load->view('admin/main',$this->data);
	}

	function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->partners_model->get_info($id);
		$this->data['info'] = $info;

		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề','required|min_length[4]');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$link = $this->input->post('link');
				$is_order = $this->input->post('is_order');
				$status = $this->input->post('status');
			
			//lấy tên file ảnh, upload ảnh đại diện
				$this->load->library('upload_library');
				$upload_path = './uploads/partner';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}

				$data = array(
					'name'=>$name,
					'link'=>$link,
					'is_order'=>$is_order,
					'status'=>$status
					);

				if($image_link!=''){
					$data['image'] = $image_link;
				}

				$this->partners_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('partners'));
		}
	}


		$this->data['temp'] = 'admin/partners/edit';
		$this->load->view('admin/main',$this->data);
	}

	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->partners_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại đối tác này');
			redirect(admin_url('partners'));
		}
		$this->partners_model->deleteOne($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('partners'));
	}

	function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('partners'));
    }
    
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $partner = $this->partners_model->get_info($id);
        if(!$partner)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại ');
            redirect(admin_url('partners'));
        }
        //thuc hien xoa san pham
        $this->partners_model->deleteOne($id);
    }

}//end class