<?php
Class Managejob extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('recruitment_model');
	}
	function index(){
		$this->load->library('pagination');
		$company_id = $this->session->userdata('company_id_login');
		$input = array();
		$input['where'] = array('company_id' => $company_id );
		$total_row = $this->recruitment_model->get_total($input);
		$this->data['total_row'] = $total_row;

		$config = array();
		$config['base_url']    = home_url('nha-tuyen-dung/danh-sach-tin-dang');
		$config['total_rows']  = $total_row;
		$config['per_page']    = 10;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="list-unstyled flex no-column items-center">';
    	$config['full_tag_close'] = '</ul>';
    	$config['num_tag_open'] = '<li class="button linkcss">';
    	$config['num_tag_close'] = '</li>';
    	$config['first_link'] = '&laquo; First';
    	$config['first_tag_open'] = '<li class="prev page">';
    	$config['first_tag_close'] = '</li>';
    	$config['cur_tag_open'] = '<li class="active button">';
    	$config['cur_tag_close'] = '</li>';
		$config['next_link']   = '<span class="button">Trang kế <i class="ion-ios-arrow-right"></i></span>';
		$config['prev_link']   = '<span class="button"><i class="ion-ios-arrow-left"></i> Quay lại</span>';
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(3);
		$segment = intval($segment);
		$this->load->model('map_candidate_recruitment_model');


		$input["limit"] = array($config['per_page'], $segment);
		//$input['where'] = array('company_id' => $company_id );
		$info_job = $this->recruitment_model->get_list($input);
		$this->data['info_job'] = $info_job;
		
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;


		$this->data['temp'] = 'site/managejob/index';
		$this->load->view('site/layout',$this->data);
	}

	function edit(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);

		$job_info = $this->recruitment_model->get_info($id);
		$this->data['job_info'] = $job_info;

		//cap bac
		$this->load->model('level_model');
		$level = $this->level_model->get_list();
		$this->data['level'] = $level;
		//loai công việc
		$this->load->model('job_type_model');
		$jobtype = $this->job_type_model->get_list();
		$this->data['jobtype'] = $jobtype;
		//mức lương
		$this->load->model('salary_model');
		$salary = $this->salary_model->get_list();
		$this->data['salary'] = $salary;
		//Kinh nghiệm
		$this->load->model('require_experience_model');
		$experience = $this->require_experience_model->get_list();
		$this->data['experience'] = $experience;
		//Bằng cấp
		$this->load->model('literacy_model');
		$literacy = $this->literacy_model->get_list();
		$this->data['literacy'] = $literacy;
		//Danh mục nghành nghề
		$this->load->model('career_model');
		$career = $this->career_model->get_list();
		$this->data['career'] = $career;
		//địa điểm làm việc
		$this->load->model('city_model');
		$city = $this->city_model->get_list();
		$this->data['city'] = $city;

		//thực hiện sửa dữ liệu
		if($this->input->post()){
			$this->form_validation->set_rules('title','Chức danh','required|min_length[6]');
			$this->form_validation->set_rules('amount','Số lượng','required|numeric');
			$this->form_validation->set_rules('level_id','Cấp bậc','required');
			$this->form_validation->set_rules('type_id','Loại hình công việc','required');
			$this->form_validation->set_rules('salary_id','Mức lương tháng','required');
			$this->form_validation->set_rules('require_experience_id','Kinh nghiệm làm việc','required');
			$this->form_validation->set_rules('literacy_id','Bằng cấp','required');
			$this->form_validation->set_rules('career_id','Lĩnh vực cần tuyển','required');
			if($this->form_validation->run()){
				$title = $this->input->post('title');
				$cat_name = slug($title);
				$amount = $this->input->post('amount');
				$level_id = $this->input->post('level_id');
				$salary_id = $this->input->post('salary_id');
				$type_id = $this->input->post('type_id');
				$require_experience_id = $this->input->post('require_experience_id');
				$literacy_id = $this->input->post('literacy_id');
				$career_id = $this->input->post('career_id');
				$gender = $this->input->post('gender');
				$city_id = $this->input->post('city_id');
				$content = $this->input->post('content');
				$benefit = $this->input->post('benefit');
				$job_requirement = $this->input->post('job_requirement');
				$profile = $this->input->post('profile');
				$end_date = $this->input->post('end_date');
				$end_date = date_to_int($end_date);
				$language = $this->input->post('language');
				$company_id = $this->session->userdata('company_id_login');

				$data = array(
					'title' => $title,
					'cat_name'=>$cat_name,
					'amount' => $amount,
					'level_id' => $level_id,
					'salary_id' => $salary_id,
					'require_experience_id' => $require_experience_id,
					'literacy_id' => $literacy_id,
					'career_id' => $career_id,
					'type_id' => $type_id,
					'gender' => $gender,
					'city_id' => $city_id,
					'content' => $content,
					'benefit' => $benefit,
					'job_requirement' => $job_requirement,
					'profile' => $profile,
					'end_date' => $end_date,
					'language' => $language,
					'company_id' => $company_id,

					);
				$this->recruitment_model->update($id,$data);
				$this->session->set_flashdata('message', 'Sửa thông tin tuyển dụng thành công !');
				redirect(base_url('nha-tuyen-dung/danh-sach-tin-dang'));
			}
		}

		$this->data['temp'] = 'site/managejob/edit';
		$this->load->view('site/layout',$this->data);
	}

}//end class