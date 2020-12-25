<?php 
Class Tour extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('catnews_model');
	}
	function index(){
		$this->load->model('postmeta_model');
		$input = array();
		$this->load->model('news_catnews_model');
		//tour nổi bật
		$input['where'] = ['status'=>1,'lang_code'=>$this->language,'type'=>'tour','display'=>1];
		$input['limit'] = [4,0];
		$listHot = $this->news_model->get_list($input);
		$this->data['listHot'] = $listHot;

		$cat['where'] = ['status'=>1,'cat_type'=>'tour','lang_code'=>$this->language];
		$cat['order'] = ['is_order','asc'];
		$cat['limit'] = [10,0];
		$allCatTour = $this->catnews_model->get_list($cat);
		$this->data['allCatTour'] = $allCatTour;

        //input to header
        $this->data['meta_title'] = 'Các đề án';
        $this->data['meta_keyword'] = 'Các đề án';
        $this->data['meta_description'] = '';
        $this->data['og_title'] = 'Các đề án';
        $this->data['og_image'] = '';
        $this->data['og_description'] ='';
        $this->data['index_link'] = 'index';
        $this->data['follow_link'] ='dofollow';
        $this->data['breadcrumb'] ='';
        $this->data['canonical'] = '';

		$this->data['temp'] = 'site/templates/tour/index';
		$this->load->view('site/layout',$this->data);
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

		$title = 'DONGTHUCREAL.COM';
		$config = array();
		$config['protocol'] = $arrSetting['smtp_protocol'];
		$config['smtp_host'] = $arrSetting['smtp_host'];
		$config['smtp_port'] = $arrSetting['smtp_port'];
		$config['smtp_timeout']=60;
		$config['smtp_user'] = $arrSetting['smtp_user'];
		$config['smtp_pass'] = $arrSetting['smtp_pass'];
		$config['smtp_crypto'] = 'tls';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$from_email = "thanhan.rubee@gmail.com";
		$to_email = $arrSetting['email_nhantin'];
        //Load email library
		$this->email->from($from_email, 'dongthucreal.com');
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($data);
        //Send mail
		if($this->email->send()){
			$this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
			echo 'done';die;
		}
		else{
			echo $this->email->print_debugger();die;
			$this->session->set_flashdata("email_sent","You have encountered an error");
		}
	}
	
	function booktour(){
		$this->load->model('transaction_model');

		$service_id = $this->input->post('tourid');
		$type = 'tour';
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$content = $this->input->post('content');
		$qty_man = $this->input->post('qty_man');
		$qty_child = $this->input->post('qty_child');
		
		$qty = [
			'sl_nguoilon'=>$qty_man,
			'sl_treem'=>$qty_child
		];
		$qty = json_encode($qty);

		$data = array(
			'service_id'=> $service_id,
			'type'=> $type,
			'name' => $name,
			'phone'=>$phone,
			'email'=>$email,
			'content' =>$content,
			'message'=>$qty
		);
		$this->transaction_model->create($data);	
		echo 'Gửi thông tin thành công ! chúng tôi sẽ liên hệ sớm nhất';die;
	}


}//end class