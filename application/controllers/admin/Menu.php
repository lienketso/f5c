<?php
Class Menu extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('menu_model');
	}
	function index(){
		$this->language = language_current();
		$this->load->model('catnews_model');
		$this->load->model('category_model');
		//lấy ra all catnews
		$ip['where'] = ['lang_code'=>$this->language];
		$ip['order'] = ['is_order','asc'];
		$listCate = $this->catnews_model->get_list($ip);
		$this->data['listCate'] = $listCate;
		$this->load->library('pagination');
		$input = array();
		//điều kiện ngôn ngữ
		$input['where'] = array('lang_code'=>$this->language);
		$total_row = $this->menu_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('menu/index');
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
		$list = $this->menu_model->get_list($input);
		$this->data['list'] = $list;
		//nếu có cập nhật
		if($this->input->post()){
			$btnOnclick = $this->input->post('btnOnclick');
			//Lưu lại 
			if($btnOnclick=='save'){
			foreach($list as $row){
				$is_order = $this->input->post('is_order_'.$row->id);
				$parent = $this->input->post('parent_'.$row->id);
				$datas = [
					'is_order'=>$is_order,
					'parent'=>$parent
				];
				$this->menu_model->update($row->id,$datas);
			}
			$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công !');
			redirect(admin_url('menu'));
			}
			//Xóa tùy chọn
			if($btnOnclick=='delete'){
				$ids = $this->input->post('id[]');
        		foreach ($ids as $id)
        		{
            	$this->_del($id);
        		}
        		$this->session->set_flashdata('message','Xóa tùy chọn thành công');
        		redirect(admin_url('menu'));
			}
		}
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/menu/index';
		$this->load->view('admin/main', $this->data);
	}
	function add(){
			if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề menu','required|min_length[2]');
			if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$name = $this->input->post('name');
				$parent = $this->input->post('parent');
				$menu_type = $this->input->post('menu_type');
				$slug = $this->input->post('slug');
				$is_order = $this->input->post('is_order');
				$link = $this->input->post('link');
				$display = $this->input->post('display');
				$is_online = $this->input->post('is_online');
				$data = array(
					'name'=> $name,
					'menu_type'=>$menu_type,
					'parent'=> $parent,
					'slug'=>$slug,
					'is_order' => $is_order,
					'link' => $link,
					'lang_code'=>$this->language,
					'is_online'=>$is_online,
					'display'=>0
					);
				if($this->menu_model->create($data)){
					// tạo nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				}
				else{
					$this->session->set_flashdata('message', 'Lỗi dữ liệu, không thêm được !');
				}
				//chuyển sang trang danh sách admin
				redirect(admin_url('menu'));
			}
		}
		//Load model
		$this->load->model('catnews_model');
		$this->load->model('news_model');
		$this->load->model('category_model');
		//danh mục tin
		$input['where'] = ['status'=>1,'cat_type'=>'news','lang_code'=>$this->language];
		$listCatnews = $this->catnews_model->get_list($input);
		$this->data['listCatnews'] = $listCatnews;
		//danh mục bán
		$inputc['where'] = ['status'=>1,'lang_code'=>$this->language];
		$inputc['order'] = ['is_order','asc'];
		$listCategory = $this->category_model->get_list($inputc);
		$this->data['listCategory'] = $listCategory;
		//danh sách trang tin
		$ips['where'] = ['lang_code'=>$this->language,'type'=>'page'];
		$listPage = $this->news_model->get_list($ips);
		$this->data['listPage'] = $listPage;
		$this->data['temp'] = 'admin/menu/add';
		$this->load->view('admin/main', $this->data);
	}
	function edit(){
		$this->load->model('category_model');
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$menu = $this->menu_model->get_info($id);
		if(!$menu){
			redirect(admin_url('menu'));
		}
		$this->data['menu'] = $menu;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề menu','required');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$parent = $this->input->post('parent');
				$slug = $this->input->post('slug');
				$menu_type = $this->input->post('menu_type');
				$is_order = $this->input->post('is_order');
				$link = $this->input->post('link');
				$display = $this->input->post('display');
				$is_online = $this->input->post('is_online');
				$data = array(
					'name'=>$name,
					'menu_type'=>$menu_type,
					'parent'=>$parent,
					'slug'=>$slug,
					'is_order'=>$is_order,
					'link'=>$link,
					'is_online'=>$is_online,
					'display'=>0
					);
				$this->menu_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				redirect(admin_url('menu'));
			}
		}
		//load model
		$this->load->model('catnews_model');
		$this->load->model('news_model');
		$ips['where'] = ['lang_code'=>$this->language,'type'=>'page'];
		$listPage = $this->news_model->get_list($ips);
		$this->data['listPage'] = $listPage;
		$input['where'] = ['status'=>1,'lang_code'=>$this->language];
		$listCatnews = $this->catnews_model->get_list($input);
		$this->data['listCatnews'] = $listCatnews;
		//danh mục bán
		$inputc['where'] = ['status'=>1,'type'=>'ban','lang_code'=>$this->language];
		$inputc['order'] = ['is_order','asc'];
		$listCategory = $this->category_model->get_list($inputc);

		$this->data['listCategory'] = $listCategory;
		$this->data['temp'] = 'admin/menu/edit';
		$this->load->view('admin/main',$this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$menu = $this->menu_model->get_info($id);
		if(!$menu){
			redirect(admin_url('menu'));
		}
		$this->menu_model->deleteOne($id);
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
		redirect(admin_url('menu'));
	}
	function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('menu'));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $menu = $this->menu_model->get_info($id);
        if(!$menu)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
            redirect(admin_url('menu'));
        }
        //thuc hien xoa san pham
        $this->menu_model->deleteOne($id);
    }
}//end class