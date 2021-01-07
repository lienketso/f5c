<?php



Class Site_model extends MY_Model{

	var $table = 'site';

	 public function getSettingMeta($key)

    {
        // $data = collect(['setting_value' => '']);
        $data = '';
        $where = "key='".$key."'";
        $setting = $this->get_info_rule($where);
        if (!empty($setting)) {
           return $setting->value;
        }
        else{
            echo '';
        }
    }



}