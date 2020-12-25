<?php 



Class Comment_model extends MY_Model{

	var $table='comment';

	public function getComment($limit){
		$input['where'] = ['status'=>1];
		$input['limit'] = [$limit,0];
		$arrList = $this->get_list($input);
		return $arrList;
	}



}