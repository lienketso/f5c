<?php
Class Product_model extends MY_Model{
	var $table = 'product';
	public function getProductStatus($display,$limit){
		$this->language = language_current();
		$input['where'] = array('display'=>$display,'status'=>1,'lang_code'=>$this->language);
		$input['order'] = ['id','desc'];
		$input['limit'] = [$limit,0];
		$arrProduct = $this->get_list($input);
		return $arrProduct;
	}
	public function getProduct($array){
		$arrList = [];
		if(!empty($array)){
			foreach($array as $row){
				$items = $this->get_info($row->product_id);
				$arrList[] = $items;
			}
			return $arrList;
		}
		return $arrList;
	}
	public function getCity($id){
		$this->load->model('city_model');
		$city = $this->city_model->get_info($id);
		if(!empty($city)){
			return $city->name;
		}else{
			echo '';
		}
	}
	public function getQuan($id){
		$this->load->model('district_model');
		$quan = $this->district_model->get_info($id);
		if(!empty($quan)){
			return $quan->name;
		}else{
			echo '';
		}
	}
	public function getPhuong($id){
		$this->load->model('thixa_model');
		$phuong = $this->thixa_model->get_info($id);
		if(!empty($phuong)){
			return $phuong->name;
		}else{
			echo '';
		}
	}
	function getCategory($id){
		$this->load->model('category_model');
		$infoCat = $this->category_model->get_info($id);
		if(!empty($infoCat)){
			return $infoCat->name;
		}else{
			echo 'No data';
		}
	}

	//lấy ra tất cả nhóm con

	function fetch_recursive($src_arr, $currentid, $parentfound = false, $cats = array())
		{
    foreach($src_arr as $row)
    {
        if((!$parentfound && $row->id == $currentid) || $row->id == $currentid)
        {
            $rowdata = array();
            foreach($row as $k => $v)
                $rowdata[$k] = $v;
            $cats[] = $rowdata;
            if($row->parent_id== $currentid)
                $cats = array_merge($cats, fetch_recursive($src_arr, $row->id, true));
        }
    }
    return $cats;
	}

	public function autocompete($catId, $search, $arrExclude=''){
		$this->db->select('id,name,image_name,CAST(price as INT) price ');
		$this->db->from('product');
		$this->db->where('cat_id',$catId);
		$this->db->like('name',$search);
		$this->db->limit(10);
		$this->db->where_not_in('id', $arrExclude);
		$query= $this->db->get();
		 return $query->result(); 
	}

	public function countProductByManu($manu){
		$this->db->where('manufac_id',$manu);
		$this->db->from('product');
		return $this->db->count_all_results();
	}

	public function getLocationManu($where = array()){
		$this->db->select('model, count(model) count');
		$this->db->from('product');
		$this->db->where("model <> ''");
		$this->db->where_in($where );
		$this->db->group_by("model"); 
		$query= $this->db->get();
		return $query->result(); 
	}
	public function price_range($where = array()){
		$sql ="select t.`price_range`, count(`price`) as `num`";
		$sql .= " from";
		$sql .= " (select case";
		$sql .= " when `price` < 500000 then '0 - 500K'";
		$sql .= " when `price` >= 500000 and price < 1000000 then '500k - 1 triệu'";
		$sql .= " when `price` >= 1000000 and price < 2000000 then '1 triệu - 2 triệu'";
		$sql .= " when `price` >= 2000000 and price < 3000000 then '2 triệu - 3 triệu'";
		$sql .= " when `price` >= 3000000 and price < 5000000 then '3 triệu - 5 triệu'";
		$sql .= " when `price` >= 5000000 and price < 10000000 then '5 triệu - 10 triệu'";
		$sql .= " when `price` >= 10000000 and price < 20000000 then '10 triệu - 20 triệu'";
		$sql .= " when `price` >= 20000000  then '> 20 triệu'";
		$sql .= " end";
		$sql .= " as `price_range`, price";
		$sql .=" from `product` WHERE `cat_id`IN ?) as t";
		$sql .= " group by `price_range` ORDER BY `price`";		
		$query = $this->db->query($sql,$where);
		return $query->result(); 		
	}
}