<?php
Class Order extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('cart');
	}
	function check_email(){
		$this->load->model('member_company_model');
		$email = $this->input->post('email');
		$where = array('email'=> $email);
		if($this->member_company_model->check_exits($where)){
			//trả về thông báo lỗi
			$this->form_validation->set_message(__FUNCTION__,'Email đã được sử dụng !');
			return false;
		}
		else{
			return true;
		}
	}
	function register(){
		if($this->input->post()){
			$this->form_validation->set_rules('name','Họ tên','required|min_length[2]');
			$this->form_validation->set_rules('address','Địa chỉ công ty','required|min_length[6]');
			$this->form_validation->set_rules('phone','Số điện thoại','required|numeric');
			$this->form_validation->set_rules('email','Email','required|valid_email|callback_check_email');
			$this->form_validation->set_rules('password','Mật khẩu','required|min_length[6]');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$password = md5($password);
				$status = 1;
				$created = now();
				$data = array(
					'name'    => $name,
					'phone'   => $phone,
					'address' => $address,
					'email'   => $email,
					'password'=> $password,
					'status'  => $status,
					'created' => $created
				);
				$this->load->model('member_company_model');
				$this->member_company_model->create($data);
				redirect('order/checkout');
			}
		}
		$this->data['temp'] = 'site/order/register';
		$this->load->view('site/layout',$this->data);
	}
	//đăng nhập
	function check_login(){
		$user = $this->_get_userinfo();
		if($user){
			return true;
		}
		else{
			$this->form_validation->set_message(__FUNCTION__,'Email hoặc mật khẩu không đúng !');
			return false;
		}
	}
		//lấy ra thông tin thành viên
	private function _get_userinfo(){
		$this->load->model('member_company_model');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password = md5($password);
		$where = array('email'=>$email, 'password'=>$password);
		$user = $this->member_company_model->get_info_rule($where);
		return $user;
	}
	function login(){
		if($this->input->post()){
			$this->form_validation->set_rules('email','Địa chỉ email','required|min_length[2]');
			$this->form_validation->set_rules('password','Mật khẩu','required|min_length[6]');
			$this->form_validation->set_rules('login','Login','callback_check_login');
			if($this->form_validation->run()){
				$user = $this->_get_userinfo();
				$this->session->set_userdata('company_id_login', $user->id);
				redirect(base_url('order/checkout'));
			}
		}
	}
	public function sendemail($subject,$data){
		$this->load->library('email');
		$this->load->model('site_model');
		$listSetting = $this->site_model->get_list();
		$arrSetting = [];
		foreach($listSetting as $key=>$val){
			$arrSetting[$val->setting_key] = $val->setting_value;
		}
		$this->data['arrSetting'] = $arrSetting;
		$config = array();
		$config['protocol'] = $arrSetting['smtp_protocol'];
		$config['smtp_host'] = $arrSetting['smtp_host'];
		$config['smtp_user'] = $arrSetting['smtp_user'];
		$config['smtp_pass'] = $arrSetting['smtp_pass'];
		$config['smtp_port'] = $arrSetting['smtp_port'];
		$config['smtp_crypto'] = 'tls';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= "From: kingbamboo@gmail.com\r\nReply-To: kingbamboo@gmail.com";
		$this->email->initialize($config);
		// $this->email->set_header($headers);
		$this->email->set_newline("\r\n");
		$from_email = "thanhan.rubee@gmail.com";
		$to_email = $arrSetting['email_nhantin'];
        //Load email library
		$this->email->from($from_email, 'King Bamboo Straws');
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($data);
        //Send mail
		if($this->email->send()){
			$this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
		}
		else{
			echo $this->email->print_debugger();die;
			$this->session->set_flashdata("email_sent","You have encountered an error");
		}
	}
	function checkout(){
		$this->load->model('product_model');
		$carts = $this->cart->contents();
		$total_item = $this->cart->total_items();
		if($total_item <= 0){
			redirect();
		}
		$this->data['carts'] = $carts;
		//print_r($carts);
		//tổng số tiền đơn hàng
		$total_amount = 0;
		$donhang = '';
		foreach($carts as $row){
			$total_amount = $total_amount + $row['subtotal'];
			$sanpham = $this->product_model->get_info($row['id']);
			$donhang .= '<tr><td style="border-bottom:1px solid #000">'.$sanpham->name.'</td><td style="border-bottom:1px solid #000">'.$row['qty'].'</td><td style="border-bottom:1px solid #000">'.number_format($row['price']).'</td><td style="border-bottom:1px solid #000">'.number_format(nhan($row['qty'],$row['price'])).'</td></tr>';
		}
		//echo $donhang;die;
		$this->data['total_amount'] = $total_amount;

		if($this->input->post()){
			$this->form_validation->set_rules('name','Họ tên','required|min_length[2]');
			$this->form_validation->set_rules('address','Địa chỉ','required|min_length[6]');
			$this->form_validation->set_rules('phone','Số điện thoại','required');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');
				$content = $this->input->post('content');
				$payment = $this->input->post('payment');
				$hinhtuctt = '';
				if($payment=='tructiep'){
					$hinhtuctt = 'Thanh toán khi nhận hàng';
				}else if($payment=='chuyenkhoan'){
					$hinhtuctt = 'Chuyển khoản';
				}
				$data = array(
					'status'=>0, //trạng thái thanh toán
					'name'=>$name,
					'address'=>$address,
					'phone'=>$phone,
					'content'=>$content,
					'amount'=>$total_amount,
					'payment'=>$payment,
				);
			//thêm dữ liệu vào bảng transaction'
				$this->load->model('transaction_model');
				$this->transaction_model->create($data);
			$transaction_id = $this->db->insert_id(); // lấy ra id của giao dịch vừa thêm vào
			//thêm dữ liệu vào bảng order_list
			$this->load->model('order_model');
			foreach($carts as $row){
				$data = array(
					'transaction_id' => $transaction_id,
					'product_id' => $row['id'],
					'qty' => $row['qty'],
					'amount' => $row['subtotal'],
					'status' => 0
				);
				$this->order_model->create($data);

			}
			//gửi email
			$body = '<html><body>';
			$body .='<table cellpadding="2">';
			$body .= '<tr><td>Bạn nhận được đơn hàng từ website <span style="font-weight:bold;">'.base_url().'</span></td><tr>';			
			$body .= '<tr><td>Một khách hàng đã đặt hàng tại website/td><tr>';
			$ngaydat = time();
			$body .= '<tr><td>Ngày đặt: <span style="font-weight:bold;">'.Date("d-m-Y",$ngaydat).' Lúc '.Date("H:s a",$ngaydat).'</span></td><tr>';
			$body .= '<tr><td><span style="font-weight:bold;">Thông tin đơn hàng</span></td><tr>';	
			$body .= "<tr><td>
				<table style='border:1px solid #000'>
					<tr>
						<td>Tên sản phẩm</td>
						<td>Số lượng</td>
						<td>Giá</td>
						<td>Thành tiền</td>
					</tr>".$donhang."
					<tr style='font-weight:bold'>
						<td >Tổng tiền</td>
						<td>".number_format($total_amount)." đ</td>
					</tr>
				</table>
			</td></tr>";
			$body .= '<tr><td>Hình thức thanh toán : <span style="font-weight:bold;">'.$hinhtuctt.'</span> </td><tr>';
			$body .= '<tr><td>Tên khách hàng : <span style="font-weight:bold;">'.$name.'</span> </td><tr>';
			$body .= '<tr><td>Số điện thoại : <span style="font-weight:bold;">'.$phone.'</span> </td><tr>';
			$body .= '<tr><td>Địa chỉ : <span style="font-weight:bold;">'.$address.'</span> </td><tr>';
			$body .= '<tr><td>Nội dung : <span style="font-weight:bold;">'.$content.'</span> </td><tr>';
			$body .= '<tr><td>Trân trọng !,</td><tr>';	
			$body .= '<tr><td>Ban quản trị '.base_url().'</td><tr>';	
			$body .= '<tr><td>--------------------------------------------------------------------</td><tr>';
			$body .= "</table>";	
			$body .= "</body></html>";
			//$mailnhan = $emailquantri;
			$emailht = "admin@rubee.com.vn";  
			$this->sendemail('Đơn hàng từ King bamboo',$body);
			//xóa thông tin đơn hàng trong giỏ hàng
			$this->cart->destroy();
			//nếu thanh toán trực tiếp thì đặt hàng luôn
			if($payment=='tructiep' || $payment=='chuyenkhoan'){
				redirect(base_url('order/order_success'));
			}
			//nếu chọn cổng thanh toán
			elseif(in_array($payment, array('nganluong','baokim'))){
				//load thư viện thanh toán
				$this->load->library('payment/'.$payment.'_payment');
				//chuyển sang trang cổng thanh toán
				$this->{$payment.'_payment'}->payment($transaction_id,$total_amount);
			}
			elseif($payment=='tragop'){
				$this->load->library('payment/alepay/alepay');
				$this->load->library('payment/alepay/config');
				$alepay = new Alepay($config);
				$data = array();
				$data['cancelUrl'] = URL_DEMO;
				$data['amount'] = $total_amount;
				$data['orderCode'] = date('dmY') . '_' . uniqid();
				$data['currency'] = "VND";
				$data['orderDescription'] = "Đơn hàng từ dienmayminhhai.com";
	//$data['totalItem'] = intval($params['totalItem']);
	$data['checkoutType'] = 2; // Thanh toán trả góp
	$data['buyerName'] = trim($name);
	$data['buyerEmail'] = trim($email);
	$data['buyerPhone'] = trim($phone);
	$data['buyerAddress'] = trim($address);
	//$data['buyerCity'] = trim($params['buyerCity']);
	//$data['buyerCountry'] = trim($params['buyerCountry']);
	$data['month'] = 3;
	$data['paymentHours'] = 48; //48 tiếng :  Thời gian cho phép thanh toán (tính bằng giờ)
	$result = $alepay->sendOrderToAlepay($data); // Khởi tạo
	if (isset($result) && !empty($result->checkoutUrl)) {
		//$alepay->return_json('OK', 'Thành công', $result->checkoutUrl);
		echo '<meta http-equiv="refresh" content="0;url=' . $result->checkoutUrl. '">';
	} else {
		echo $result->errorDescription;
	}
			}//end ale pay
		}
	}
	$this->data['temp'] = 'site/order/checkout';
	$this->load->view('site/layout',$this->data);
}
function order_success(){
	$this->load->model('transaction_model');
	$this->load->model('product_order_model');
	$this->load->model('city_model');
	$this->load->model('district_model');

	$tranid = $this->input->get('tranid');
	if($tranid){
		$transaction = $this->transaction_model->get_info($tranid);
		$this->data['transaction'] = $transaction;
		$input['where'] = ['tran_id'=>$tranid];
		$order = $this->product_order_model->get_list($input);
		$this->data['order'] = $order;
	}else{
		redirect('404');
	}

	$this->data['temp'] = 'site/order/order_success';
	$this->load->view('site/layout',$this->data);
}
	//nhận kết quả trả về từ cổng thanh toán
function result(){
	$this->load->library('payment/baokim_payment');
	$this->load->model('transaction_model');
	$transaction_id = $this->input->post('order_id'); 
		//lấy thông tin giao dịch
	$transaction = $this->transaction_model->get_info($transaction_id);
	if(!$transaction){
		redirect();
	}
		//gọi tới hàm kiểm tra trạng thái thanh toán
	$status = $this->baokim_payment->result($transaction_id,$transaction->amount);
	if($status == TRUE){
			//cập nhật lại trạng thái đơn hàng là đã thanh toán
		$data = array();
		$data = array(
			'status' => 1
		);
		$this->transaction_model->update($transaction_id,$data);
		}elseif($status==false){ //thanh toán thất bại
			$data = array();
			$data = array(
				'status' => 2
			);
			$this->transaction_model->update($transaction_id,$data);
		}
	}
}//end class