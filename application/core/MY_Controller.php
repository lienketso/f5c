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
				//tự động tạo sitemap.xml
				$this->sitemap();
				$this->language = language_current();
				//ngôn ngữ trên site
				$this->lang->load("key", $this->language);
				//load model
				$this->load->model('site_model');
				$this->load->model('menu_model');
				$this->load->model('gallery_model');
				$this->load->model('news_model');
				$this->load->model('tags_model');
				$this->load->model('category_model');
				$this->load->model('product_model');
				//load thư viện giỏ hàng tất cả các trang
				$this->load->library('cart');
				//menu all page
				$menunew = $this->menu_model->getAllMenuLink();
				$this->data = [
					'menunew'=>$menunew
				];
				$listSetting = $this->site_model->get_list();
				$arrSetting = [];
				foreach($listSetting as $key=>$val){
					$arrSetting[$val->setting_key] = $val->setting_value;
				}
				$this->data['arrSetting'] = $arrSetting;
				//bài viết mới
				$news['where'] = ['status'=>1,'type'=>'news'];
				$news['order'] = ['created_at'=>'desc'];
				$news['limit'] = [6,0];
				$latestNews = $this->news_model->get_list($news);
				$this->data['latestNews'] = $latestNews;
				//category all
				$this->load->model('catnews_model');
				$cat['where'] = ['status'=>1];
				$cat['order'] = ['is_order','asc'];
				$allCategory = $this->catnews_model->get_list($cat);
				$this->data['allCategory'] = $allCategory;
				//danh mục sản phẩm
				//Danh mục sản phẩm hot
				$inputs['where'] = ['status'=>1,'display'=>1,'parent'=>0,'lang_code'=>$this->language];
				$inputs['order'] = ['is_order','asc'];
				$listCatHot = $this->category_model->get_list($inputs);
				$this->data['listCatHot'] = $listCatHot;
				
				$tag['where'] = ['status'=>1,'lang_code'=>$this->language];
				$tag['limit'] = [20,0];
				$listTags = $this->tags_model->get_list($tag);
				$this->data['listTags'] = $listTags;
				//slider trang chủ
				$slider = $this->gallery_model->getGallery(1,2,18);
				$this->data['slider'] = $slider;

				$pa['where'] = ['status'=>1,'display'=>2,'type'=>'page','lang_code'=>$this->language];
				$pa['order'] = ['created_at','asc'];
				$pageAbout = $this->news_model->get_list($pa);
				$this->data['pageAbout'] = $pageAbout;

				$ps['where'] = ['status'=>1,'display'=>2];
				$ps['limit'] = [4,0];
				$productSidebar = $this->product_model->get_list($ps);
				$this->data['productSidebar'] = $productSidebar;

				$this->data['total_items'] = $this->cart->total_items();
				$cartshome = $this->cart->contents();
				$this->data['cartshome'] = $cartshome;
				$this->load->model('user_model');
				$user_login_id = $this->session->userdata('user_login_id');
				$userLog = $this->user_model->get_info($user_login_id);
				$this->data['userLog'] = $userLog;
				$Ishome = '';
				$this->data['Ishome'] = $Ishome;
				$lang = $this->language;
				$this->data['lang'] = $lang;
			}
				//pre($menunew);die;
		}
	}
	//tạo sitemap tự động
	function sitemap(){
		$this->load->model('news_catnews_model');
		$this->load->model('catnews_model');
		$this->load->library('simple_html_dom');
		$doc = new DOMDocument('1.0','utf-8');
		$doc->formatOutput = true;
		$r = $doc->createElement('urlset');
		$r->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');
		$doc->appendChild($r);
		$url = $doc->createElement('url');
		$name = $doc->createElement('loc');
		$name->appendChild(
			$doc->createTextNode(base_url())
		);
		$url->appendChild($name);
		$changefreq = $doc->createElement('changefreq');
		$changefreq->appendChild(
			$doc->createTextNode('daily')
		);
		$url->appendChild($changefreq);
		$priority = $doc->createElement('priority');
		$priority->appendChild(
			$doc->createTextNode('1.00')
		);
		$url->appendChild($priority);
		$r->appendChild($url);
		//lấy ra bài viết
		$this->load->model('news_model');
		$allnews = $this->news_model->get_list();
		if(!empty($allnews)){
			foreach($allnews as $row){
				$where = "news_id=".$row->id;
				$catnews = $this->news_catnews_model->get_info_rule($where); 
				if(!empty($catnews)){
					$cat = $this->catnews_model->get_info($catnews->cat_id);
					if(!empty($cat)){
						$catname = $cat->cat_name;
					}else{
						$catname = '';
					}
				}else{
					$catname = '';
				}
				$url = $doc->createElement('url');
				$name = $doc->createElement('loc');
				$name->appendChild(
					$doc->createTextNode(news_url($catname,$row->slug,$row->id))
				);
				$url->appendChild($name);
				$changefreq = $doc->createElement('changefreq');
				$changefreq->appendChild(
					$doc->createTextNode('daily')
				);
				$url->appendChild($changefreq);
				$priority = $doc->createElement('priority');
				$priority->appendChild(
					$doc->createTextNode('1.00')
				);
				$url->appendChild($priority);
				$r->appendChild($url);
			}
		}
		$allcatnews = $this->catnews_model->get_list();
		if(!empty($allcatnews)){
			foreach($allcatnews  as $row){
				$url = $doc->createElement('url');
				$name = $doc->createElement('loc');
				$name->appendChild(
					$doc->createTextNode(catnews_url($row->cat_name))
				);
				$url->appendChild($name);
				$changefreq = $doc->createElement('changefreq');
				$changefreq->appendChild(
					$doc->createTextNode('daily')
				);
				$url->appendChild($changefreq);
				$priority = $doc->createElement('priority');
				$priority->appendChild(
					$doc->createTextNode('1.00')
				);
				$url->appendChild($priority);
				$r->appendChild($url);
			}
		}
		$doc->save('sitemap.xml');
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