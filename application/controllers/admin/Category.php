<?php
Class Category extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('category_meta_model');
	}
	function index(){

		$this->load->library('pagination');
		$input = array();
		$input['where'] = array('parent_id'=>0);
		$total_row = $this->category_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('category/index');
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
		$input['order'] = ['sort_order','asc'];
		$input["limit"] = array($config['per_page'], $segment);
		$name = $this->input->get('name');
		if($name){
			$input['like'] = array('name', $name);
		}
		$list = $this->category_model->get_list($input);
		$this->data['list'] = $list;
			//nếu có cập nhật
		if($this->input->post()){
			$btnOnclick = $this->input->post('btnOnclick');
			//Lưu lại 
			if($btnOnclick=='save'){
			foreach($list as $row){
				$is_order = $this->input->post('is_order_'.$row->id);
				$datas = [
					'is_order'=>$is_order
				];
				$this->category_model->update($row->id,$datas);
			}
			$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công !');
			redirect(admin_url('category'));
			}
			//Xóa tùy chọn
			if($btnOnclick=='delete'){
				$ids = $this->input->post('id[]');
        		foreach ($ids as $id)
        		{
            	$this->_del($id);
        		}
        		$this->session->set_flashdata('message','Xóa tùy chọn thành công');
        		redirect(admin_url('category'));
			}
		}
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$alert = $this->session->flashdata('alert');
		$this->data['message'] = $message;
		$this->data['alert'] = $alert;
		$this->data['temp'] = 'admin/category/index';
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
		if($check && $this->category_model->check_exits($where)){
			//trả về thông báo lỗi
			$this->form_validation->set_message(__FUNCTION__,'Danh mục đã tồn tại !');
			return false;
		}
		else{
			return true;
		}
	}
	function add(){
		$cat_parent_id = $this->uri->rsegment(3);
		$this->data['cat_parent_id'] = $cat_parent_id;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề danh  mục','required|min_length[2]');
			$this->form_validation->set_rules('friendly_url','Đường dẫn tĩnh','required|min_length[2]');
				if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$name = $this->input->post('name');
				$sort_order = $this->input->post('sort_order');
				if($sort_order==""){$sort_order=99;}
				$friendly_url = $this->input->post('friendly_url');
				$friendly_url = slug($friendly_url);
				if($friendly_url==''){
				$friendly_url = slug($name);
				}
				if($cat_parent_id && $cat_parent_id!=0){
					$parent_id = $cat_parent_id;
				}else{
					$parent_id = $this->input->post('parent_id');
				}
				
				$info = $this->input->post('info');
				$status = $this->input->post('status');
				$image_name = $this->input->post('image_name');
				//$image_1 = $this->input->post('image_1');
				$show_home = $this->input->post('show_home');
				$meta_desc = $this->input->post('meta_desc');
				$meta_key = $this->input->post('meta_key');
				$site_title = $this->input->post('site_title');
				$data = array(
					'name'=> $name,
					'parent_id'=> $parent_id,
					'friendly_url' => $friendly_url,
					'info' => $info,
					'sort_order' => intval($sort_order),
					'status' => $status,
					'image_name'=>$image_name,
					'show_home'=>$show_home,
					'site_title'=>$site_title,
					'meta_desc'=>$meta_desc,
					'meta_key'=>$meta_key
					);
					$this->category_model->create($data);
	// tạo nội dung thông báo
	$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
		//chuyển sang trang danh sách admin
		redirect(admin_url('category'));
	}
		}
		$this->data['temp'] = 'admin/category/add';
		$this->load->view('admin/main', $this->data);
	}
	function edit(){
		$category_id = $this->uri->rsegment(3);
		$category_id = intval($category_id);
		$info = $this->category_model->get_info($category_id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại danh mục này');
			redirect(admin_url('category'));
		}
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề danh  mục','required|min_length[2]');
				if($this->form_validation->run()){
				$name = $this->input->post('name');
				$sort_order = $this->input->post('sort_order');
				if($sort_order==""){$sort_order=99;}
				$friendly_url = $this->input->post('friendly_url');
				$friendly_url = slug($friendly_url);
				if($friendly_url==''){
				$friendly_url = slug($name);
				}
				$parent_id = $this->input->post('parent_id');
				$info = $this->input->post('info');
				$status = $this->input->post('status');
				$image_name = $this->input->post('image_name');
				//$image_1 = $this->input->post('image_1');
				$show_home = $this->input->post('show_home');
				$meta_desc = $this->input->post('meta_desc');
				$meta_key = $this->input->post('meta_key');
				$site_title = $this->input->post('site_title');
				$data = array(
					'name'=> $name,
					'parent_id'=> $parent_id,
					'friendly_url' => $friendly_url,
					'info' => $info,
					'sort_order' => intval($sort_order),
					'status' => $status,
					'image_name'=>$image_name,
					'show_home'=>$show_home,
					'site_title'=>$site_title,
					'meta_desc'=>$meta_desc,
					'meta_key'=>$meta_key
					);
			//update category
			$this->category_model->update($category_id, $data);
			$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
			//chuyển sang trang danh sách danh mục
			redirect(admin_url('category'));
			}
		}
		$this->data['temp'] = 'admin/category/edit';
		$this->load->view('admin/main', $this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->category_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại danh mục này');
			redirect(admin_url('category'));
		}
		$this->data['info'] = $info;
		//kiểm tra xem danh mục có sản phẩm không mới cho xóa
		$rule = "category_id=".$id;
		$this->category_meta_model->delete_rule($rule);
		$this->category_model->deleteOne($id);
			$this->session->set_flashdata('message','Xóa danh mục thành công ! ');
			redirect(admin_url('category'));
	}
	function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('category'));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $category = $this->category_model->get_info($id);
        if(!$category)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
            redirect(admin_url('category'));
        }
        //thuc hien xoa san pham
        $rule = "category_id=".$id;
		$this->category_meta_model->delete_rule($rule);
        $this->category_model->deleteOne($id);
    }
}//end classs