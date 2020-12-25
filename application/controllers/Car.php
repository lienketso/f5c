<?php 
Class Car extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('news_catnews_model');
		$this->load->model('catnews_model');
		$this->load->model('postmeta_model');
	}
	function index(){
		$input = array();
		//tour nổi bật
		$input['where'] = ['status'=>1,'lang_code'=>$this->language,'type'=>'car','display'=>1];
		$input['limit'] = [4,0];
		$listHot = $this->news_model->get_list($input);
		$this->data['listHot'] = $listHot;

		$cat['where'] = ['status'=>1,'cat_type'=>'car','lang_code'=>$this->language];
		$cat['order'] = ['is_order','asc'];
		$cat['limit'] = [10,0];
		$allCat = $this->catnews_model->get_list($cat);
		$this->data['allCat'] = $allCat;


        //input to header
        $this->data['meta_title'] = 'Bất động sản';
        $this->data['meta_keyword'] = 'bất động sản';
        $this->data['meta_description'] = '';
        $this->data['og_title'] = '';
        $this->data['og_image'] = '';
        $this->data['og_description'] ='';
        $this->data['index_link'] = '';
        $this->data['follow_link'] ='';
        $this->data['breadcrumb'] ='';
        $this->data['canonical'] = '';

		$this->data['temp'] = 'site/templates/car/index';
		$this->load->view('site/layout',$this->data);
	}


	function search(){

		$city = $this->input->get('city');
		$type = $this->input->get('type');
		$price = $this->input->get('price');
		$dientich = $this->input->get('dientich');

		$input = array();
		$input['where'] = ['status'=>1,'lang_code'=>$this->language,'type'=>'real'];
		
		if($city!=''){
			$input['where'] += ['location'=>$city];
		}
		if($type!=''){
			$input['where'] += ['loaibds'=>$type];
		}
		if($price!=''){
			if($price==1){
				$input['where'] += ['price >='=>100000000,'price <='=>500000000];
			}
			if($price==2){
				$input['where'] += ['price >='=>600000000,'price <='=>1000000000];
			}
			if($price==3){
				$input['where'] += ['price >='=>1000000000];
			}
		}
		if($dientich!=''){
			if($dientich==1){
				$input['where'] += ['dientich >='=>30,'dientich <='=>50];
			}
			if($dientich==2){
				$input['where'] += ['dientich >='=>60,'price <='=>100];
			}
			if($dientich==3){
				$input['where'] += ['dientich >='=>100];
			}
		}

		$input['order'] = ['created_at','desc'];
		$list = $this->news_model->get_list($input);
		$this->data['list'] = $list;

		$countList = count($list);
		$this->data['countList'] = $countList;

		$this->data['temp'] = 'site/templates/real/search';
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
	
	function dangky(){
		$this->load->model('contact_model');

		$name = $this->input->post('cname');
		$phone = $this->input->post('cphone');
		$email = $this->input->post('cemail');
		$title = $this->input->post('ctitle');
		$content = $this->input->post('ccontent');

		$data = array(
			'user_name'=>$name,
			'user_phone'=>$phone,
			'user_email'=>$email,
			'title' =>$title,
			'content'=>$content,
			'type'=>'car'
		);

		$this->contact_model->create($data);	
		echo 'done';die;
	}


}//end class