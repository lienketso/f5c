<?php 
class Setting extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('setting_model');
	}
	function index(){
		$id = 1;
		$setting = $this->setting_model->get_info($id);
		$this->data['setting'] = $setting;
		if($this->input->post()){
			$this->form_validation->set_rules('title','Tiêu đề website','required|min_length[6]');
			if($this->form_validation->run()){
				$title = $this->input->post('title');
				$phone = $this->input->post('phone');
				$phone_2 = $this->input->post('phone_2');
				$address = $this->input->post('address');
				$email = $this->input->post('email');
				$meta_desc = $this->input->post('meta_desc');
				$meta_keyword = $this->input->post('meta_keyword');
				$footer = $this->input->post('footer');
				$footer_2 = $this->input->post('footer_2');
				$google_map = $this->input->post('google_map');
				$iframe_about = $this->input->post('iframe_about');
				$fanpage = $this->input->post('fanpage');
				$youtube = $this->input->post('youtube');
				$blogspost = $this->input->post('blogspost');
				//lấy tên file ảnh, upload ảnh đại diện
				$this->load->library('upload_library');
				$upload_path = './uploads/logo';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$upload_data_2 = $this->upload_library->upload($upload_path, 'background');
				if(isset($upload_data_2['file_name'])){
					$image_link_2 = $upload_data_2['file_name'];
				}
				$data = array(
					'title'=>$title,
					'phone'=>$phone,
					'phone_2'=>$phone_2,
					'address'=>$address,
					'email'=>$email,
					'meta_desc'=>$meta_desc,
					'meta_keyword'=>$meta_keyword,
					'footer'=>$footer,
					'footer_2'=>$footer_2,
					'google_map'=>$google_map,
					'iframe_about'=>$iframe_about,
					'fanpage'=>$fanpage,
					'youtube'=>$youtube,
					'blogspost'=>$blogspost
					);
				if($image_link!=''){
					$data['image'] = $image_link;
				}
				if($image_link_2!=''){
					$data['background'] = $image_link_2;
				}
				$this->setting_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa cấu hình thành công !');
				redirect(admin_url('setting'));
			}
		}
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/setting/index';
		$this->load->view('admin/main',$this->data);
	}
}