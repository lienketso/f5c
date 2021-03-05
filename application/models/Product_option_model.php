<?php

Class Product_option_model extends MY_Model{
	var $table = 'product_option';

	function getOption($id){
		$this->load->model('option_product_model');
		$info = $this->option_product_model->get_info($id);
		if(empty($info)){
			return '';
		}else{
			return $info->name;
		}
	}
	function getListOptionProduct($arrId){
		$sql = "SELECT DISTINCT op.option_id, op.value_id,o.`name` from product_option op JOIN option_product o on op.option_id = o.id WHERE op.product_id in ? ORDER BY op.option_id";
		$query =	$this->db->query($sql, array($arrId));
		return $query->result();
	}

}