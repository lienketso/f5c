<?php
Class Catnews extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('catnews_model');
		$this->load->model('catmeta_model');
	}
	function index(){
		$this->load->library('pagination');

		$input = array();
		$input['where'] = array('parent_id'=>0);
		$total_row = $this->catnews_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = admin_url('catnews/index');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
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
		$list = $this->catnews_model->get_list($input);
		$this->data['list'] = $list;
		//nếu có cập nhật
		if($this->input->post()){
			$btnOnclick = $this->input->post('btnOnclick');
			//Lưu lại 
			if($btnOnclick=='save'){
			foreach($list as $row){
				$is_order = $this->input->post('is_order_'.$row->id);
				$datas = [
					'sort_order'=>$is_order
				];
				$this->catnews_model->update($row->id,$datas);
			}
			$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công !');
			redirect(admin_url('catnews'));
			}
		}
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/catnews/index';
		$this->load->view('admin/main', $this->data);
	}
	//kiểm tra callback username
	function check_title(){
		$action = $this->uri->rsegment(2);
		$cat_name = $this->input->post('friendly_url');
		$where = array('friendly_url'=> $cat_name);
		$check = true;
		if($action == 'edit'){
			$info = $this->data['info'];
			if($info->cat_name == $cat_name){
				$check = false;
			}
		}
		if($check && $this->catnews_model->check_exits($where)){
			//trả về thông báo lỗi
			$this->form_validation->set_message(__FUNCTION__,'Danh mục đã tồn tại !');
			return false;
		}
		else{
			return true;
		}
	}
	function add(){
		$type = $this->input->get('cat_type');
		$this->data['type'] = $type;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên danh mục','required|min_length[2]');
			$this->form_validation->set_rules('friendly_url','Đường dẫn','required|min_length[2]|callback_check_title');
				if($this->form_validation->run()){
					$name = $this->input->post('name');
					$friendly_url = $this->input->post('friendly_url');
					$friendly_url = slug($friendly_url);
					if($friendly_url==''){
					$friendly_url = slug($name);
					}
					$parent_id = $this->input->post('parent_id');
					if(!isset($parent_id) && $parent_id==''){
						$parent = 0;
					}
					$info = $this->input->post('info');
					$sort_order = $this->input->post('sort_order');
					if($sort_order==''){$sort_order=0;}
					$image_name = $this->input->post('image_name');
					$site_title = $this->input->post('site_title');
					$meta_desc = $this->input->post('meta_desc');
					$meta_key = $this->input->post('meta_key');
				//load thư viện uploads ảnh
				// $this->load->library('upload_library');
				// $upload_path = './uploads/catnews';
				// $upload_data = $this->upload_library->upload($upload_path, 'image');
				// if(isset($upload_data['file_name'])){
				// 	$image_link = $upload_data['file_name'];
				// }
				$data = array(
					'name' => $name,
					'friendly_url' => $friendly_url,
					'parent_id' => $parent_id,
					'info' => $info,
					'image_name' =>$image_name,
					'sort_order' => $sort_order,
					'site_title'=>$site_title,
					'meta_desc'=>$meta_desc,
					'meta_key'=>$meta_key
				);
				if($this->catnews_model->create($data)){
					// tạo nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				}
				else{
					$this->session->set_flashdata('message', 'Lỗi dữ liệu, không thêm được !');
				}
				//chuyển sang trang danh sách admin
				redirect(admin_url('catnews'));
			}
			}
		$this->data['temp'] = 'admin/catnews/add';
		$this->load->view('admin/main', $this->data);
}
	function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->catnews_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại danh mục này');
			redirect(admin_url('catnews'));
		}
		$this->data['info'] = $info;
		//nếu post thì sửa
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên danh mục','required');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$cat_name = $this->input->post('friendly_url');
				$cat_name = slug($cat_name);
				if($cat_name==''){
				$cat_name = slug($name);
				}
				$parent = $this->input->get('parent_id');
				if(!isset($parent) && $parent==''){
						$parent = 0;
					}
				$description = $this->input->post('info');
				$sort_order = $this->input->post('sort_order');
				$image_name = $this->input->post('image_name');
				$site_title = $this->input->post('site_title');
				$meta_desc = $this->input->post('meta_desc');
				$meta_key = $this->input->post('meta_key');

				$data = array(
					'name'=>$name,
					'friendly_url'=>$cat_name,
					'parent_id' => $parent,
					'info' => $description,
					'sort_order' => $sort_order,
					'image_name'=>$image_name,
					'site_title'=>$site_title,
					'meta_desc' => $meta_desc,
					'meta_key'=>$meta_key
					);
				//insert cat meta
					$this->catnews_model->update($id,$data);
					//pre($meta);die;
					$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				redirect(admin_url('catnews'));
			}
		}
		//lấy ra danh mục cha
		$input = array();
		$input['where'] = array('parent_id'=>0);
		$list = $this->catnews_model->get_list($input);
		foreach ($list as $row) {
			$input2['where'] = array('parent_id'=>$row->id);
			$subs =$this->catnews_model->get_list($input2);
			$row->subs = $subs;
		}
		$this->data['list'] = $list;
		$this->data['temp'] = 'admin/catnews/edit';
		$this->load->view('admin/main', $this->data);
	}
	function del(){

		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->catnews_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại danh mục này');
			redirect(admin_url('catnews'));
		}
		//kiểm tra xem danh mục có tin không mới cho xóa
		$this->load->model('news_model');
		$news = $this->news_model->get_info_rule(array('cat_id'=>$id), 'id'); //lấy ra sản phẩm có category_id 
		if($news){
		$this->session->set_flashdata('message','Danh mục có chứa bài viết, bạn phải xóa bài viết trước khi xóa danh mục ! ');
		redirect(admin_url('catnews'));
		}
		$this->catnews_model->deleteOne($id);
		//delete catmeta table
		$rule = 'cat_id='.$id;
		$this->catmeta_model->delete_rule($rule);
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
		//chuyển sang trang danh sách danh mục
		redirect(admin_url('catnews'));
	}
	function delete_all()
    {
    	$type = $this->input->get('cat_type');
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('catnews?cat_type='.$type));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
    	$type = $this->input->get('cat_type');
        $catnews = $this->catnews_model->get_info($id);
        if(!$catnews)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại dữ liệu này');
            redirect(admin_url('catnews?cat_type='.$type));
        }
        //thuc hien xoa san pham
        $this->catnews_model->deleteOne($id);
        $rule = 'cat_id='.$id;
        $this->catmeta_model->delete_rule($rule);
    }
}//end class