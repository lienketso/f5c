<?php
Class Manufac extends MY_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('manufac_model');
		$this->load->model('category_model');
	}

	function index(){
		$this->load->library('pagination');

		$input = array();
		$input['where'] = array('lang_code'=>$this->language);
		$total_row = $this->manufac_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = admin_url('manufac/index');
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
		$input['order'] = ['name','asc'];
		$input["limit"] = array($config['per_page'], $segment);
		//search 

		$title = $this->input->get('title');
		if($title){
			$input['like'] = array('title',$title);
		}else{
			$title = '';
		}
		$this->data['title'] = $title;
		//end search
		$list = $this->manufac_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/manufac/index';
		$this->load->view('admin/main',$this->data);
	}

	function add(){

		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên hãng','required|min_length[2]');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$friendly_url = slug($name);
				$info = $this->input->post('info');
				$image_name = $this->input->post('image_name');
				$meta_desc = $this->input->post('meta_desc');
				$meta_key = $this->input->post('meta_key');
				$site_title = $this->input->post('site_title');
				$sort_order = $this->input->post('sort_order');
				$show_home = $this->input->post('show_home');
				$is_menu = $this->input->post('is_menu');
				$data = array(
					'name' => $name,
					'friendly_url' => $friendly_url,
					'info'=>$info,
					'image_name' => $image_name,
					'sort_order' => $sort_order,
					'show_home' => $show_home,
					'is_menu' => $is_menu,
					'site_title'=>$site_title,
					'meta_desc' => $meta_desc,
					'meta_key'=> $meta_key,
					'lang_code'=>$this->language
				);
				$this->manufac_model->create($data);

				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				redirect(admin_url('manufac'));
			}
		}
		
		$this->data['temp'] = 'admin/manufac/add';
		$this->load->view('admin/main',$this->data);
	}

	function edit(){
		$this->load->model('manufac_cat_model');
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->manufac_model->get_info($id);
		$this->data['info'] = $info;

		$arrCheck = [];
		$ss['where'] = ['manufac_id'=>$id];
		$ss['order'] = ['manufac_id','asc'];
		$category_list = $this->manufac_cat_model->get_list($ss);
		foreach($category_list as $c){
			$arrCheck[] = $c->cat_id;
		}
		$this->data['arrCheck'] = $arrCheck;
		$input['where'] = ['parent_id'=>0];
		$input['order'] = ['name','asc'];
		$allcategory = $this->category_model->get_list($input);
		$this->data['allcategory'] = $allcategory;

		if($this->input->post()){

			$this->form_validation->set_rules('name','Tên hãng','required|min_length[2]');

			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$friendly_url = slug($name);
				$info = $this->input->post('info');
				$image_name = $this->input->post('image_name');
				$meta_desc = $this->input->post('meta_desc');
				$meta_key = $this->input->post('meta_key');
				$site_title = $this->input->post('site_title');
				$sort_order = $this->input->post('sort_order');
				$show_home = $this->input->post('show_home');
				$is_menu = $this->input->post('is_menu');
				$data = array(
					'name' => $name,
					'friendly_url' => $friendly_url,
					'info'=>$info,
					'image_name' => $image_name,
					'sort_order' => $sort_order,
					'show_home' => $show_home,
					'is_menu' => $is_menu,
					'site_title'=>$site_title,
					'meta_desc' => $meta_desc,
					'meta_key'=> $meta_key,
					'lang_code'=>$this->language
				);
				$this->manufac_model->update($id,$data);

					//insert manufac_cat table
					$cat_id = $this->input->post('cat_id');

					if(!empty($cat_id)){
						$where = "manufac_id=".$id;

						$this->manufac_cat_model->delete_rule($where);
						

						$arrCheckCat = [];
						foreach($cat_id as $ca){
							$k['manufac_id'] = $id;
							$k['cat_id'] = $ca;
							$arrCheckCat[] = $k;
						}
						$this->manufac_cat_model->insertBacth($arrCheckCat);
					}
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('manufac'));
			}
		}

		$this->data['temp'] = 'admin/manufac/edit';
		$this->load->view('admin/main',$this->data);
	}

	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->manufac_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại dữ liệu này');
			redirect(admin_url('manufac'));
		}
		$this->manufac_model->deleteOne($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('manufac'));
	}
	function delete_all()
	{
		$type = $this->input->get('type');
		$ids = $this->input->post('id[]');
		foreach ($ids as $id)
		{
			$this->_del($id);
		}
		$this->session->set_flashdata('message','Xóa tùy chọn thành công');
		redirect(admin_url('forum?type='.$type));
	}
/*
*Xoa san pham
*/
private function _del($id)
{
	$type = $this->input->get('type');
	$news = $this->news_model->get_info($id);
	if(!$news)
	{
//tạo ra nội dung thông báo
		$this->session->set_flashdata('message', 'không tồn tại dữ liệu này');
		redirect(admin_url('forum?type='.$type));
	}
//thuc hien xoa bai viet
	$rule = 'news_id='.$id;
	$rule2 = 'post_id='.$id;
	$this->news_catnews_model->delete_rule($rule);
	$this->postmeta_model->delete_rule($rule2);
	$this->news_model->deleteOne($id);
}


}//end class