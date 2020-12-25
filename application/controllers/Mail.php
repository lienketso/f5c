<?php 

Class Mail extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('email');
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
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");


		$from_email = "admin@rubee.vn";
        $to_email = $arrSetting['email_nhantin'];
        //Load email library
       
        $this->email->from($from_email, 'Rubee.com.vn');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($data);
        //Send mail
        if($this->email->send()){
            $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
        }
        else{
        	echo $this->email->print_debugger();
            $this->session->set_flashdata("email_sent","You have encountered an error");
        }

	}

}//end class
