<?php
Class Member extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}
	function lang($lang=''){
		$language_list = $this->config->item('language_list');
		if(!isset($language_list[$lang])){
			$this->session->set_userdata('language_current','vn');
			redirect(admin_url('home'));
		}else{
			$this->session->set_userdata('language_current', $lang);
			redirect(admin_url('home'));
		}
	}
	// page home admin
	function index(){
		$this->load->library('pagination');
		$total_row = $this->user_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('member/index');
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
		$input['where'] = [];
		$name = $this->input->get('name');
		if($name){
			$input['like'] = array('name', $name);
		}
		$list = $this->user_model->get_list($input);
		$this->data['list'] = $list;
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$alert = $this->session->flashdata('alert');
		$this->data['message'] = $message;
		$this->data['alert'] = $alert;
		$this->data['temp'] = 'admin/member/index';
		$this->load->view('admin/main', $this->data);
	}
	//kiểm tra callback username
	function check_username(){
		$action = $this->uri->rsegment(2);
		$email = $this->input->post('email');
		$where = array('email'=> $email);
		$check = true;
		if($action == 'edit'){
			$info = $this->data['info'];
			if($info->email == $email){
				$check = false;
			}
		}
		if($check && $this->user_model->check_exits($where)){
			//trả về thông báo lỗi
			$this->form_validation->set_message(__FUNCTION__,'Email đã được sử dụng !');
			return false;
		}
		else{
			return true;
		}
	}
	function add(){
	//neu co du lieu post len
		if($this->input->post()){
			$this->form_validation->set_rules('name','Họ và tên','required|min_length[6]');
			$this->form_validation->set_rules('email','Địa chỉ email','required|min_length[4]|callback_check_username');
			$this->form_validation->set_rules('password','Mật khẩu','required|min_length[4]');
			$this->form_validation->set_rules('repassword','Nhâp lại mật khẩu','matches[password]');
			if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');
				$status = $this->input->post('status');
				$data = array(
					'name'=> $name,
					'email' => $username,
					'password' => md5($password),
					'address' => $address,
					'phone' => $phone,
					'status'=>$status
				);

				if($this->user_model->create($data)){
					// tạo nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				}
				else{
					$this->session->set_flashdata('message', 'Lỗi dữ liệu, không thêm được !');
				}
				//chuyển sang trang danh sách admin
				redirect(admin_url('member'));
			}
		}

		$this->data['temp'] = 'admin/member/add';
		$this->load->view('admin/main', $this->data);
	}
	function edit(){
		//lấy ra id để edit
		$admin_id = $this->uri->rsegment('3');
		$admin_id = intval($admin_id);
		//$cond = "admin_id = '$admin_id'";
		//lấy thông tin quản trị viên
		$info = $this->user_model->get_info($admin_id);
		if(!$info){
			$this->session->set_flashdata('message', 'Không tồn tại tài khoản này !');
			redirect(admin_url('member'));
		}
		$this->data['info'] = $info;
		$info->permission = json_decode($info->permission);
		if($this->input->post()){
			$this->form_validation->set_rules('name','Họ và tên','required|min_length[4]');
		//nếu trường password được nhập
			$password = $this->input->post('password');
			if($password){
				$this->form_validation->set_rules('password','Mật khẩu','required|min_length[4]');
			}
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');
				$status = $this->input->post('status');
				$data = array(
					'name'=> $name,
					'email' => $email,
					'address' => $address,
					'phone' => $phone,
					'status'=>$status
				);
				//nếu tồn tại mật khẩu mới gán mật khẩu
				if($password){
					$data['password'] = md5($password);
				}
				if($this->user_model->update($admin_id,$data)){
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công !');
				}
				else{
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công !');
				}
			//chuyển sang trang danh sách admin
				redirect(admin_url('member'));
			}
		}

		//load view
		$this->data['temp'] = 'admin/member/edit';	
		$this->load->view('admin/main', $this->data);
	}
	function del(){
		$admin_id = $this->uri->rsegment('3');
		$admin_id = intval($admin_id);
		//lấy thông tin quản trị viên
		$info = $this->user_model->get_info($admin_id);
		if($admin_id==6){
			$this->session->set_flashdata('message', 'Bạn không thể xóa admin mặc định !');
			$this->session->set_flashdata('alert','error');
			redirect(admin_url('member'));
		}
		if(!$info){
			$this->session->set_flashdata('message', 'Không tồn tại tài khoản này !');
			redirect(admin_url('member'));
		}
		$this->user_model->deleteOne($admin_id);
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
		redirect(admin_url('member'));
	}
	function delete_all()
	{
		$ids = $this->input->post('id[]');
		foreach ($ids as $id)
		{
			$this->_del($id);
		}
		$this->session->set_flashdata('message','Xóa tùy chọn thành công');
		redirect(admin_url('member'));
	}
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
    	$admin = $this->user_model->get_info($id);
    	if($id==6){
    		$this->session->set_flashdata('message', 'Bạn không thể xóa admin mặc định !');
    		$this->session->set_flashdata('alert', 'error');
    		redirect(admin_url('member'));
    	}
    	if(!$admin)
    	{
            //tạo ra nội dung thông báo
    		$this->session->set_flashdata('message', 'không tồn tại người dùng này');
    		redirect(admin_url('member'));
    	}
        //thuc hien xoa san pham
    	$this->user_model->deleteOne($id);
    }

    
  // create xlsx
    public function export() {
    // create file name
    	$fileName = 'data-'.time().'.xlsx';  
    // load excel library
    	$this->load->library('excel');
    	$this->load->library('pagination');
		$total_row = $this->user_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('member/index');
		$config['total_rows']  = $total_row;
		$config['per_page']    = 20;
		$config['uri_segment'] = 4;
		$config['next_link']   = "Next page";
		$config['prev_link']   = "Prev page";
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(4);
		$segment = intval($segment);
		$input = array();
		$input["limit"] = array($config['per_page'], $segment);
	
		$name = $this->input->get('name');
		$start = $this->input->get('start');
		$end = $this->input->get('end');
		$start = str_replace('/','-',$start);
		$end = str_replace('/','-',$end);
		$batdau = input_format_date($start);
		$ketthuc = input_format_date($end);

		if($name){
			$input['like'] = array('name', $name);
		}
		if($start || $end){
			$input['where'] = " created_at BETWEEN CAST('".$batdau."' AS DATE) AND CAST('".$ketthuc."' AS DATE)";	
		}

     	$list = $this->user_model->get_list($input);

    	if($this->input->post()){
    	$object = new PHPExcel();
    	$object->setActiveSheetIndex(0);
    	$styleArray = array(
    		'font' => array(
    			'bold' => true,
    			'color' => array('rgb' => '2F4F4F')
    		),
    		'alignment' => array(
    			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    		)
    	);
    	$table_columns = array("Loại khách", "Mã khách hàng", "Tên khách hàng", "Điện thoại", "Địa chỉ", "Khu vực", "Phường/Xã", "Công ty", "Mã số thuế", "Ngày sinh", "Giới tính", "Email", "Facebook","Nhóm khách hàng","Ghi chú","Ngày giao dịch cuối","Nợ cần thu hiện tại","Tổng bán (Không import)","Trạng thái");
    	$column = 0;

    	foreach($table_columns as $field)
    	{
    		$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field)->getStyle('A1:S1')->applyFromArray($styleArray);
    		$column++;
    	}
    	$excel_row = 2;

    	foreach($list as $row)
    	{

    		$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, 'Khách web');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, 'KHWEB00'.$row->id);
    		$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->name);
    		$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->phone);
    		$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->address);
    		$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->email);
    		$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, '');
    		$object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, '');

    		$excel_row++;
    	}

    	 $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
 		 header('Content-Type: application/vnd.ms-excel');
 		 header('Content-Disposition: attachment;filename="Customers.xls"');
  		 $object_writer->save('php://output');
  		}

  		$this->data['list'] = $list;

  		$this->data['temp'] = 'admin/member/export';	
		$this->load->view('admin/main', $this->data);

    }
    

    public function downloaded($list){
    	$subscribers = $list;
    	require_once APPPATH . '/third_party/Phpexcel/Bootstrap.php';
		// Create new Spreadsheet object
    	$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		// Set document properties
    	$spreadsheet->getProperties()->setCreator('jhds.vn')
    	->setLastModifiedBy('Lienketso.com.vn')
    	->setTitle('Export database article')
    	->setSubject('jhds ')
    	->setDescription('file du lieu bai bao');
		// add style to the header
    	$styleArray = array(
    		'font' => array(
    			'bold' => true,
    		),
    		'alignment' => array(
    			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    		),

    		'borders' => array(
    			'top' => array(
    				'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    			),

    		),

    		'fill' => array(
    			'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
    			'rotation' => 90,
    			'startcolor' => array(
    				'argb' => 'FFA0A0A0',
    			),
    			'endcolor' => array(
    				'argb' => 'FFFFFFFF',
    			),

    		),

    	);

    	$spreadsheet->getActiveSheet()->getStyle('A1:S1')->applyFromArray($styleArray);
		// auto fit column to content
    	foreach(range('A','S') as $columnID) {
    		$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
    		->setAutoSize(true);
    	}

		// set the names of header cells

    	$spreadsheet->setActiveSheetIndex(0)
    	->setCellValue("A1",'Loại khách')
    	->setCellValue("B1",'Mã khách hàng')
    	->setCellValue("C1",'Tên khách hàng')
    	->setCellValue("D1",'Điện thoại')
    	->setCellValue("E1",'Địa chỉ')
    	->setCellValue("F1",'Khu vực')
    	->setCellValue("G1",'Phường/Xã')
    	->setCellValue("H1",'Công ty')
    	->setCellValue("I1",'Mã số thuế')
    	->setCellValue("J1",'Ngày sinh')
    	->setCellValue("K1",'Giới tính')
    	->setCellValue("L1",'Email')
    	->setCellValue("M1",'Facebook')
    	->setCellValue("N1",'Nhóm khách hàng')
    	->setCellValue("O1",'Ghi chú')
    	->setCellValue("P1",'Ngày giao dịch cuối')
    	->setCellValue("Q1",'Nợ cần thu hiện tại')
    	->setCellValue("R1",'Tổng bán ( Không import )')
    	->setCellValue("S1",'Trạng thái');
		// Add some data

    	$x= 2;
    	foreach($subscribers as $sub){

    		$spreadsheet->setActiveSheetIndex(0)
    		->setCellValue("A$x",$sub->code_name)
    		->setCellValue("B$x",$sub->name)
    		->setCellValue("C$x",$category->name)
    		->setCellValue("D$x",$author->name)
    		->setCellValue("E$x",format_date($sub->publishing_date))
    		->setCellValue("F$x",$type_article->name)
    		->setCellValue("G$x",$theme_article->name)
    		->setCellValue("H$x",$major->name)
    		->setCellValue("I$x",$status)
    		->setCellValue("J$x",$sub->page)
    		->setCellValue("K$x",'')
    		->setCellValue("L$x",'')
    		->setCellValue("M$x",'')
    		->setCellValue("N$x",'')
    		->setCellValue("O$x",'')
    		->setCellValue("P$x",'')
    		->setCellValue("Q$x",'')
    		->setCellValue("R$x",'')
    		->setCellValue("S$x",'');
    		$x++;

    	}
// Rename worksheet
    	$spreadsheet->getActiveSheet()->setTitle('Danh sách thành viên');
// set right to left direction
//		$spreadsheet->getActiveSheet()->setRightToLeft(true);
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    	$spreadsheet->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel2007)
    	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    	header('Content-Disposition: attachment;filename="Baibao.xlsx"');
    	header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
    	header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 2018 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
		$writer->save('php://output');
		exit;

		//  create new file and remove Compatibility mode from word title

	}




}//  end class