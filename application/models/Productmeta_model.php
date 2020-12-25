<?php 
Class Productmeta_model extends MY_Model{
	var $table = 'product_meta';

  function getSeometa($key,$catid){
    $data = '';
        $where = "meta_key='".$key."' AND product_id=".$catid;

        $setting = $this->get_info_rule($where);

        if (!empty($setting)) {
           return $setting->meta_value;
        }
        else{
            echo '';
        }
  }

}