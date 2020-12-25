<?php
Class Comment extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('comment_model');
	}
	function index(){
		$this->load->library('pagination');
		$total_row = $this->comment_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('comment/index');
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
			$input['like'] = array('content', $name);
		}
		$list = $this->comment_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/comment/index';
		$this->load->view('admin/main',$this->data);
	}
	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('name','Họ và tên','required|min_length[6]');
			$this->form_validation->set_rules('content','Thông tin comment','required|min_length[20]');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$content = $this->input->post('content');
				$text_label = $this->input->post('text_label');
				$image = $this->input->post('image');
				$status = $this->input->post('status');
				//load thư viện uploads ảnh
				$data = array(
					'name' => $name,
					'text_label'=>$text_label,
					'image' => $image,
					'content' => $content,
					'status' => $status
					);
				$this->comment_model->create($data);
				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				redirect(admin_url('comment'));
			}
		}
		$this->data['temp'] = 'admin/comment/add';
		$this->load->view('admin/main',$this->data);
	}
	function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->comment_model->get_info($id);
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('content','Nội dung comment','required|min_length[2]');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$content = $this->input->post('content');
				$text_label = $this->input->post('text_label');
				$image = $this->input->post('image');
				$status = $this->input->post('status');
				$data = array(
					'name' => $name,
					'text_label'=>$text_label,
					'image' => $image,
					'content' => $content,
					'status' => $status
					);
	
				$this->comment_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('comment'));
		}
	}
		$this->data['temp'] = 'admin/comment/edit';
		$this->load->view('admin/main',$this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->comment_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại đối tác này');
			redirect(admin_url('comment'));
		}
		$this->comment_model->deleteOne($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('comment'));
	}
	function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('comment'));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $partner = $this->comment_model->get_info($id);
        if(!$partner)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại ');
            redirect(admin_url('comment'));
        }
        //thuc hien xoa san pham
        $this->comment_model->deleteOne($id);
    }
}//end class