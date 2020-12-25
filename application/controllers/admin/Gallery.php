<?php 
Class Gallery extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('gallery_model');
		$this->load->model('gallery_group_model');
	}
	function index(){
		$gid = $this->input->get('group');
		$this->data['gid'] = $gid;
		$input = array();
		$input['where'] = array('group_id'=>$gid);
		$this->load->library('pagination');
		$total_row = $this->gallery_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('gallery/index');
		$config['total_rows']  = $total_row;
		$config['per_page']    = 10;
		$config['uri_segment'] = 4;
		$config['next_link']   = "Next page";
		$config['prev_link']   = "Prev page";
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(4);
		$segment = intval($segment);
		$input["limit"] = array($config['per_page'], $segment);
		$name = $this->input->get('name');
		if($name){
			$input['like'] = array('name', $name);
		}
		$list = $this->gallery_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/gallery/index';
		$this->load->view('admin/main',$this->data);
	}
	function add(){
		$gid = $this->input->get('group');
		$this->data['gid'] = $gid;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề','required|min_length[2]');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$group_id = $this->input->post('group_id');
				$image = $this->input->post('image');
				$description = $this->input->post('description');
				$link = $this->input->post('link');
				$display = 1;
				$is_order = $this->input->post('is_order');
				$status = $this->input->post('status');
				//load thư viện uploads ảnh
				$data = array(
					'name' => $name,
					'group_id'=>$gid,
					'image' => $image,
					'description'=>$description,
					'link'=>$link,
					'display'=>1,
					'is_order'=>$is_order,
					'status' => $status
					);
				$this->gallery_model->create($data);
				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				redirect(admin_url('gallery?group='.$gid));
			}
		}
		$this->data['temp'] = 'admin/gallery/add';
		$this->load->view('admin/main',$this->data);
	}
	function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->gallery_model->get_info($id);
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề','required|min_length[2]');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$description = $this->input->post('description');
				$link = $this->input->post('link');
				$display = 1;
				$status = $this->input->post('status');
				$image = $this->input->post('image');
				$is_order = $this->input->post('is_order');	
				$data = array(
					'name'=>$name,
					'description'=>$description,
					'link'=>$link,
					'image'=>$image,
					'display'=>$display,
					'is_order'=>$is_order,
					'status'=>$status
					);
				$this->gallery_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('gallery?group='.$info->group_id));
		}
	}
		$this->data['temp'] = 'admin/gallery/edit';
		$this->load->view('admin/main',$this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->gallery_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại quảng cáo này');
			redirect(admin_url('gallery?group='.$info->group_id));
		}
		$this->gallery_model->deleteOne($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('gallery?group='.$info->group_id));
	}
	function delete_all()
    {
    	$gid = $this->input->get('group');
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('gallery?group='.$gid));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $partner = $this->gallery_model->get_info($id);
        if(!$partner)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại ');
            redirect(admin_url('gallery'));
        }
        //thuc hien xoa san pham
        $this->gallery_model->deleteOne($id);
    }
}//end class