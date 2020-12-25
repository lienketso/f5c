<?php



Class Page_model extends MY_Model{

	var $table ='info';



	public function getPagebyStatus($status,$lim){

		$input['where'] = ['status'=>$status];

    	$input['order'] = ['id','desc'];

    	$input['limit'] = [$lim,0];

    	$arrCate = $this->get_list($input);

    	return $arrCate;

	}



}