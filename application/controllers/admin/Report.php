<?php 
Class Report extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('useragent_model');
	}
	function index(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;


		$input = array();

		$this->load->library('pagination');
		$total_row = $this->useragent_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('report/index');
		$config['total_rows']  = $total_row;
		$config['per_page']    = 10;
		$config['uri_segment'] = 4;
		$config['next_link']   = "Next page";
		$config['prev_link']   = "Prev page";
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(4);
		$segment = intval($segment);
		
		$input["limit"] = array($config['per_page'], $segment);
		
		$list = $this->useragent_model->get_list($input);
		$this->data['list'] = $list;

		$this->data['temp'] = 'admin/reports/index';
		$this->load->view('admin/main',$this->data);
	}

		function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->useragent_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại quảng cáo này');
			redirect(admin_url('report'));
		}
		$this->useragent_model->deleteOne($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('report'));
	}
	function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('report'));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $partner = $this->useragent_model->get_info($id);
        if(!$partner)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại ');
            redirect(admin_url('report'));
        }
        //thuc hien xoa san pham
        $this->useragent_model->deleteOne($id);
    }

}	