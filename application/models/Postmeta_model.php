<?php

Class Postmeta_model extends MY_Model{
	var $table = 'postmeta';

	function getSeometa($key,$catid){
		$data = '';
        $where = "meta_key='".$key."' AND post_id=".$catid;

        $setting = $this->get_info_rule($where);

        if (!empty($setting)) {
           return $setting->meta_value;
        }
        else{
            echo '';
        }
	}

}