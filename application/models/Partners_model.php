<?php

Class Partners_model extends MY_Model{
	var $table = 'partners';

	public function getPartner($status,$limit){
		$input['where'] = ['status'=>1];
		$input['limit'] = [$limit,0];
		$arrList = $this->get_list($input);
		return $arrList;
	}

}