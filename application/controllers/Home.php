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
		$this->load->model('manufac_model');
		//slider top
		$this->load->model('slide_model');
		$sl['order'] = ['sort_order','asc'];
		$slideTop = $this->slide_model->get_list($sl);
		$this->data['slideTop'] = $slideTop;

		//Sản phẩm được xem nhiều
		$this->load->model('product_model');
		//$xn['where'] = ['hide'=>0];
		$xn['order'] = ['count_view','desc'];
		$xn['limit'] = [16,0];
		$listXemnhieu = $this->product_model->get_list($xn);
		$this->data['listXemnhieu'] = $listXemnhieu;
		//Danh mục sản phẩm trang chủ
		$this->load->model('category_model');
		$ca = array();
		$ca['where'] = ['parent_id'=>0,'show_home'=>'1'];
		$ca['order'] = ['sort_order','asc'];
		$ca['limit'] = [15,0];
		$listCatHome = $this->category_model->get_list($ca);
		$this->data['listCatHome'] = $listCatHome;
		//pre($listCatHome);die;
		//Tin tức hot
		$this->load->model('news_model');
		$th['where'] = ['feature!='=>0];
		$th['order'] = ['feature','desc'];
		$th['limit'] = [3,0];
		$listTinhot = $this->news_model->get_list($th);
		$this->data['listTinhot'] = $listTinhot;
		//Tin tức mới
		$tm['where'] = [];
		$tm['order'] = ['created','desc'];
		$tm['limit'] = [3,0];
		$listTinmoi = $this->news_model->get_list($tm);
		$this->data['listTinmoi'] = $listTinmoi;

		$this->load->model('ads_banner_model');
		//banner dưới slider
		$bn['where'] = ['ads_location_id'=>3];
		$bn['order'] = ['sort_order','asc'];
		$bn['limit'] = [2,0];
		$bannerTop = $this->ads_banner_model->get_list($bn);
		$this->data['bannerTop'] = $bannerTop;
		//banner bên phải slide
		$ps['where'] = ['ads_location_id'=>12];
		$ps['order'] = ['sort_order','asc'];
		$ps['limit'] = [3,0];
		$bannerRight = $this->ads_banner_model->get_list($ps);
		$this->data['bannerRight'] = $bannerRight;

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
		$term = $this->input->get('term');
		$cat = $this->input->get('cat');
		if(isset($_GET['term'])){
			$result = $this->product_model->search_product($term);
		
		
				foreach($result as $pr){
					echo '<a class="list-group-item item-sp-search clearfix" title="'.$pr->name.'" href="'.product_url(slug($pr->name),$pr->id).'">
	            	<img class="img-sp-search" alt="'.$pr->name.'" src="'.url_tam($pr->image_name).'">
	            	<div class="caption">
	            		<span class="name-sp-search">'.$pr->name.'</span>
	            		<div class="price">
	            			<span class="amount">'.number_format($pr->price).' đ<span></span></span>
	            		</div>
	            	</div>
	            </a>';
				}
				die;
			
		}
	}

	function search(){
		$this->load->model('product_model');

		$cat = $this->input->get('cat');
		$text_search = $this->input->get('text-search');
		
		$this->data['text_search'] = $text_search;
		$input = array();
		$input['where'] = ['hide'=>'0'];
		$input2['where'] = ['hide'=>'0'];
		if($text_search){
			$input['like'] = ['name',$text_search];
			$input['like'] = ['name_no_spaces',$text_search];
			$input2['like'] = ['name',$text_search];
		}
		if($cat && $cat>0){
			$arrId = [];
			$c['where'] = ['parent_id'=>$cat];
			$listCat = $this->category_model->get_list($c);
			foreach($listCat as $chai){
				array_push($arrId,$chai->id);
				$cc['where'] = ['parent_id'=>$chai->id];
				$listCatBa = $this->category_model->get_list($cc);
				if(!empty($listCatBa) && count($listCatBa)>0){
					foreach($listCatBa as $catba){
						array_push($arrId,$catba->id);
					}
				}
			}
			
			$input['where_in'] = ['cat_id',$arrId];
			$input2['where_in'] = ['cat_id',$arrId];
		}
		
		$lists = $this->product_model->get_list($input);
		$numrows = count($lists);
		$this->data['numrows'] = $numrows;
		$this->data['text_search'] = $text_search;

		$this->load->library('pagination');
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = base_url('search.html');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows']  = $numrows;
		$config['per_page']    = 20;
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

		$list = $this->product_model->get_list($input);
		$this->data['numrows'] = $numrows;
		$this->data['list'] = $list; 

  		$nowUrl = http_build_query($_GET, '', "&");
  		$this->data['nowUrl'] = $nowUrl;

  		//sản phẩm xem nhiều theo kết quả tìm kiếm
  		$input2['order'] = ['count_view','desc'];
  		$input2['limit'] = [7,0];
  		$listXN = $this->product_model->get_list($input2);
  		$this->data['listXN'] = $listXN;



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