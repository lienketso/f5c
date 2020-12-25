<?php 
Class Forum extends MY_Controller{
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
		$input['where'] = ['status'=>1,'lang_code'=>$this->language,'cat_type'=>'forum','parent'=>0];
		$input['order'] = ['is_order'=>'asc'];
		$listForum = $this->catnews_model->get_list($input);
		$this->data['listForum'] = $listForum;
        //input to header
        $this->data['meta_title'] = 'Diễn đàn';
        $this->data['meta_keyword'] = 'Diễn đàn cfv';
        $this->data['meta_description'] = '';
        $this->data['og_title'] = 'Diễn đàn cfv';
        $this->data['og_image'] = '';
        $this->data['og_description'] ='';
        $this->data['index_link'] = '';
        $this->data['follow_link'] ='';
        $this->data['breadcrumb'] ='';
        $this->data['canonical'] = '';

		$this->data['temp'] = 'site/forum/index';
		$this->load->view('site/layout',$this->data);
	}

	function category(){
		$this->load->model('comment_model');

		$catname = $this->uri->rsegment(3);
		$where = 'cat_name="'.$catname.'"';
		$infoCat = $this->catnews_model->get_info_rule($where);
		$this->data['infoCat'] = $infoCat;

		$catcha = $this->catnews_model->get_info($infoCat->parent);
		$this->data['catcha'] = $catcha;	
		//input to header
		$this->load->model('catmeta_model');
		$meta['where'] = ['cat_id'=>$infoCat->id];
		$listCatmeta = $this->catmeta_model->get_list($meta);
		$arrMeta = [];
		foreach($listCatmeta as $key=>$val){
                $arrMeta[$val->meta_key] = $val->meta_value;
        }
        $this->data['meta_title'] = $arrMeta['meta_title'];
        $this->data['meta_keyword'] = $arrMeta['meta_keyword'];
        $this->data['meta_description'] = $arrMeta['meta_description'];
        $this->data['og_title'] = $arrMeta['og_title'];
        $this->data['og_image'] = $arrMeta['og_image'];
        $this->data['og_description'] = $arrMeta['og_description'];
        $this->data['index_link'] = $arrMeta['index_link'];
        $this->data['follow_link'] = $arrMeta['follow_link'];
        $this->data['breadcrumb'] = $arrMeta['breadcrumb'];
        $this->data['canonical'] = $arrMeta['canonical'];
        if(!empty($catcha)){
        	$c['where'] = ['status'=>1,'parent'=>$catcha->id];
        }else{
        $c['where'] = ['status'=>1,'parent'=>$infoCat->id];
    	}
        $c['order'] = ['is_order','asc'];
        $chuyende = $this->catnews_model->get_list($c);
        $this->data['chuyende'] = $chuyende;

        $this->load->library('pagination');
        $input = [];
        $input['where'] = ['status'=>1,'cat_id'=>$infoCat->id];
        $total_row = $this->news_catnews_model->get_total($input);
        $this->data['total_row'] = $total_row;

        $config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = base_url('forum/'.$infoCat->cat_name);
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows']  = $total_row;
		$config['per_page']    = 20;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="paginat">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = '<i class="glyphicon glyphicon-menu-left"></i>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page">';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Tiếp';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="glyphicon glyphicon-menu-left"></i> sau';
		$config['prev_tag_open'] = '<li class="prev disabled">';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(3);
		$segment = intval($segment);
		$input['order'] = ['created_at','desc'];
		$input["limit"] = array($config['per_page'], $segment);

        $listMulti = $this->news_catnews_model->get_list($input);
		$list = $this->catnews_model->getNews($listMulti);
		$this->data['list'] = $list;

		$this->data['temp'] = 'site/forum/category';
		$this->load->view('site/layout',$this->data);
	}

	function post(){

		$topic = $this->input->get('topic');
		$infoTopic = $this->catnews_model->get_info($topic);
		if(empty($infoTopic)){
			redirect();
		}

		$user_edit_id = $this->session->userdata('user_login_id');

		$this->data['infoTopic'] = $infoTopic;
		$catcha = $this->catnews_model->get_info($infoTopic->parent);
		$this->data['catcha'] = $catcha;
		if(!empty($catcha)){
        	$c['where'] = ['status'=>1,'parent'=>$catcha->id];
        }else{
        	$c['where'] = ['status'=>1,'parent'=>$infoTopic->id];
    	}
        	$c['order'] = ['is_order','asc'];
        $chuyende = $this->catnews_model->get_list($c);
        $this->data['chuyende'] = $chuyende;

        if($this->input->post()){
        	$this->form_validation->set_rules('title','Tiêu đề','required|min_length[6]');
			$this->form_validation->set_rules('content','Nội dung chủ đề','required|min_length[6]');
			if($this->form_validation->run()){
				$title = $this->input->post('title');
				$slug = slug($title);
				$content = $this->input->post('content');
				$data = [
					'title'=>$title,
					'slug'=>$slug,
					'content'=>$content,
					'cat_id'=>$infoTopic->id,
					'type'=>'forum',
					'member_id'=>$user_edit_id
				];
				$this->news_model->create($data);
				$insertId = $this->db->insert_id();

				$data_c = ['cat_id'=>$infoTopic->id,'news_id'=>$insertId,'type'=>'forum'];
				$this->news_catnews_model->create($data_c);

				redirect(base_url('forum/thread?id='.$insertId));
			}
        }


		$this->data['meta_title'] = 'Tạo chủ đề';
        $this->data['meta_keyword'] = '';
        $this->data['meta_description'] = '';
        $this->data['og_title'] = 'Tạo chủ đề';
        $this->data['og_image'] = '';
        $this->data['og_description'] = '';
        $this->data['index_link'] = '';
        $this->data['follow_link'] = '';
        $this->data['breadcrumb'] = '';
        $this->data['canonical'] = '';

		$this->data['temp'] = 'site/forum/post';
		$this->load->view('site/layout',$this->data);
	}

	function thread(){
		$threadid = $this->input->get('id');
		$info = $this->news_model->get_info($threadid);
		$this->data['info'] = $info;

		$rule = "news_id=".$info->id;
		$infoNC = $this->news_catnews_model->get_info_rule($rule);
		if(!empty($infoNC)){
			$infoTopic = $this->catnews_model->get_info($infoNC->cat_id);
		}
		
		$this->data['infoTopic'] = $infoTopic;

		$this->load->model('user_model');
		$user_online_id = $this->session->userdata('user_login_id');
		$user_online = $this->user_model->get_info($user_online_id);
		$this->data['user_online'] = $user_online;

		$userInfo = $this->user_model->get_info($info->member_id);
		$this->data['userInfo'] = $userInfo; 


		//update view
		$data = ['view'=>$info->view+1];
		$this->news_model->update($info->id,$data);

		$this->load->model('comment_model');

		//post comment
		if($this->input->post()){
			$this->form_validation->set_rules('comment','Nội dung chủ đề','required|min_length[6]');
			if($this->form_validation->run()){
				$comment = $this->input->post('comment');
				$data = [
					'content'=>$comment,
					'post_id'=>$info->id,
					'member_id'=>$user_online_id
				];
				$this->comment_model->create($data);
				redirect(base_url('forum/thread?id='.$info->id));
			}
		}
		$this->load->library('pagination');
		$cm['where'] = ['post_id'=>$info->id];
		$total_row = $this->comment_model->get_total($cm);
		$this->data['total_row'] = $total_row;

		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = base_url('forum/thread?id='.$info->id);
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows']  = $total_row;
		$config['per_page']    = 20;
		$config['uri_segment'] = 2;
		$config['full_tag_open'] = '<ul class="paginat">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = '<i class="glyphicon glyphicon-menu-left"></i>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page">';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Tiếp';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="glyphicon glyphicon-menu-left"></i> sau';
		$config['prev_tag_open'] = '<li class="prev disabled">';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(2);
		$segment = intval($segment);
		$cm['order'] = ['created_at','desc'];
		$cm["limit"] = array($config['per_page'], $segment);

		$commentList = $this->comment_model->get_list($cm);
		$this->data['commentList'] = $commentList;


		$this->data['temp'] = 'site/forum/thread';
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