<?php
Class Page extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('page_model');
	}
	function index(){
		$this->load->library('pagination');
		$input = array();
		$input['where'] = array();
		$total_row = $this->page_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('page/index');
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
		$title = $this->input->get('title');
		if($title){
			$input['like'] = array('title', $title);
		}
		$list = $this->page_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/page/index';
		$this->load->view('admin/main',$this->data);
	}
	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('title','Tiêu đề','required|min_length[6]');
			if($this->form_validation->run()){
				$title = $this->input->post('title');
				$cat_name = $this->input->post('friendly_url');
				$cat_name = slug($title);
				$content = $this->input->post('content');
				$meta_desc = $this->input->post('meta_desc');
				$meta_key = $this->input->post('meta_key');
				//load thư viện uploads ảnh
				$this->load->library('upload_library');
				$upload_path = './uploads/page';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$data = array(
					'title' => $title,
					'friendly_url' => $cat_name,
					'content'=>$content,
					'meta_desc' => $meta_desc,
					'meta_key' => $meta_key,
					'created'=> now()
					);
				$this->page_model->create($data);
				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				redirect(admin_url('page'));
			}
		}
		$this->data['temp'] = 'admin/page/add';
		$this->load->view('admin/main',$this->data);
	}
	function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->page_model->get_info($id);
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('title','Tiêu đề tin','required|min_length[4]');
				if($this->form_validation->run()){
				$title = $this->input->post('title');
				$cat_name = $this->input->post('friendly_url');
				$cat_name = slug($title);
				$content = $this->input->post('content');
				$meta_desc = $this->input->post('meta_desc');
				$meta_key = $this->input->post('meta_key');
				//lấy tên file ảnh, upload ảnh đại diện
				$this->load->library('upload_library');
				$upload_path = './uploads/page';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$data = array(
					'title' => $title,
					'friendly_url' => $cat_name,
					'content'=>$content,
					'meta_desc' => $meta_desc,
					'meta_key' => $meta_key
				);

				$this->page_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('page'));
				}
			}
		$this->data['temp'] = 'admin/page/edit';
		$this->load->view('admin/main',$this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->page_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại tin tức này');
			redirect(admin_url('page'));
		}
		$this->page_model->deleteOne($id);
		//xóa ảnh đã upload trên hệ thống kèm tin tức
		$image_link = './uploads/page/'.$info->image;
		if(file_exists($image_link)){
			unlink($image_link);
		}
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('page'));
	}
	function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('page'));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $news = $this->page_model->get_info($id);
        if(!$news)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại tin tức này');
            redirect(admin_url('page'));
        }
        //thuc hien xoa san pham
        $this->page_model->deleteOne($id);
        //xóa ảnh đã upload trên hệ thống kèm tin tức
		$image_link = './uploads/page/'.$news->image;
		if(file_exists($image_link)){
			unlink($image_link);
		}
    }
}//end class