<?php
Class Product extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('product_category_model');
		$this->load->model('productmeta_model');
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
		//kiểm tra xem có lọc sản phẩm không, thêm điều kiện
		$name = $this->input->get('name');
		$category_id = $this->input->get('category_id');
		if($name){
			$input['like'] = array('name', $name);
		}
		if($category_id && $category_id!=0){
			$input['where'] += ['cat_id'=>$category_id];
		}

		$this->data['name'] = $name;
		$this->data['category_id'] = $category_id;

		//lấy danh sách sản phẩm
		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;	

		$ca['order'] = ['sort_order','asc'];
		$listCategory = $this->category_model->get_list($ca);
		$this->data['listCategory'] = $listCategory;

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = "admin/product/index";
		$this->load->view("admin/main", $this->data);
	}

	function status(){
		$id = $this->input->get('id');
		$product = $this->product_model->get_info($id);
		$onoff = '';
		if($product->hide==1){
			$on = '0';
		}
		if($product->hide==0){
			$on = '1';
		}
		
		$data = array(
			'hide'=>$on
		);
		$this->product_model->update($id,$data);
		$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
		//chuyển sang trang danh sách admin
		redirect(admin_url('product'));
	}

	function feature(){
		$id = $this->input->get('id');
		$product = $this->product_model->get_info($id);

		if($product->feature==1){
			$on = '0';
		}
		if($product->feature==0){
			$on = '1';
		}
		
		$data = array(
			'feature'=>$on
		);
		$this->product_model->update($id,$data);
		$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
		//chuyển sang trang danh sách admin
		redirect(admin_url('product'));
	}
//kiểm tra callback username
	function check_title(){
		$action = $this->uri->rsegment(2);
		$slug = $this->input->post('friendly_url');
		$where = array('friendly_url'=> $slug);
		$check = true;
		if($action == 'edit'){
			$info = $this->data['info'];
			if($info->slug == $slug){
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
			$this->form_validation->set_rules('name','Tiêu đề','required|min_length[2]');
			$this->form_validation->set_rules('friendly_url','Tiêu đề','required|min_length[2]|callback_check_title');
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
				$thongso = $this->input->post('options_cat');
				$content = $this->input->post('content');
				$baohanh = $this->input->post('warranty');
				$sort_order = $this->input->post('sort_order');	
				$manufac_id = $this->input->post('manufac_id');	
				$model = $this->input->post('model');	
				$image_name = $this->input->post('image_name');	
				$image_name = str_replace(base_url('upload/public/'),'',$image_name);
				$site_title = $this->input->post('site_title');	
				$meta_key = $this->input->post('meta_key');	
				$meta_desc = $this->input->post('meta_desc');	
				$alt_image = $this->input->post('alt_image');

				$image_list = $this->input->post('image_list');
				//phụ kiện kèm theo
				$products = $this->input->post('products[]');
				if($products){
					$products = serialize($products);
				}else{
					$products = '';
				}
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

				$data = array(
					'name'=> $name,
					'friendly_url' => $slug,
					'cat_id'=>$cat_id,
					'image_name' => $image_name,
					'manufac_id'=>$manufac_id,
					'model'=>$model,
					'price'=>$price,
					'price_other' => $price_other,
					'options_cat'=>$thongso,
					'content'=>$content,
					'warranty' => $baohanh,
					'sort_order'=>$sort_order,
					'site_title'=>$site_title,
					'meta_key'=>$meta_key,
					'meta_desc'=>$meta_desc,
					'alt_image' => $alt_image,
					'products'=>$products,
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
							'file_name'=>str_replace(base_url('upload/public/'),'',$img),
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
			$this->form_validation->set_rules('friendly_url','Đường dẫn tĩnh','required');

			if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$name = $this->input->post('name');
				$slug = $this->input->post('friendly_url');
				$slug = slug($slug);
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
				$thongso = $this->input->post('options_cat');
				$content = $this->input->post('content');
				$baohanh = $this->input->post('warranty');
				$sort_order = $this->input->post('sort_order');	
				$manufac_id = $this->input->post('manufac_id');	
				$model = $this->input->post('model');	
				$image_name = $this->input->post('image_name');	
				$image_name = str_replace(base_url('upload/public/'),'',$image_name);

				$site_title = $this->input->post('site_title');	
				$meta_key = $this->input->post('meta_key');	
				$meta_desc = $this->input->post('meta_desc');	
				$alt_image = $this->input->post('alt_image');

				$image_list = $this->input->post('image_list');
				$products = $this->input->post('products[]');
				if($products){
					$products = serialize($products);
				}else{
					$products = '';
				}

				$data = array(
					'name'=> $name,
					'friendly_url' => $slug,
					'cat_id'=>$cat_id,
					'image_name' => $image_name,
					'manufac_id'=>$manufac_id,
					'model'=>$model,
					'price'=>$price,
					'price_other' => $price_other,
					'options_cat'=>$thongso,
					'content'=>$content,
					'warranty' => $baohanh,
					'sort_order'=>$sort_order,
					'site_title'=>$site_title,
					'meta_key'=>$meta_key,
					'meta_desc'=>$meta_desc,
					'alt_image' => $alt_image,
					'products'=>$products,
					'last_update'=> now()
				);
				$this->product_model->update($id,$data);
				
				$im['where'] = ['table_id'=>$id];
				$listImgOld = $this->file_model->get_list($im);
				if(!empty($listImgOld)){
					$where = "table_id=".$id;
					$this->file_model->delete_rule($where);
				}
				if($image_list && !empty($image_list)){
					foreach($image_list as $key=>$val){
						$idata = [
							'table_id'=>$id,
							'file_name'=>str_replace(base_url('upload/public/'),'',$val),
							'table'=>'product-images',
							'created'=>now()

						];
						$this->file_model->create($idata);
					}
					
				}

				// tạo nội dung thông báo
				$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('product'));
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
		$type = $this->input->get('type');
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		$info = $this->product_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại sản phẩm này');
			redirect(admin_url('product?type='.$type));
		}
		$this->data['info'] = $info;
		$rule = 'product_id='.$id;
		//xoa postmeta
		$this->productmeta_model->delete_rule($rule);
		$this->product_category_model->delete_rule($rule);
		$this->product_model->deleteOne($id);
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
		//chuyển sang trang danh sách danh mục
		redirect(admin_url('product?type='.$type));
	}
	function delete_all()
	{
		$type = $this->input->get('type');
		$ids = $this->input->post('id[]');
		foreach ($ids as $id)
		{
			$this->_del($id);
		}
		$this->session->set_flashdata('message','Xóa tùy chọn thành công');
		redirect(admin_url('product?type='.$type));
	}
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
    	$type = $this->input->get('type');
    	$product = $this->product_model->get_info($id);
    	if(!$product)
    	{
            //tạo ra nội dung thông báo
    		$this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
    		redirect(admin_url('product?type='.$type));
    	}
        //thuc hien xoa san pham
    	$rule = "product_id=".$id;
    	$this->productmeta_model->delete_rule($rule);
    	$this->product_category_model->delete_rule($rule);
    	$this->product_model->deleteOne($id);
    }
}//end class