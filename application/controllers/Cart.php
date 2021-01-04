<?php 
Class Cart extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('cart_model');
	}
	function add(){
		//gọi tới thư viện cart
		//lấy ra sản phẩm muốn thêm vào giỏ
		$this->load->model('product_model');
		$id = $this->input->get('id');
		$product = $this->product_model->get_info($id);
		//số lượng sản phẩm
		$qty = $this->input->get('qty');
		if(!isset($qty)){
			$qty = 1;
		}
		$price = $product->price;
		//thông tin sản phẩm
		$data = array();
		$data['id'] = $product->id;
		$data['qty'] = $qty;
		// $data['scores'] = $product->scores;
		$data['name'] = $product->name;
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




}//end class