<?php 
Class Contact extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('contact_model');
	}
	function index(){
		$this->load->library('pagination');
		$total_row = $this->contact_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('contact/index');
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
		if($name){
			$input['like'] = array('name', $name);
		}
		$list = $this->contact_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/contact/index';
		$this->load->view('admin/main',$this->data);
	}
	function view(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$contact = $this->contact_model->get_info($id);
		$this->data['contact'] = $contact;
		$data = array(
				'status'=>1
				);
		$this->contact_model->update($id,$data);

		$this->data['temp'] = 'admin/contact/view';
		$this->load->view('admin/main',$this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$contact = $this->contact_model->get_info($id);
		if(!$contact){
			$this->session->set_flashdata('message', 'Không tồn tại tin nhắn !');
			redirect(admin_url('contact'));
		}
		$this->contact_model->deleteOne($id);
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
		redirect(admin_url('contact'));
	}
	function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('contact'));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $contact = $this->contact_model->get_info($id);
        if(!$contact)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
            redirect(admin_url('contact'));
        }
        //thuc hien xoa san pham
        $this->contact_model->deleteOne($id);
    }
}//end class