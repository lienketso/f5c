<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');
Class MY_Model extends CI_Model{
	var $table ='' ;
	var $key ='id';
	var $order = '';
	var $select = '';
	public function search($name){
		$this->db->like('title',$name,'both');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function search_product($name){
		$this->db->like('name',$name,'both');
		$this->db->limit(5,0);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	function get_total($input = array()){
		$this->get_list_set_input($input);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
	//lấy ra tổng 1 cột dữ liệu
	function get_sum($where=''){
		$this->db->select_sum('qty');
		$this->db->where($where);
		$query = $this->db->get($this->table);
		return $query->num_fields();
	}
	//lấy ra tổng của cột
	function get_sum_amount($where=''){
		$this->db->select_sum('amount','total');
		$this->db->where($where);
		$query = $this->db->get($this->table)->row();
		return $query->total;
	}
	//lấy thông tin dữ liệu trong bảng
	function get_catname($catname){
		if(!$catname){
			return FALSE;
		}
		//$where ="WHERE $cond";
		$where['cat_name'] = $cat_name;
		return $this->get_info_rule($where);
	}
	function get_info($id){
		if(!$id){
			return FALSE;
		}
		//$where ="WHERE $cond";
		$where['id'] = $id;
		return $this->get_info_rule($where);
	}
	//lấy thông tin của dòng từ điều kiện
	function get_info_rule($where){	
		$this->db->where($where);
		$query = $this->db->get($this->table);
		if($query->num_rows()){
			return $query->row();
		}
		return FALSE;
	}
	function get_info_rule_in($where= array(),$wherein=[]){
		$this->db->where($where);
		if($wherein){
			$this->db->where_in($wherein);
		}
		$query = $this->db->get($this->table);
		if($query->num_rows()){
			return $query->row();
		}
		return FALSE;
	}
	//insert dữ liệu
	function create($data = array()){
		if($this->db->insert($this->table,$data)){
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}else{
			return 0;
		}
	}
	function get_list_rule($where){
		$this->db->where($where);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	//Lấy danh sách dữ liệu
	function get_list($input = array()){
		$this->get_list_set_input($input);
		//truy vấn dữ liệu
		$query = $this->db->get($this->table);	
		return $query->result();
	}
	function get_list_extent($input = array(),$extent){
		$this->get_list_set_input($input);
		if(!empty($extent)){
			$str = preg_replace('/^AND/', '', $extent);
			$query = $this->db->where($str);
		}		
		//truy vấn dữ liệu
		$query = $this->db->get($this->table);	
		return $query->result();
	}
	function get_where_in($where,$order,$limit){
		$this->db->where($where);
		$this->db->order_by($order[0], $order[1]);
		$this->db->limit($limit[0], $limit[1]);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	public function getWhere_in($field,$array,$limit){
		$this->db->where_in($field,$array);
		$this->db->order_by('id','desc');
		$this->db->limit($limit[0], $limit[1]);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	//lấy dữ liệu gán điều kiện
	function get_list_set_input($input){
		
		if(isset($input['select'])){
			$this->db->select($input['select']);
		}
		//thêm điều kiện cho câu truy vấn truyền qua biến $input['select']
		if(isset($input['where']) && $input['where']){
			$this->db->where($input['where']);
		}
		if(isset($input['where_in']) && $input['where_in']){
			$this->db->where_in($input['where_in'][0],$input['where_in'][1]);
		}
		//thêm điều kiện tìm kiếm theo lệnh like
		if(isset($input['like']) && $input['like']){
			$this->db->like($input['like'][0], $input['like'][1],'both');
		}
		if(isset($input['limit'][0]) && isset($input['limit'][1])){
			$this->db->limit($input['limit'][0], $input['limit'][1]);
		}
		//Thêm sắp xếp dữ liệu
		if(isset($input['order'][0]) && isset($input['order'][1])){
			$this->db->order_by($input['order'][0], $input['order'][1]);
		}
		
		else{
			$this->db->order_by('id','desc');
		}
		//Thêm điều kiện limit (phân trang)
	}
	//kiểm tra tồn tại
	function check_exits($where = array()){
		$this->db->where($where);
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//kiểm tra tồn tại
	function check_not_exits($where = array()){
		$this->db->where($where);
		$query = $this->db->get($this->table);
		if($query->num_rows() <= 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	// sửa dữ liệu
	function update($id,$data){
		if(!$id){
			return FALSE;
		}
		$where = array();
		$where['id'] = $id;
		$this->update_rule($where,$data);
	}
	public function updateAll($data){
		if($this->db->update($this->table, $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function insertBacth($data){
		if($this->db->insert_batch($this->table,$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function updateBatch($data,$key){
		if($this->db->update_batch($this->table,$data,$key)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function updateBatchWhere($data,$key,$field,$id){
		$this->db->where($field,$id);
		if($this->db->update_batch($this->table,$data,$key)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//điều kiện cập nhật dữ liệu
	function update_rule($where,$data){
		if(!$where){
			return FALSE;
		}
		$this->db->where($where);
		if($this->db->update($this->table,$data)){
			return TRUE;
		}
		return FALSE;
	}
	function deleteOne($id){
		if(!$id){
			return FALSE;
		}
		$where = array();
		$where['id'] = $id;
		$this->delete_rule($where);
	}
	function delete_rule($where){
		if(!$where){
			return FALSE;
		}
		$this->db->where($where);
		if($this->db->delete($this->table)){
			return TRUE;
		}
		return FALSE;
	}
}//end classs