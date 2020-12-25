<?php
Class News extends MY_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('catnews_model');
		$this->load->model('postmeta_model');
		$this->load->model('news_catnews_model');
		$this->load->model('user_model');
	}

	function index(){
		$this->load->library('pagination');
		$input = array();
		$input['where'] = array();
		$total_row = $this->news_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = admin_url('news/index');
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
		//search 
		$cat_id = $this->input->get('cat_id');
		$cat_id = intval($cat_id);
		if($cat_id > 0){
			$input['where'] = ['cat_id'=>$cat_id]; 
		}else{
			$cat_id = 0;
		}
		$this->data['cat_id'] = $cat_id;
		$title = $this->input->get('title');
		if($title){
			$input['like'] = array('title',$title);
		}else{
			$title = '';
		}
		$this->data['title'] = $title;
		//end search
		$list = $this->news_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/news/index';
		$this->load->view('admin/main',$this->data);
	}
//kiểm tra callback username
	function check_title(){
		$action = $this->uri->rsegment(2);
		$slug = $this->input->post('friendly_url');
		$where = array('friendly_url'=> $slug);
		$check = true;
		if($action == 'edit'){
			$info = $this->data['info'];
			if($info->slug == $slug){
				$check = false;
			}
		}
		if($check && $this->news_model->check_exits($where)){
//trả về thông báo lỗi
			$this->form_validation->set_message(__FUNCTION__,'Bài viết đã tồn tại !');
			return false;
		}
		else{
			return true;
		}
	}

	function add(){

		if($this->input->post()){

			$this->form_validation->set_rules('title','Tiêu đề','required|min_length[2]');
			$this->form_validation->set_rules('friendly_url','Tiêu đề','required|min_length[2]|callback_check_title');
			if($this->form_validation->run()){
				$title = $this->input->post('title');
				$cat_id = $this->input->post('cat_id');
				if(!$cat_id){
					$cat_id = 0;
				}
				$slug = $this->input->post('friendly_url');
				$slug = slug($slug);
				if($slug==''){
					$slug = slug($title);
				}
				$description = $this->input->post('intro');
				$content = $this->input->post('content');
				$created = now();
				$image_name = $this->input->post('image_name');
				$site_title = $this->input->post('site_title');
				$meta_key = $this->input->post('meta_key');
				$meta_desc = $this->input->post('meta_desc');

				$data = array(
					'title' => $title,
					'cat_id'=>$cat_id,
					'friendly_url' => $slug,
					'intro' => $description,
					'content' => $content,
					'created' => $created,
					'image_name' => $image_name,
					'site_title'=>$site_title,
					'meta_key' => $meta_key,
					'meta_desc'=> $meta_desc
				);

				$this->news_model->create($data);

				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				redirect(admin_url('news'));
			}
		}
		$this->data['temp'] = 'admin/news/add';
		$this->load->view('admin/main',$this->data);
	}
	
	function edit(){

		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->news_model->get_info($id);
		$this->data['info'] = $info;

		if($this->input->post()){

			$this->form_validation->set_rules('title','Tiêu đề tin','required|min_length[2]');

			if($this->form_validation->run()){
				$title = $this->input->post('title');
				$cat_id = $this->input->post('cat_id');
				if(!$cat_id){
					$cat_id = 0;
				}
				$slug = $this->input->post('friendly_url');
				$slug = slug($slug);
				if($slug==''){
					$slug = slug($title);
				}
				$description = $this->input->post('intro');
				$content = $this->input->post('content');
				$image_name = $this->input->post('image_name');
				$site_title = $this->input->post('site_title');
				$meta_key = $this->input->post('meta_key');
				$meta_desc = $this->input->post('meta_desc');

				$data = array(
					'title' => $title,
					'cat_id'=>$cat_id,
					'friendly_url' => $slug,
					'intro' => $description,
					'content' => $content,
					'image_name' => $image_name,
					'site_title'=>$site_title,
					'meta_key' => $meta_key,
					'meta_desc'=> $meta_desc
				);

				$this->news_model->update($id,$data);
				
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
//chuyển sang trang danh sách danh mục
				redirect(admin_url('news'));
			}
		}

		$this->data['temp'] = 'admin/news/edit';
		$this->load->view('admin/main',$this->data);
	}
	function del(){

		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->news_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại tin tức này');
			redirect(admin_url('news'));
		}

		$this->news_model->deleteOne($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('news'));
	}
	function delete_all()
	{
		$ids = $this->input->post('id[]');
		foreach ($ids as $id)
		{
			$this->_del($id);
		}
		$this->session->set_flashdata('message','Xóa tùy chọn thành công');
		redirect(admin_url('news'));
	}
/*
*Xoa san pham
*/
private function _del($id)
{
	$news = $this->news_model->get_info($id);
	if(!$news)
	{
//tạo ra nội dung thông báo
		$this->session->set_flashdata('message', 'không tồn tại dữ liệu này');
		redirect(admin_url('news'));
	}
	$this->news_model->deleteOne($id);
}
}//end class