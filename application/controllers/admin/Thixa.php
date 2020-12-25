<?php 
Class Thixa extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('thixa_model');
		$this->load->model('district_model');
	}
	function index(){
		$this->load->library('pagination');
		$total_row = $this->thixa_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('thixa/index');
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
		$city_id = $this->input->get('city_id');
		if($name){
			$input['like'] = array('name', $name);
		}
		if($city_id){
			$input['where'] = array('city_id'=>$city_id);
		}
		if($name && $city_id){
			$input['where'] = array('city_id'=>$city_id);
			$input['like'] = array('name',$name);
		}
		$input['order'] = array('name','asc');
		$list = $this->thixa_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->load->model('city_model');
		$listcity = $this->city_model->get_list();
		$this->data['listcity'] = $listcity;
		$this->data['temp'] = 'admin/thixa/index';
		$this->load->view('admin/main', $this->data);
	}
		//kiểm tra callback username
	function check_title(){
		$action = $this->uri->rsegment(2);
		$slug = $this->input->post('slug');
		$where = array('slug'=> $slug);
		$check = true;
		if($action == 'edit'){
			$info = $this->data['info'];
			if($info->slug == $slug){
				$check = false;
			}
		}
		if($check && $this->thixa_model->check_exits($where)){
//trả về thông báo lỗi
			$this->form_validation->set_message(__FUNCTION__,'Xã Phường đã tồn tại !');
			return false;
		}
		else{
			return true;
		}
	}
		function add(){
		$this->load->model('district_model');
		$disid = $this->input->get('district_id');
		$disInfo = $this->district_model->get_info($disid);
		$this->data['disInfo'] =$disInfo;
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề','required|min_length[2]');
			$this->form_validation->set_rules('slug','Dữ liệu','required|callback_check_title');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$slug = slug($name);
				$is_order = $this->input->post('is_order');
				if($is_order==''){$is_order=0;}
				$status = $this->input->post('status');
				$data = array(
					'name' => $name,
					'slug'=>$slug,
					'district_id'=>$disid,
					'is_order'=>$is_order,
					'status' => $status
					);
				$this->thixa_model->create($data);
				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				redirect(admin_url('thixa/add?district_id='.$disid));
			}
		}
		$this->data['temp'] = 'admin/thixa/add';
		$this->load->view('admin/main',$this->data);
	}
		function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->thixa_model->get_info($id);
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên','required|min_length[4]');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$district_id = $this->input->post('district_id');
				$is_order = $this->input->post('is_order');
				if($is_order==''){$is_order=0;}
				$status = $this->input->post('status');
				$data = array(
					'name'=>$name,
					'district_id'=>$district_id,
					'is_order'=>$is_order,
					'status'=>$status
					);
				$this->thixa_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('district'));
		}
	}
		$this->load->model('district_model');
		$listdistrict= $this->district_model->get_list();
		$this->data['listdistrict'] = $listdistrict;
		$districtInfo = $this->district_model->get_info($info->district_id);
		$this->data['districtInfo'] = $districtInfo;
		$this->data['temp'] = 'admin/thixa/edit';
		$this->load->view('admin/main',$this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->thixa_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'không tồn tại địa điểm !');
			redirect(admin_url('thixa'));
		}
		$this->thixa_model->deleteOne($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('thixa'));
	}
	   function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('thixa'));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $level = $this->thixa_model->get_info($id);
        if(!$level)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại địa điểm này');
            redirect(admin_url('thixa'));
        }
        //thuc hien xoa san pham
        $this->thixa_model->deleteOne($id);
    }
}//end class