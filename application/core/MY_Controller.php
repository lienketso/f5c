<?php
Class MY_Controller extends CI_Controller{
	//Tạo biến gửi dữ liệu sang bên view
	public $language;
	public $data = array();
	function __construct(){
		//kế thừa ci controller
		parent::__construct();
		$this->load->helper('admin_helper');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$controller = $this->uri->segment(1);

		switch ($controller) {
			case 'admin': {
				//load ngon ngu
				$this->language = language_current();
				//echo $this->language;
				$this->load->helper('admin');
				$this->_check_login();
				$type = '';
				$urlSec = $this->uri->segment(2);
				$this->data['urlSec'] = $urlSec;
				$type = $this->input->get('type');
				$this->data['type'] = $type;
				$this->load->model('contact_model');
				$input = array();
				$input['where'] = array('status'=>0);
				$total_contact = count($this->contact_model->get_list($input));
				$listContact = $this->contact_model->get_list($input);
				$this->data['listContact'] = $listContact;
				$this->data['total_contact'] = $total_contact;
				$this->load->model('admin_model');
				$id_admin = $this->session->userdata('admin_id');
				$accoutname = $this->admin_model->get_info($id_admin);
				$this->data['accoutname'] = $accoutname;
				//list post view +
				$this->load->model('news_model');
				$where['where'] = 'count_view >= 10';
				$where['order'] = ['count_view','desc'];
				$where['limit'] = [5,0];
				$listView = $this->news_model->get_list($where);
				$this->data['listView'] = $listView;

				$this->load->model('transaction_model');
				$dh['where'] = [];
				$dh['order'] = ['id','desc'];
				$dh['limit'] = [5,0];
				$donhangMoi = $this->transaction_model->get_list($dh);
				$this->data['donhangMoi'] = $donhangMoi;

				//Danh mục sản phẩm hot

				$lang = $this->language;
				$this->data['lang'] = $lang;
				break;
			}
			default:
			{
				$message = $this->session->flashdata('message');
				$this->data['message'] = $message;
				//lưu cache toàn bộ trang website trong 20 phút
				//$this->output->cache(20);
				$this->load->helper("image");
				$this->load->library('simple_html_dom');

				$this->language = language_current();
				//ngôn ngữ trên site
				$this->lang->load("key", $this->language);
				//load model
				$this->load->model('menu_model');
				$this->load->model('site_model');
				$this->load->model('news_model');
				$this->load->model('category_model');
				$this->load->model('product_model');
				$this->load->model('catnews_model');
				$this->load->model('support_model');
				$this->load->model('support_group_model');
				//load thư viện giỏ hàng tất cả các trang
				$this->load->library('cart');
				//menu all page
				$mn['where'] = ['parent_id'=>0,'location'=>3];
				$mn['order'] = ['sort_order','asc'];
				$mn['limit'] = [5,0];
				$menuPage = $this->menu_model->get_list($mn);
				$this->data['menuPage'] = $menuPage;

				$s['order'] = ['key','asc'];
				$listSetting = $this->site_model->get_list($s);
				$arrSetting = [];
				foreach($listSetting as $key=>$val){
					$arrSetting[$val->key] = $val->value;
				}
				$this->data['arrSetting'] = $arrSetting;
				//bài viết mới
				
				$allCategory = $this->category_model->getCategoryAllsub(0);
				$this->data['allCategory'] = $allCategory;

				$c['where'] = ['parent_id'=>0];
				$c['order'] = ['sort_order','asc'];
				$categoryParent = $this->category_model->get_list($c);
				$this->data['categoryParent'] = $categoryParent;

				//Danh mục tin chân trang
				$dmt['where'] = ['parent_id'=>0];
				$dmt['order'] = ['sort_order','asc'];
				$dmt['limit'] = [5,0];
				$listDanhmuctin = $this->catnews_model->get_list($dmt);
				$this->data['listDanhmuctin'] = $listDanhmuctin;
				//support all page
				$sp['where'] = [''];
				$sp['order'] = ['sort_order','asc'];
				$GroupSupport = $this->support_group_model->get_list($sp);
				$this->data['GroupSupport'] = $GroupSupport;
				//search keyword total
				$se['where'] = [];
				$se['order'] = ['total','desc'];
				$se['limit'] = [20,0];
				$this->load->model('search_model');
				$listSearch = $this->search_model->get_list($se);
				$this->data['listSearch'] = $listSearch;
				
				$cart_items = $this->cart->total_items();
				$this->data['cart_items'] = $cart_items;

				$Ishome = '';
				$this->data['Ishome'] = $Ishome;
				$lang = $this->language;
				$this->data['lang'] = $lang;
			}
				//pre($menunew);die;
		}
	}

		//Phân quyền tài khoản
	private function _check_login(){
		$controller = $this->uri->rsegment('1');
		$controller = strtolower($controller);
		$login = $this->session->userdata('login');
		//nếu không tồn tại session 'login' chuyển về trang login.php
		if(!$login && $controller!='login'){
			redirect(admin_url('login'));
		}
		//đã login rồi không được login nữa, chuyển về trang admin home
		if($login && $controller == 'login'){
			redirect(admin_url('home'));
		}
		elseif(!in_array($controller, array('home','login'))){
			//lay ra admin id dang nhap
			$admin_id = $this->session->userdata('admin_id');
			//lay ra admin_root (admin chinh ko bi phan quyen co id = 6)
			$admin_root = $this->config->item('root_admin');
			//neu admin dang nhap khac voi admin root thi kiem tra quyen, nguoc lai ko kiem tra
			if($admin_id != $admin_root){
			//kiem tra quyen
				$permission_admin = $this->session->userdata('permission');
				$controller = $this->uri->rsegment(1);
				$action = $this->uri->rsegment(2);
				$check = true;
				if(!$permission_admin->{$controller}){
					$check = false;
				}
				$permission_action = $permission_admin->{$controller};
				if(!in_array($action, $permission_action)){
					$check = false;
				}
				if(!$check){
					$this->session->set_flashdata('message', 'Bạn không có quyền truy cập, liên hệ admin !');
					redirect(base_url('admin'));
				}
			}
		}
	}
}