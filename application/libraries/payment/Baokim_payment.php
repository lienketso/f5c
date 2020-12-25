

<?php
/**
 *	
 *		Phiên bản: 0.1   
 *		Tên lớp: BaoKimPayment
 *		Chức năng: Tích hợp thanh toán qua baokim.vn cho các merchant site có đăng ký API
 *						- Xây dựng URL chuyển thông tin tới baokim.vn để xử lý việc thanh toán cho merchant site.
 *						- Xác thực tính chính xác của thông tin đơn hàng được gửi về từ baokim.vn.
 *		
 */

class Baokim_payment 
{
	var $CI ='';
	var $data = array();
	//thông số cài đặt payment
	var $code ='baokim';
	var $setting = array(
		'business' => 'dev.baokim@bk.vn',
		'merchant_id' => '647',
		'secure_pass' => 'ae543c080ad91c23',
		'cost_constant' => 1700,
		'cost_percent' => 1
		);
	// URL checkout của baokim.vn
	//var $url = 'https://www.baokim.vn/payment/customize_payment/order'; // url thanh toán thật
	var $url = 'https://www.sandbox.baokim.vn/payment/customize_payment/order'; // url chạy test
	var $ip = '112.78.4.134';
	/**
	 * Hàm xây dựng url chuyển đến BaoKim.vn thực hiện thanh toán, trong đó có tham số mã hóa (còn gọi là public key)
	 * @param $order_id				Mã đơn hàng
	 * @param $business 			Email tài khoản người bán
	 * @param $total_amount			Giá trị đơn hàng
	 * @param $shipping_fee			Phí vận chuyển
	 * @param $tax_fee				Thuế
	 * @param $order_description	Mô tả đơn hàng
	 * @param $url_success			Url trả về khi thanh toán thành công
	 * @param $url_cancel			Url trả về khi hủy thanh toán
	 * @param $url_detail			Url chi tiết đơn hàng
	 * @return url cần tạo
	 */
	public function __construct(){
			//khởi tạo 1 đối tượng mới
		$this->CI =& get_instance();
		}

	function payment($trans_id, $amount,$return_url){
		$trans_info = 'Thanh toán cho đơn hàng'.$trans_id;
		$url = array();
		$url['success'] = $return_url;
		$url['cancel'] = $return_url;
		$url['detail'] = $return_url;
		$url = $this->baokimcreate_url($trans_id, $this->setting['business'], $amount, '', '',$trans_info, $url['success'],$url['cancel'],$url['detail']);
		redirect($url);
	}

	public function baokimcreate_url($order_id, $business, $total_amount, $shipping_fee, $tax_fee, $order_description, $url_success, $url_cancel, $url_detail)
	{
		// Mảng các tham số chuyển tới baokim.vn
		$params = array(
			'merchant_id'		=>	strval($this->setting['merchant_id']),
			'order_id'			=>	strval($order_id),
			'business'			=>	strval($business),
			'total_amount'		=>	strval($total_amount),
			'shipping_fee'		=>  strval($shipping_fee),
			'tax_fee'			=>  strval($tax_fee),
			'order_description'	=>	strval($order_description),
			'url_success'		=>	strtolower($url_success),
			'url_cancel'		=>	strtolower($url_cancel),
			'url_detail'		=>	strtolower($url_detail)
		);
		ksort($params);
		$str_combined = $this->setting['secure_pass'].implode('', $params);
		$params['checksum'] = strtoupper(md5($str_combined));
		//Kiểm tra  biến $redirect_url xem có '?' không, nếu không có thì bổ sung vào
		$redirect_url = $this->url;
		if (strpos($redirect_url, '?') === false)
		{
			$redirect_url .= '?';
		}
		else if (substr($redirect_url, strlen($redirect_url)-1, 1) != '?' && strpos($redirect_url, '&') === false)
		{
			// Nếu biến $redirect_url có '?' nhưng không kết thúc bằng '?' và có chứa dấu '&' thì bổ sung vào cuối
			$redirect_url .= '&';			
		}

		// Tạo đoạn url chứa tham số
		$url_params = '';
		foreach ($params as $key=>$value)
		{
			if ($url_params == '')
				$url_params .= $key . '=' . urlencode($value);
			else
				$url_params .= '&' . $key . '=' . urlencode($value);
		}
		return $redirect_url.$url_params;
	}

	

	/**

	 * Hàm thực hiện xác minh tính chính xác thông tin trả về từ BaoKim.vn

	 * @param $_GET chứa tham số trả về trên url

	 * @return true nếu thông tin là chính xác, false nếu thông tin không chính xác

	 */



	//xử lý kêt quả trả về từ bảo kim

	function result($trans_id,$amount){

		$result = $this->CI->input->post();

		$this->CI->load->model('transaction_model');

		$data = array();

		$data['payment_info'] = serialize($result);

		$this->CI->transaction_model->update($trans_id,$data);

		//nếu là link user chuyển về từ bảo kim sau khi thanh toán xong

		if($this->CI->input->post('order_id')){

			return NULL;

		}

		//kiểm tra ip

		if($this->ip != $this->CI->input->ip_address()){

			return FALSE;

		}



		//kiểm tra mã số giao dịch

		if($trans_id != $this->CI->input->post('order_id')){

			return FALSE;

		}

		//kiểm tra amount

		$amount_pay = floatval($this->CI->input->post('total_amount'));

		$amount = floatval($amount);

		if($amount_pay < $amount){

			return FALSE;

		}

		//kiểm tra trạng thái giao dịch

		if($this->CI->input->post('transaction_status') != 4){

			return NULL;

		}



		return TRUE;

	}



	//lấy ra trans_id từ kết quả trả về

	function get_transaction_id(&$sercurity=''){

		$trans_id = $this->CI->input->post('order_id');

		return $trans_id;

	}



}//end class

?>