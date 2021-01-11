<?php 
Class Ads_banner extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ads_banner_model');
		$this->load->model('ads_location_model');
		
	}
	function index(){
		$gid = $this->input->get('location');
		$this->data['gid'] = $gid;
		$input = array();
		$input['where'] = array('ads_location_id'=>$gid);
		$this->load->library('pagination');
		$total_row = $this->ads_banner_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('ads_banner/index');
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
		$input["limit"] = array($config['per_page'], $segment);
		$name = $this->input->get('name');
		if($name){
			$input['like'] = array('name', $name);
		}
		$list = $this->ads_banner_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/ads_banner/index';
		$this->load->view('admin/main',$this->data);
	}
	function add(){
		$gid = $this->input->get('location');
		$this->data['gid'] = $gid;
		if($this->input->post()){
			$this->form_validation->set_rules('image_name','Hình ảnh','required|min_length[2]');
			if($this->form_validation->run()){
				$ads_location_id = $this->input->post('ads_location_id');
				$image_name = $this->input->post('image_name');;
				$url = $this->input->post('url');
				$sort_order = $this->input->post('sort_order');
				//load thư viện uploads ảnh
				$data = array(
					'ads_location_id'=>$gid,
					'image_name' => $image,
					'url'=>$url,
					'sort_order'=>$sort_order,
					'created' => now()
					);
				$this->ads_banner_model->create($data);
				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				redirect(admin_url('ads_banner?location='.$gid));
			}
		}

		$listLocation = $this->ads_location_model->get_list();
		$this->data['listLocation'] = $listLocation;

		$this->data['temp'] = 'admin/ads_banner/add';
		$this->load->view('admin/main',$this->data);
	}
	function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->ads_banner_model->get_info($id);
		$this->data['info'] = $info;
		$gid = $info->ads_location_id;
		$this->data['gid'] = $gid;
		if($this->input->post()){
			$this->form_validation->set_rules('image_name','Hình ảnh','required|min_length[2]');
			if($this->form_validation->run()){
				$ads_location_id = $this->input->post('ads_location_id');
				$image_name = $this->input->post('image_name');;
				$url = $this->input->post('url');
				$sort_order = $this->input->post('sort_order');
				//load thư viện uploads ảnh
				$data = array(
					'ads_location_id'=>$ads_location_id,
					'image_name' => $image,
					'url'=>$url,
					'sort_order'=>$sort_order
					);
				$this->ads_banner_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('ads_banner?location='.$info->ads_location_id));
		}
	}
		$listLocation = $this->ads_location_model->get_list();
		$this->data['listLocation'] = $listLocation;

		$this->data['temp'] = 'admin/ads_banner/edit';
		$this->load->view('admin/main',$this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->ads_banner_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại quảng cáo này');
			redirect(admin_url('ads_banner?location='.$info->ads_location_id));
		}
		$this->ads_banner_model->deleteOne($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('ads_banner?location='.$info->ads_location_id));
	}
	function delete_all()
    {
    	$gid = $this->input->get('location');
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('ads_banner?location='.$gid));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $partner = $this->ads_banner_model->get_info($id);
        if(!$partner)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại ');
            redirect(admin_url('ads_banner'));
        }
        //thuc hien xoa san pham
        $this->ads_banner_model->deleteOne($id);
    }
}//end class