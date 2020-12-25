<?php 
Class Gallery_group extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('gallery_group_model');
	}
	function index(){
		$this->load->library('pagination');
		$total_row = $this->gallery_group_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('gallery_group/index');
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
		$list = $this->gallery_group_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/gallery_group/index';
		$this->load->view('admin/main',$this->data);
	}
	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề','required|min_length[2]');
			//$this->form_validation->set_rules('image','Hình ảnh slide','required');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$display = $this->input->post('display');
				$status = $this->input->post('status');
	
				$data = array(
					'name' => $name,
					'display' => $display,
					'status' => $status
					);
				$this->gallery_group_model->create($data);
				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				redirect(admin_url('gallery_group'));
			}
		}
		$this->data['temp'] = 'admin/gallery_group/add';
		$this->load->view('admin/main',$this->data);
	}
	function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->gallery_group_model->get_info($id);
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề','required|min_length[2]');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$display = $this->input->post('display');
				$status = $this->input->post('status');
			//lấy tên file ảnh, upload ảnh đại diện
				
				$data = array(
					'name'=>$name,
					'display'=>$display,
					'status'=>$status
					);
				$this->gallery_group_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('gallery_group'));
		}
	}
		$this->data['temp'] = 'admin/gallery_group/edit';
		$this->load->view('admin/main',$this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->gallery_group_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại quảng cáo này');
			redirect(admin_url('gallery_group'));
		}
		$this->gallery_group_model->deleteOne($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('gallery_group'));
	}
	function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('gallery_group'));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $partner = $this->gallery_group_model->get_info($id);
        if(!$partner)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại ');
            redirect(admin_url('gallery_group'));
        }
        //thuc hien xoa san pham
        $this->gallery_group_model->deleteOne($id);
    }

    function status(){
    	$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->gallery_group_model->get_info($id);

		if($info->status==1){
			$data = ['status'=>0];
			$this->gallery_group_model->update($id,$data);
		}elseif ($info->status==0) {
			$data = ['status'=>1];
			$this->gallery_group_model->update($id,$data);
		}
		 $this->session->set_flashdata('message', 'Cập nhật trạng thái thành công !');
           redirect(admin_url('gallery_group'));
    }

}//end class