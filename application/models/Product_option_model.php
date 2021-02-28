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

}