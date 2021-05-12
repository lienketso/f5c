<?php
Class Product extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('product_category_model');
		$this->load->model('productmeta_model');
		$this->load->model('user_model');
	}

	function selectpk(){
		$keyword= $this->input->post('keyword');
		$input['like'] = ['name',$keyword];
		$input['limit'] = [10,0];
		$product = $this->product_model->get_list($input);
		foreach($product as $row){
			echo "<option value='".$row->id."'>".$row->name."</option>";
		}
		
		die;
	}

	function index(){
		//Tạo thông báo 
		$this->load->library('pagination');
		$input = array();
		$input['where'] = [];
		$id = $this->input->get('id');
		if($id){
			$input['where'] = ['id'=>$id];
		}
		//kiểm tra xem có lọc sản phẩm không, thêm điều kiện
		$name = $this->input->get('name');
		$category_id = $this->input->get('category_id');
		$vat = $this->input->get('vat');
		$admin_edit = $this->input->get('admin_edit');
		$admin_add = $this->input->get('admin_add');
		$model = $this->input->get('model');
		if($name){
			$input['like'] = array('name', $name);
		}
		if($category_id && $category_id!=0){
			$input['where'] += ['cat_id'=>$category_id];
		}
		if($admin_edit){
			$input['where'] += ['admin_edit'=>$admin_edit];
		}
		if($admin_add){
			$input['where'] += ['admin_update'=>$admin_add];
		}
		if($model){
			$input['where'] += ['model'=>$model];
		}
		if($vat!='' && $vat>0){
			$input['where'] += ['vat>='=>1];
		}elseif($vat!='' && $vat==0){
			$input['where'] += ['vat'=>0];
		}
		//lấy ra tổng tất cả các sản phẩm
		$total_row = $this->product_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$config = array();
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['base_url']    = admin_url('product/index');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['total_rows']  = $total_row;
		$config['per_page']    = 15;
		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<ul class="pagination pagination-flat pagination-success">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$config['first_link'] = '<i class="mdi mdi-chevron-left"></i>';
		$config['last_link'] = '<i class="mdi mdi-chevron-right"></i>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '<i class="mdi mdi-chevron-right"></i>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="mdi mdi-chevron-left"></i>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(4);
		$segment = intval($segment);
		$input["limit"] = array($config['per_page'], $segment);
		

		$this->data['vat'] = $vat;

		$this->data['name'] = $name;
		$this->data['category_id'] = $category_id;
		$this->data['admin_edit'] = $admin_edit;
		$this->data['admin_add'] = $admin_add;
		$this->data['xuatxu'] = $model;

		//lấy danh sách sản phẩm
		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;	

		$ca['order'] = ['sort_order','asc'];
		$listCategory = $this->category_model->get_list($ca);
		$this->data['listCategory'] = $listCategory;

		$this->load->model('admin_model');
		$listUser = $this->admin_model->get_list();
		$this->data['listUser'] = $listUser;

		$this->load->model('countries_model');
		$co['order'] = ['name','asc'];
		$listCountries = $this->countries_model->get_list($co);
		$this->data['listCountries'] = $listCountries;

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = "admin/product/index";
		$this->load->view("admin/main", $this->data);
	}

	function status(){
		$id = $this->input->post('id');
		$hide = $this->input->post('hide');

		if($hide=='0'){
			$on = '1';
		}
		else{
			$on = '0';
		}
		
		$data = array(
			'hide'=>$on
		);
		$this->product_model->update($id,$data);		
		die;
	}

	function feature(){
		$id = $this->input->post('id');
		$hide = $this->input->post('feature');

		if($hide==1){
			$feature = '0';
		}
		if($hide==0){
			$feature = '1';
		}
		
		$data = array(
			'feature'=>$feature
		);
		$this->product_model->update($id,$data);	
		die;
	}
	function vatStatus(){
		$id = $this->input->post('id');
		$status = $this->input->post('vatstatus');

		if($status==1){
			$show = '0';
		}
		if($status==0){
			$show = '1';
		}
		
		$data = array(
			'show_vat'=>$show
		);
		$this->product_model->update($id,$data);	
		die;
	}
//kiểm tra callback username
	function check_title(){
		$action = $this->uri->rsegment(2);
		$slug = $this->input->post('name');
		$where = array('name'=> $slug);
		$check = true;
		if($action == 'edit'){
			$info = $this->data['info'];
			if($info->name == $slug){
				$check = false;
			}
		}
		if($check && $this->product_model->check_exits($where)){
//trả về thông báo lỗi
			$this->form_validation->set_message(__FUNCTION__,'Sản phẩm đã tồn tại !');
			return false;
		}
		else{
			return true;
		}
	}
	function add(){

		$this->load->model('manufac_model');
		$this->load->model('countries_model');
		$this->load->model('file_model');

		$input['where'] = array('status'=>1);
		$input['order'] = array('id','desc');
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề','required|min_length[2]|callback_check_title');
			$this->form_validation->set_rules('cat_id','Danh mục','required');
			if($this->form_validation->run()){
				
				$name = $this->input->post('name');
				$slug = $this->input->post('friendly_url');
				if($slug==''){
					$slug = slug($name);
				}else{
					$slug = slug($slug);
				}
				$cat_id = $this->input->post('cat_id');
				$price = $this->input->post('price');
				$price = str_replace(',','',$price);
				$price_other = $this->input->post('price_other');
				$price_other = str_replace(',','',$price_other);
				$vat = $this->input->post('vat');
				if($vat==''){
					$vat = 0;
				}
				$video_url = $this->input->post('video_url');
				$show_vat = $this->input->post('show_vat');
				$thongso = $this->input->post('options_cat');
				$content = $this->input->post('content');
				$baohanh = $this->input->post('warranty');
				$sort_order = $this->input->post('sort_order');	
				$manufac_id = $this->input->post('manufac_id');	
				$model = $this->input->post('model');	
				$hide = $this->input->post('hide');
				$feature = $this->input->post('feature');
				$tieubieu = $this->input->post('tieubieu');
				$image_name = $this->input->post('image_name');	
				$image_name = str_replace(base_url('upload/public/'),'',$image_name);
				$site_title = $this->input->post('site_title');	
				$meta_key = $this->input->post('meta_key');	
				$meta_desc = $this->input->post('meta_desc');	
				$alt_image = $this->input->post('alt_image');
				$status = $this->input->post('status');
				$sale = $this->input->post('sale');

				//load thư viện uploads ảnh
				$this->load->library('upload_library');
				$image_list = $this->input->post('image_list');
				//uploads nhiều ảnh kèm theo
				$upload_path = 'upload/public/media';
				$image_list = array();
				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
				
				//phụ kiện kèm theo
				$products = $this->input->post('products[]');
				if($products){
					$products = serialize($products);
				}else{
					$products = '';
				}
				$option_name = $this->input->post('option_name[]');
				$option_value= $this->input->post('option_value[]');
				$option_products = array();
				if(is_array($option_name) && is_array($option_value))
				{
					foreach ($option_name as $k => $v)
					{
						if(isset($v) && $v != '' && (isset($option_value[$k]) && $option_value[$k]!= ''))
						{
							$option_products[$v] =  $option_value[$k];
						}
					}
				}
				$options = serialize($option_products);
				//seo tags
				$tags = $this->input->post('tags');
				if($tags==''){
					$tags = $name;
				}
				$cat_tags = slug($tags);
				$meta_des = $this->input->post('meta_des');
				if($meta_des==''){
					$meta_des = sub($content,200);
				}
				//end seo tag
				$user_update = $this->session->userdata('userlogin');
				$data = array(
					'name'=> $name,
					'friendly_url' => $slug,
					'cat_id'=>$cat_id,
					'image_name' => $image_name,
					'manufac_id'=>$manufac_id,
					'model'=>$model,
					'price'=>$price,
					'vat'=>$vat,
					'show_vat'=>$show_vat,
					'price_other' => $price_other,
					'options_cat'=>$thongso,
					'video_url' => $video_url,
					'content'=>$content,
					'hide'=>$hide,
					'feature'=>$feature,
					'tieubieu'=>$tieubieu,
					'warranty' => $baohanh,
					'sort_order'=>$sort_order,
					'site_title'=>$site_title,
					'meta_key'=>$meta_key,
					'meta_desc'=>$meta_desc,
					'alt_image' => $alt_image,
					'sale'=>$sale,
					'products'=>$products,
					'options'=>$options,
					'admin_update'=>$user_update->username,
					'status'=>$status,
					'created'=>now()
				);
				$product = $this->product_model->create($data);
				//add category and product
				$product_id = $this->db->insert_id();
				if($image_list && !empty($image_list)){
					foreach($image_list as $img){
						$data_2 = [
							'table_id'=>$product_id,
							'table'=>'product-images',
							'file_name'=>'media/'.$img,
							'created'=> now()
						];
						$this->file_model->create($data_2);
					}
				}
				//end postmeta insert
				// tạo nội dung thông báo
				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				//chuyển sang trang danh sách admin
				redirect(admin_url('product'));
			}
		}

		$this->data['temp'] = "admin/product/add";
		$this->load->view("admin/main", $this->data);
	}

	function upload_multi(){
		$this->load->model('file_model');
		$productid = $this->input->post('productid');
		$countfiles = count($_FILES['files']['name']);
		$upload_location = "upload/public/media/";
		$files_arr = array();
		// Loop all files
		for($index = 0;$index < $countfiles;$index++){
			if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
				$filename = $_FILES['files']['name'][$index];
				$newfilename= date('dmYHis-').str_replace(" ", "", $filename);
				$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
				$valid_ext = array("png","jpeg","jpg");
				if(in_array($ext, $valid_ext)){
					$path = $upload_location.$newfilename;
					if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
						$files_arr[] = $newfilename;
					}
				}
				//insert to file table
				$data = [
					'file_name'=>'media/'.$newfilename,
					'orig_name'=>$filename,
					'table'=>'product',
					'table_id'=>$productid,
					'created'=>now()
				];
				$this->file_model->create($data);
			}
		}

		echo json_encode($files_arr);
		die;
	}
	function deleteFile(){
		$this->load->model('file_model');
		$img_id = $this->input->post('img_id');
		$link = $this->input->post('link');
		if(file_exists($link)){
			unlink($link);
		}
		$this->file_model->deleteOne($img_id);
		die;
	}

	function edit(){

		$this->load->model('manufac_model');
		$this->load->model('countries_model');
		$this->load->model('file_model');

		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->product_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại sản phẩm này');
			redirect(admin_url('product'));
		}
		

		$this->data['info'] = $info;

		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên sản phẩm','required|min_length[4]');
			$this->form_validation->set_rules('cat_id','Danh mục','required');
			if($this->form_validation->run()){
				//tiến hành thêm vào csdl		
				$name = $this->input->post('name');	
				$slug = $this->input->post('friendly_url');
				if($slug==''){
					$slug = slug($name);
				}else{
					$slug = slug($slug);
				}
				//echo $cat_name;die;
				$cat_id = $this->input->post('cat_id');
				$price = $this->input->post('price');
				$price = str_replace(',','',$price);
				$price_other = $this->input->post('price_other');
				$price_other = str_replace(',','',$price_other);
				$vat = $this->input->post('vat');
				if($vat==''){
					$vat = 0;
				}
				$show_vat = $this->input->post('show_vat');
				$thongso = $this->input->post('options_cat');
				$video_url = $this->input->post('video_url');
				$content = $this->input->post('content');
				$baohanh = $this->input->post('warranty');
				$sort_order = $this->input->post('sort_order');	
				$manufac_id = $this->input->post('manufac_id');	
				$model = $this->input->post('model');	
				$hide = $this->input->post('hide');
				$feature = $this->input->post('feature');
				$tieubieu = $this->input->post('tieubieu');
				$image_name = $this->input->post('image_name');	
				$image_name = str_replace(base_url('upload/public/'),'',$image_name);

				$site_title = $this->input->post('site_title');	
				$meta_key = $this->input->post('meta_key');	
				$meta_desc = $this->input->post('meta_desc');	
				$alt_image = $this->input->post('alt_image');
				$status = $this->input->post('status');
				$sale = $this->input->post('sale');
				$image_list = $this->input->post('image_list');
				$products = $this->input->post('products[]');
				if($products){
					$products = serialize($products);
				}else{
					$products = '';
				}
				$option_name = $this->input->post('option_name[]');
				$option_value= $this->input->post('option_value[]');
				$option_products = array();
				if(is_array($option_name) && is_array($option_value))
				{
					foreach ($option_name as $k => $v)
					{
						if(isset($v) && $v != '' && (isset($option_value[$k]) && $option_value[$k]!= ''))
						{
							$option_products[$v] =  $option_value[$k];
						}
					}
				}
				$options = serialize($option_products);
				$user_edit = $this->session->userdata('userlogin');
				$data = array(
					'name'=> $name,
					'friendly_url' => $slug,
					'cat_id'=>$cat_id,
					'image_name' => $image_name,
					'manufac_id'=>$manufac_id,
					'model'=>$model,
					'price'=>$price,
					'price_other' => $price_other,
					'vat'=>$vat,
					'show_vat'=>$show_vat,
					'options_cat'=>$thongso,
					'video_url' => $video_url,
					'content'=>$content,
					'hide'=>$hide,
					'feature'=>$feature,
					'tieubieu'=>$tieubieu,
					'warranty' => $baohanh,
					'sort_order'=>$sort_order,
					'site_title'=>$site_title,
					'meta_key'=>$meta_key,
					'meta_desc'=>$meta_desc,
					'alt_image' => $alt_image,
					'sale'=>$sale,
					'products'=>$products,
					'options'=>$options,
					'admin_edit'=>$user_edit->username,
					'status'=>$status,
					'last_update'=> now()
				);
				$this->product_model->update($id,$data);
				
				// $im['where'] = ['table_id'=>$id];
				// $listImgOld = $this->file_model->get_list($im);
				// if(!empty($listImgOld)){
				// 	$where = "table_id=".$id;
				// 	$this->file_model->delete_rule($where);
				// }
				// if($image_list && !empty($image_list)){
				// 	foreach($image_list as $key=>$val){
				// 		$idata = [
				// 			'table_id'=>$id,
				// 			'file_name'=>str_replace(base_url('upload/public/'),'',$val),
				// 			'table'=>'product-images',
				// 			'created'=>now()

				// 		];
				// 		$this->file_model->create($idata);
				// 	}

				// }

				// tạo nội dung thông báo
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('product?id='.$id));
			}
		}

		$ct['where'] = [];
		$ct['order'] = ['name','asc'];
		$listCountries = $this->countries_model->get_list($ct);
		$this->data['listCountries'] = $listCountries;

		$at['where'] = ['table_id'=>$id];
		$imgAttach = $this->file_model->get_list($at);
		$this->data['imgAttach'] = $imgAttach;
		
		// sản phẩm kèm theo
		
		$kemtheo = unserialize($info->products);
		$list_kemtheo = [];
		if(!empty($kemtheo)){
			foreach($kemtheo as $kem){
				$pro = $this->product_model->get_info($kem);
				$list_kemtheo[] = $pro;
			}
		}
		
		$this->data['list_kemtheo'] = $list_kemtheo;

		$this->data['temp'] = 'admin/product/edit';
		$this->load->view('admin/main', $this->data);
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->product_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại sản phẩm này');
			redirect_back(admin_url('product'));
		}
		$this->data['info'] = $info;
		$rule = 'product_id='.$id;

		$this->product_model->deleteOne($id);
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
		//chuyển sang trang danh sách danh mục
		redirect_back(admin_url('product'));
	}
	function delete_all()
	{
		$ids = $this->input->post('id[]');
		foreach ($ids as $id)
		{
			$this->_del($id);
		}
		$this->session->set_flashdata('message','Xóa tùy chọn thành công');
		redirect_back(admin_url('product'));
	}
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
    	$product = $this->product_model->get_info($id);
    	if(!$product)
    	{
            //tạo ra nội dung thông báo
    		$this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
    		redirect(admin_url('product'));
    	}
        //thuc hien xoa san pham
    	$rule = "product_id=".$id;
    	$this->product_model->deleteOne($id);
    }

    function update_price(){
    	$id=	$this->input->post('id');
    	$price = $this->input->post('price');
    	$vat =  $this->input->post('vat');
    	$user = $this->session->userdata('userlogin');
    	if(empty($vat )){$vat=0;}
    	$data = array(
    		'admin_edit'=> $user->username,
    		'price'=>$price,
    		'last_update'=> now()
    	);
    	$this->product_model->update($id,$data);
    	die;
    }
    function update_vat(){
    	$id=	$this->input->post('id');
    	$vat =  $this->input->post('vat');
    	$user = $this->session->userdata('userlogin');
    	$data = array(
    		'admin_edit'=> $user->username,
    		'vat'=>$vat,
    		'last_update'=> now()
    	);
    	$this->product_model->update($id,$data);
    	die;
    }
    function update_sort(){
    	$id=	$this->input->post('id');
    	$sort =  $this->input->post('sort');
    	$user = $this->session->userdata('userlogin');
    	$data = array(
    		'admin_update'=> $user->username,
    		'sort_order'=>$sort,
    		'last_update'=> now()
    	);
    	$this->product_model->update($id,$data);
    	die;
    }
}//end class