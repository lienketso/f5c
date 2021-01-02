<?php



Class Support_model extends MY_Model{

	var $table = 'support';

	function getSupportAll($status){

    $input['where'] = ['status'=>$status];

    $input['order'] = ['id','desc'];

    $input['limit'] = [5,0];

    $list = $this->get_list($input);

    return $list;

	}



}