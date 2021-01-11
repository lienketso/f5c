<?php 
Class Transaction extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('transaction_model');
		$this->load->model('product_order_model');
	}
	function index(){
		//lấy ra tổng số đơn hàng để phân trang
		$this->load->library('pagination');
		$input['where'] = [];
		$name = '';
		$startdate = '';
		$enddate = '';
		//nếu có search
		if($this->input->get()){
			$name = $this->input->get('name');
			$start = $this->input->get('start');
			$end = $this->input->get('end');
			$startdate = input_format_date($start);
			$enddate = input_format_date($end);
			if($name){
			$input['like'] = ['name',$name];
			}
			if($start || $enddate){
			$input['where'] = " created BETWEEN CAST('".$startdate."' AS DATE) AND CAST('".$enddate."' AS DATE)";	
			}
		}
		$this->data['name'] = $name;
		$this->data['startdate'] = $startdate;
		$this->data['enddate'] = $enddate;
		//lấy ra tổng tất cả các sản phẩm
		$total_row = $this->transaction_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = admin_url('transaction/index');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
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
		$input["limit"] = array($config['per_page'], $segment);
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$list = $this->transaction_model->get_list($input);
		$this->data['list'] = $list;
		$this->data['temp'] = 'admin/transaction/index';
		$this->load->view('admin/main',$this->data);
	}
	function view(){
		$this->load->model('city_model');
		$this->load->model('district_model');

		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->transaction_model->get_info($id);
		$this->data['info'] = $info;
		$this->load->model('product_model');
		$input = array();
		$input['where'] = array('tran_id'=>$info->id);
		$listorder = $this->product_order_model->get_list($input);
		$this->data['listorder'] = $listorder;
		$this->data['temp'] = 'admin/transaction/view';
		$this->load->view('admin/main',$this->data);
	}
	function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->transaction_model->get_info($id);
		$this->data['info'] = $info;
		if($this->input->post()){
			$status = $this->input->post('status');
			$data = array(
			'status'=>$status
			);
			$this->transaction_model->update($id,$data);
			$this->session->set_flashdata('message','Cập nhật dữ liệu thành công !');
			redirect(admin_url('transaction/index'));
			}
		$this->data['temp'] = 'admin/transaction/edit';
		$this->load->view('admin/main',$this->data);
		}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->transaction_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại slide này');
			redirect(admin_url('slide'));
		}
		$this->transaction_model->deleteOne($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('transaction'));
	}
	function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('transaction'));
    }
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $slide = $this->transaction_model->get_info($id);
        if(!$slide)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
            redirect(admin_url('transaction'));
        }
        //thuc hien xoa san pham
        $this->transaction_model->deleteOne($id);
    }
}