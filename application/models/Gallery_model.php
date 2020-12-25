<?php 

Class Gallery_model extends MY_Model{

	var $table = 'gallery';

	public function getGallery($status,$groupid,$limit){
		$input['where'] = ['status'=>$status,'group_id'=>$groupid];
		$input['limit'] = [$limit,0];
		$arrList = $this->get_list($input);
		return $arrList;
	}

}