<?php

Class Catmeta_model extends MY_Model{
	var $table = 'cat_meta';

	function getSeometa($key,$catid){
		$data = '';
        $where = "meta_key='".$key."' AND cat_id=".$catid;

        $setting = $this->get_info_rule($where);

        if (!empty($setting)) {
           return $setting->meta_value;
        }
        else{
            echo '';
        }
	}

}