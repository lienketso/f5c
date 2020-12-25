<?php 



Class Gallery_group_model extends MY_Model{



	var $table='gallery_group';

	function getGallerybyStatus($status,$lim){
    $this->load->model('gallery_model');
    $input['where'] = ['status'=>$status];
    $input['order'] = ['is_order','asc'];
    $arrCate = $this->get_list($input);
     foreach($arrCate as $row){
        $where['where'] = ['group_id'=>$row->id];
        $where['order'] = ['id','desc'];
        $where['limit'] = [$lim,0]; 
        $adverList = $this->adver_model->get_list($where);
        $row->adverList = $adverList;
    }
    return $arrCate;
  }
}