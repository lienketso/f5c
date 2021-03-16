<?php 



Class Comment_model extends MY_Model{

	var $table='comment';

	public function getComment($produdctId,$offset = 0){
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->where('product_id',$produdctId);
		$this->db->where('status',1);
		$this->db->where('parent_id',0);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(10,$offset);
		$query = $this->db->get();
		return $query->result();
	}
	public function getSubComment($parentId){	
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->where('status',1);
		$this->db->where('parent_id',$parentId);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function getById($id){
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->where('id',$id);
		$this->db->where('status',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function addComment($produdctId, $name, $email,$content,$parentId = 0){
		$data = array(
			'product_id' => $produdctId,
			'user_name' => $name,
			'user_email' => $email,
			'content' => $content,
			'parent_id'=>$parentId,
			'count_like'=>0,
			'status'=>1,
			'created' => now()
	);
	$this->db->insert('comment', $data);
	return $this->db->insert_id();
	}
	


}