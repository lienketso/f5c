<?php
Class News_model extends My_Model{
	var $table = 'news';
	public function getNewsbyStatus($status,$display,$type,$lim){
		$langcode = language_current();
		$input['where'] = ['status'=>$status,'type'=>$type,'display'=>$display,'lang_code'=>$langcode];
    	$input['order'] = ['id','desc'];
    	$input['limit'] = [$lim,0];
    	$arrCate = $this->get_list($input);
    	return $arrCate;
	}
	public function getMeta($id){
		$this->load->model('postmeta_model');
		$input['where'] = ['post_id'=>$id];
		$meta = $this->postmeta_model->get_list($input);
		$arrMeta = [];
		if(!empty($meta)){
			foreach($meta as $key=>$val){
				$arrMeta[$val->meta_key] = $val->meta_value;
			}
			return $arrMeta;
		}else{
			return [];
		}
	}
}