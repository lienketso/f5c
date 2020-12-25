<?php
Class Home extends MY_Controller{
	function __construct(){
		parent::__construct();
	}
	function lang($lang=''){
		$language_list = $this->config->item('language_list');
		if(!isset($language_list[$lang])){
			$this->session->set_userdata('language_current','vn');
			redirect(base_url());
		}else{
			$this->session->set_userdata('language_current', $lang);
			redirect(base_url());
		}
	}
	function getIpGuest($ip){
		//$ip= $_SERVER['REMOTE_ADDR'];
		$this->load->model('useragent_model');
		//$ip = '113.190.254.188';
		$dia_chi_lay_thong_tin = "http://api.ipstack.com/".$ip."?access_key=ee68d734c5680ac39d05d258a0550bee";
		$thong_tin = file_get_contents($dia_chi_lay_thong_tin);
		$thong_tin = json_decode($thong_tin, true);
		if($ip!=''){
			$data = [
				'ip_address'=>$ip,
				'location' => $thong_tin['location']['capital'],
				'city'=>$thong_tin['city'],
				'flag_icon'=>$thong_tin['location']['country_flag'],
				'agent_name'=>$_SERVER ['HTTP_USER_AGENT']
			];
			$this->useragent_model->create($data);
		}else{
			return false;
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
		$headers .= "From: admin@lienketso.vn\r\nReply-To: vccgroup@gmail.com";
		$this->email->initialize($config);
		$this->email->set_header($headers);
		$this->email->set_newline("\r\n");
		$from_email = "thanhan.rubee@gmail.com";
		$to_email = $arrSetting['email_nhantin'];
        //Load email library
		$this->email->from($from_email, 'VCC Group');
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

		$Ishome = 'home';
		$this->data['Ishome'] = $Ishome;

		$this->load->model('gallery_model');
		$this->load->model('catnews_model');
		$this->load->model('news_model');
		$this->load->model('postmeta_model');
		$this->load->model('category_model');
		$this->load->model('product_model');
		$this->load->model('product_category_model');
		$this->load->model('comment_model');
		$this->load->model('news_catnews_model');
		//testimonials
		$listComment = $this->comment_model->getComment(10);
		$this->data['listComment'] = $listComment;
		//quảng cáo
		
		$dm['where'] = ['status'=>1,'display'=>1,'lang_code'=>$this->language];
		$dm['order'] = ['is_order','asc'];
		$dm['limit'] = [10,0];
		$danhmucSP = $this->category_model->get_list($dm);
		$this->data['danhmucSP'] = $danhmucSP;
		//ảnh quảng cáo top
		$bannerTop = $this->gallery_model->getGallery(1,1,10);
		$this->data['bannerTop'] = $bannerTop;
		//banner Category
		$bannerPartner = $this->gallery_model->getGallery(1,2,20);
		$this->data['bannerPartner'] = $bannerPartner;
		//deal hot
		$is['where'] = ['status'=>1,'display'=>2,'lang_code'=>$this->language];
		$is['order'] = ['created_at'=>'desc'];
		$is['limit'] = [10,0];
		$listProductSlider = $this->product_model->get_list($is);
		$this->data['listProductSlider'] = $listProductSlider;
		//danh mục sản phẩm bottom
		$ib['where'] = ['status'=>1,'lang_code'=>$this->language,'display'=>2];
		$ib['order'] = ['is_order','asc'];
		$ib['limit'] = [5,0];
		$categoryBottom = $this->category_model->get_list($ib);
		$this->data['categoryBottom'] = $categoryBottom;
		//danh mục bài viết chân trang
		$catnewsBottom = $this->catnews_model->getCatNewsbyStatus(1,'news',1,2);
		$this->data['catnewsBottom'] = $catnewsBottom;
		//get page type
		$newsHome = $this->news_model->getNewsbyStatus(1,2,'news',4);
		$this->data['newsHome'] = $newsHome;
		//news Hot
		$about = $this->news_model->getNewsbyStatus(1,2,'news',1);
		$this->data['about'] = $about;
		//about 

		$p['where'] = ['status'=>1,'display'=>1,'type'=>'page'];
		$p['order'] = ['created_at','asc'];
		$p['limit'] = [3,0];
		$pageHome = $this->news_model->get_list($p);
		$this->data['pageHome'] = $pageHome;

		$ip = $_SERVER['REMOTE_ADDR'];
		//$ip = '113.190.254.188';
		//$this->getIpGuest($ip);
		//end thông tin
		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}


	function search_ajax(){
		$a_json = array();
		$a_json_row = array();
		$this->load->model('product_model');
		if(isset($_GET['productname'])){
			$result = $this->product_model->search($_GET['productname']);
			if(count($result>0)){
				foreach($result as $pr){
					$a_json_row['id'] = $pr->id;
					$a_json_row['slug'] = $pr->cat_name;
					$a_json_row['value'] = $pr->name;
					$a_json_row['label'] = $pr->name;
					$a_json_row['price'] = number_format($pr->price);
					$a_json_row['discount'] = number_format($pr->discount);
					$a_json_row['img'] = base_url('uploads/product/'.$pr->image);
					array_push($a_json, $a_json_row);
				//echo json_encode($arr_result);
				}
				echo json_encode($a_json);
				flush();
			}
		}
	}
	function search(){
		$this->load->model('product_model');

		$q = $this->input->get('q');
		
		$this->data['q'] = $q;
		$input = array();
		$input['where'] = ['status'=>1];
		if($q){
			$input['like'] = ['name',$q];
		}
		
		$lists = $this->product_model->get_list($input);
		$numrows = count($lists);
		$this->load->library('pagination');
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = base_url('search');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows']  = $numrows;
		$config['per_page']    = 10;
		$config['uri_segment'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = 'Trang đầu';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Trang tiếp';
		$config['next_tag_open'] = '<li class="page-item next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Quay lại';
		$config['prev_tag_open'] = '<li class="prev disabled">';
		$config['prev_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(2);
		$segment = intval($segment);
		$input["limit"] = array($config['per_page'], $segment);

		$view = '';
		$view = $this->input->get('view');
		$this->data['view'] = $view;

		$list = $this->product_model->get_list($input);
		$this->data['numrows'] = $numrows;
		$this->data['list'] = $list;

 

  		$nowUrl = http_build_query($_GET, '', "&");
  		$this->data['nowUrl'] = $nowUrl;

		$this->data['temp'] = 'site/home/search';
		$this->load->view('site/layout', $this->data);
	}
	function booking(){
		$name = 'Khách vãng lai';
		$phone = $this->input->post('phone');
		$title = $this->input->post('title');
		$this->load->model('contact_model');
		$data = array(
			'user_name'=> $name,
			'user_phone' => $phone,
			'title'=>$title
		);
		$this->contact_model->create($data);	

		echo 'Gửi thông tin thành công !';

		$body = '<html><body>';
		$body .='<table cellpadding="2">';
		$body .= '<tr><td>Bạn nhận được tin nhắn từ website  <span style="font-weight:bold;">'.base_url().'</span></td><tr>';			
		$body .= '<tr><td>Một khách hàng đã để lại số điện thoại từ website !</td><tr>';
		$ngaydat = time();
		$body .= '<tr><td>Ngày gửi: <span style="font-weight:bold;">'.Date("d-m-Y",$ngaydat).' Lúc '.Date("H:s a",$ngaydat).'</span></td><tr>';
		$body .= '<tr><td>Tên người gửi : <span style="font-weight:bold;">'.$name.'</span> </td><tr>';
		$body .= '<tr><td>Số điện thoại : <span style="font-weight:bold;">'.$phone.'</span> </td><tr>';
		$body .= '<tr><td>Nội dung : <span style="font-weight:bold;">'.$title.'</span> </td><tr>';
		$body .= '<tr><td>Trân trọng !,</td><tr>';	
		$body .= '<tr><td>Ban quản trị '.base_url().'</td><tr>';	
		$body .= '<tr><td>--------------------------------------------------------------------</td><tr>';
		$body .= "</table>";	
		$body .= "</body></html>";

		$subject = "Thông báo từ ".base_url()."";  

		$this->sendemail($subject,$body);
		die;

	}
	function contacthome(){
		$this->load->model('contact_model');
		if($this->input->post()){
			$user_name = $this->input->post('name');
			$user_email = $this->input->post('email');
			$user_phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$content = $this->input->post('content');
			$data = array(
				'user_name'=> $user_name,
				'user_phone' => $user_phone,
				'user_email'=>$user_email,
				'user_address'=>$address,
				'title'=>'liên hệ từ website '.base_url(),
				'content' => $content,
				'created' => now()
			);
			$this->contact_model->create($data);
			echo '200';
		}
	}
	function contact(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->load->model('contact_model');
		if($this->input->post()){
			$this->form_validation->set_rules('name','Họ và tên','required|min_length[2]');
			$this->form_validation->set_rules('phone','Số điện thoại','required');
			if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$title = $this->input->post('title');
				$user_name = $this->input->post('name');
				$type = $this->input->post('type');
				$user_phone = $this->input->post('phone');
				$address = $this->input->post('address');
				$content = $this->input->post('content');
				$data = array(
					'user_name'=> $user_name,
					'user_phone' => $user_phone,
					'type'=>$type,
					'user_address'=>$address,
					'title'=>$title,
					'content' => $content
				);
				if($this->contact_model->create($data)){
					// tạo nội dung thông báo
					$this->session->set_flashdata('message', 'Gửi tin nhắn thành công !');
					$body = '<html><body>';
					$body .='<table cellpadding="2">';
					$body .= '<tr><td>Bạn nhận được tin nhắn từ website  <span style="font-weight:bold;">'.base_url().'</span></td><tr>';			
					$body .= '<tr><td>Một khách hàng đã gửi tin nhắn cho bạn từ hệ thống !</td><tr>';
					$ngaydat = time();
					$body .= '<tr><td>Ngày gửi: <span style="font-weight:bold;">'.Date("d-m-Y",$ngaydat).' Lúc '.Date("H:s a",$ngaydat).'</span></td><tr>';
					$body .= '<tr><td>Tên người gửi : <span style="font-weight:bold;">'.$user_name.'</span> </td><tr>';
					$body .= '<tr><td>Số điện thoại : <span style="font-weight:bold;">'.$user_phone.'</span> </td><tr>';
					$body .= '<tr><td>Tiêu đề : <span style="font-weight:bold;">'.$title.'</span> </td><tr>';
					$body .= '<tr><td>Nội dung : <span style="font-weight:bold;">'.$content.'</span> </td><tr>';
					$body .= '<tr><td>Trân trọng !,</td><tr>';	
					$body .= '<tr><td>Ban quản trị '.base_url().'</td><tr>';	
					$body .= '<tr><td>--------------------------------------------------------------------</td><tr>';
					$body .= "</table>";	
					$body .= "</body></html>";
		//$mailnhan = $emailquantri;
					$subject = "Thông báo từ ".base_url()."";  
					$emailht = "admin@nhadatlelong.vn";  
					$headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n";
					$headers .= "From: $emailht\r\nReply-To: $emailht";
		//Gửi email
					$this->load->library('email');
// Cấu hình
					$config['protocol'] = 'sendmail';
					$config['charset'] = 'utf-8';
					$config['mailtype'] = 'html';
					$config['wordwrap'] = TRUE;
					$this->email->initialize($config);
//cau hinh email va ten nguoi gui
					$this->email->from('admin@nhadatlelong.vn', 'Nhà đất Lê Long');
//cau hinh nguoi nhan
					$emailnhan = $this->site_model->getSettingMeta('site_email');
					$this->email->to($emailnhan);
					$this->email->subject($subject);
					$this->email->message($body);
//thuc hien gui
					if ( ! $this->email->send())
					{
// Generate error
					echo $this->email->print_debugger();
					}else{
						echo 'Gửi email thành công';
					}
				}
				//chuyển sang trang chủ
				$this->session->set_flashdata('message', 'Gửi tin nhắn thành công, chúng tôi sẽ liên hệ sớm nhất !');
				redirect(base_url('lien-he'));
			}
		}
		$this->data['temp'] = "site/home/contact";
		$this->load->view('site/layout', $this->data);
	}
	function about(){
		$chutich = $this->news_model->getNewsbyStatus(1,1,'member',2);
		$this->data['chutich'] = $chutich;
		$thanhvien = $this->news_model->getNewsbyStatus(1,2,'member',100);
		$this->data['thanhvien'] = $thanhvien;
		$this->data['temp'] = "site/templates/about";
		$this->load->view('site/layout', $this->data);
	}
	function hoivien(){
		$this->load->model('gallery_model');
		$input['where'] = ['group_id'=>1,'display'=>1];
		$hoivienCT = $this->gallery_model->get_list($input);
		$this->data['hoivienCT'] = $hoivienCT;
		$input2['where'] = ['group_id'=>1,'display'=>2];
		$hoivienLK = $this->gallery_model->get_list($input2);
		$this->data['hoivienLK'] = $hoivienLK;
		$this->data['temp'] = "site/templates/hoivien";
		$this->load->view('site/layout', $this->data);
	}	
}//end class