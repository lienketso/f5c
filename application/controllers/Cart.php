<?php 
Class Cart extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('cart_model');
		$this->load->model('transaction_model');
	}
	function addpk(){
		$id = $this->input->post('id');
		$product = $this->product_model->get_info($id);
		$qty = 1;
		$price = $product->price;
		$data = array();
		$data['id'] = $product->id;
		$data['qty'] = $qty;

		$data['name'] = url_title($product->name);
		$data['image_name'] = $product->image_name;
		$data['price'] = $product->price;
		$this->cart->insert($data);
		$cart_total = $this->cart->total_items();
		echo $cart_total;
		die;

	}
	function add(){
		//gọi tới thư viện cart
		//lấy ra sản phẩm muốn thêm vào giỏ
		$this->load->model('product_model');
		$id = $this->uri->rsegment(3);
		$product = $this->product_model->get_info($id);
		//số lượng sản phẩm
		$qty = 1;
		$price = $product->price;
		//thông tin sản phẩm
		$data = array();
		$data['id'] = $product->id;
		$data['qty'] = $qty;
		// $data['scores'] = $product->scores;
		$data['name'] = url_title($product->name);
		$data['image_name'] = $product->image_name;
		$data['price'] = $product->price;
		$this->cart->insert($data);
		//chuyển sang trang danh sách giỏ hàng
		redirect(base_url('cart/index'));
	}
	function store(){
		$this->data['temp'] = 'site/cart/store';
		$this->load->view('site/layout',$this->data);
	}
	//hien thi danh sach gio hang

	public function sendemail($subject,$data){
		$this->load->library('email');
		
		$ss['order'] = ['key','asc'];
		$listOption = $this->site_model->get_list($ss);
		$arrOption = [];
		foreach($listOption as $key=>$val){
			$arrOption[$val->key] = $val->value;
		}

		$config['protocol'] = $arrOption['smtp_protocol'];
		$config['smtp_host'] = $arrOption['smtp_host'];
		$config['smtp_user'] = $arrOption['smtp_user'];
		$config['smtp_pass'] = $arrOption['smtp_pass'];
		$config['smtp_port'] = $arrOption['smtp_port'];
		$config['smtp_crypto'] = 'tls';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= "From: f5c@gmail.com\r\nReply-To: f5c@gmail.com";
		$this->email->initialize($config);
		// $this->email->set_header($headers);
		$this->email->set_newline("\r\n");
		$from_email = "thanhan1507@gmail.com";
		$to_email = $arrOption['email_nhantin'];
        //Load email library
		$this->email->from($from_email, 'F5C');
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

	function index(){

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->load->model('product_model');
		$this->load->model('category_model');
		//thong tin gio hang
		$carts = $this->cart->contents();
		//lay ra tong so san pham trong gio hang
		$total_items = $this->cart->total_items();
		$this->data['total_items'] = $total_items;
		$this->data['carts'] = $carts;

		$this->load->model('city_model');
		$this->load->model('district_model');

		$ct['where'] = [];
		$ct['order'] = ['id','asc'];
		$listCity = $this->city_model->get_list($ct);
		$this->data['listCity'] = $listCity;

		if($this->input->post()){
			$this->form_validation->set_rules('fullname','Họ tên','required|min_length[2]');
			$this->form_validation->set_rules('slAddress','Địa chỉ','required|min_length[6]');
			$this->form_validation->set_rules('phone','Số điện thoại','required');
			if($this->form_validation->run()){
				$contact = array(
					'name'=>$this->input->post('fullname'),
					'email'=>$this->input->post('slEmail'),
					'phone'=>$this->input->post('phone'),
					'nhanhang'=>$this->input->post('optorder'),
					'city'=>$this->input->post('slThanhPho'),
					'district'=>$this->input->post('slQuan'),
					'address'=>$this->input->post('slAddress'),
					'yeucau'=>$this->input->post('yeucau')
				);
				
				if(!empty($userLogin)){
					$user = $userLogin->id;
				}else{
					$user = 0;
				}
				$name = $this->input->post('fullname');
				$phone = $this->input->post('phone');
				$hinhtuctt = $this->input->post('optPayment');
				if($hinhtuctt=='home'){
					$htthanhtoan = 'Thanh toán tại nhà';
				}else{
					$htthanhtoan = 'Chuyển khoản';
				}
				$city = $this->input->post('slThanhPho');
				$thanhpho = $this->city_model->getCity($city);
				$district = $this->input->post('slQuan');
				$quan = $this->district_model->getDistrict($district);

				$address = $this->input->post('slAddress');
				$content = $this->input->post('yeucau');

				$diachinhan = $address.','.$quan.','.$thanhpho;

				$contact = serialize($contact);
				$data = [
					'payment'=>$this->input->post('optPayment'),
					'amount'=> $this->cart->total(),
					'contact'=>$contact,
					'user_id'=>$user,
					'created'=>now()
				];
				$trans = $this->transaction_model->create($data);
				$transid = $this->db->insert_id();
				$this->load->model('product_order_model');

				$donhang = '';
				foreach($carts as $row){
					$order = array(
						'tran_id' => $transid,
						'product_id' => $row['id'],
						'quantity' => $row['qty'],
						'price' => $row['price'],
						'amount' => $row['subtotal'],
						'status'=>0
					);
					$this->product_order_model->create($order);

					$sanpham = $this->product_model->get_info($row['id']);
					$donhang .= '<tr><td style="border-bottom:1px solid #000">'.$sanpham->name.'</td><td style="border-bottom:1px solid #000">'.$row['qty'].'</td><td style="border-bottom:1px solid #000">'.number_format($row['price']).'</td><td style="border-bottom:1px solid #000">'.number_format(nhan($row['qty'],$row['price'])).'</td></tr>';
				}

					//gửi email
				$body = '<html><body>';
				$body .='<table cellpadding="2">';
				$body .= '<tr><td>Bạn nhận được đơn hàng từ website <span style="font-weight:bold;">'.base_url().'</span></td><tr>';			
				$body .= '<tr><td>Một khách hàng đã đặt hàng tại website</td><tr>';
				$ngaydat = now();
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
				<td colspan='2'>Tổng tiền</td>
				<td>".number_format($this->cart->total())." đ</td>
				</tr>
				</table>
				</td></tr>";
				$body .= '<tr><td>Hình thức thanh toán : <span style="font-weight:bold;">'.$htthanhtoan.'</span> </td><tr>';
				$body .= '<tr><td>Tên khách hàng : <span style="font-weight:bold;">'.$name.'</span> </td><tr>';
				$body .= '<tr><td>Số điện thoại : <span style="font-weight:bold;">'.$phone.'</span> </td><tr>';
				$body .= '<tr><td>Địa chỉ : <span style="font-weight:bold;">'.$diachinhan.'</span> </td><tr>';
				$body .= '<tr><td>Nội dung : <span style="font-weight:bold;">'.$content.'</span> </td><tr>';
				$body .= '<tr><td>Trân trọng !,</td><tr>';	
				$body .= '<tr><td>Ban quản trị '.base_url().'</td><tr>';	
				$body .= '<tr><td>--------------------------------------------------------------------</td><tr>';
				$body .= "</table>";	
				$body .= "</body></html>";

				$this->cart->destroy();
				$this->sendemail('Đơn hàng từ f5c.vn',$body);
				redirect(base_url('order/order_success?tranid='.$transid));
			}
		}

		$this->data['temp'] = 'site/cart/index';
		$this->load->view('site/layout',$this->data);
	}

	function updatecart(){
		$carts = $this->cart->contents();
		foreach($carts as $key=>$row){
			//tổng số lượng mỗi sản phẩm
			$total_qty = $this->input->post('qty_'.$row['id']);
			$data = array();
			$data['rowid'] = $key;
			$data['qty'] = $total_qty;
			$this->cart->update($data);
		}
		//chuyển sang trang danh sách giỏ hàng
		$this->session->set_flashdata('message', 'Cập nhật đơn hàng thành công !');
		redirect(base_url('cart/index'));
	}

	function updateOnecart(){
		$data = array(
			'rowid'   => $this->input->post('rowid'),
			'qty'     => $this->input->post('qty'),
		);
        // Update the cart with the new information
		$this->cart->update($data);
		$total = $this->cart->total();
		echo number_format($total);
		die;
	}

	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		//trường hợp xóa 1 sản phẩm trong giỏ hàng
		if($id>0){
			$carts = $this->cart->contents();
			foreach($carts as $key=>$row){
				if($row['id'] == $id){
			//tổng số lượng mỗi sản phẩm
					$total_qty = $this->input->post('qty_'.$row['id']);
					$data = array();
					$data['rowid'] = $key;
					$data['qty'] = 0;
					$this->cart->update($data);
				}
			}
		}else{
			//xóa toàn bộ sản phẩm
			$this->cart->destroy();
		}
		//chuyển sang trang danh sách giỏ hàng
		$this->session->set_flashdata('message', 'Đã xóa sản phẩm !');
		redirect(base_url('cart/index'));
	}

	function ajaxCheckout(){

		$this->load->model('transaction_model');
		$this->load->model('product_model');
		$this->load->model('order_model');	

		$uid = $this->input->post('userid');
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$content = $this->input->post('content');

		if($uid==''){
			$user = [
				'name'=>$name,
				'phone'=>$phone,
				'address'=>$address
			];
			$this->user_model->create($user);
			$uid = $this->db->insert_id();
		}

		$data = [
			'name'=>$name,
			'phone'=>$phone,
			'address'=>$address,
			'content'=>$content,
			'amount'=>$this->cart->total(),
			'user_id'=>$uid
		];

		$this->transaction_model->create($data);
		$transaction_id = $this->db->insert_id();
		$carts = $this->cart->contents();
		foreach($carts as $row){
			$order = array(
				'transaction_id' => $transaction_id,
				'product_id' => $row['id'],
				'qty' => $row['qty'],
				'amount' => $row['subtotal'],
				'status' => 0
			);
			$this->order_model->create($order);
		}

		$this->cart->destroy();

		echo 'Đặt hàng thành công ! Plusmart sẽ liên hệ sớm nhất';die;
		
	}

	function getDistrict(){
		$cityid = $this->input->post('cityid');
		$this->load->model('district_model');
		$input['where'] = ['city_id'=>$cityid];
		$input['order'] = ['name','asc'];
		$listDistrict = $this->district_model->get_list($input);
		foreach($listDistrict as $row){
			echo '<option value="'.$row->id.'">'.$row->name.'</option>';
		}
		die;

	}




}//end class