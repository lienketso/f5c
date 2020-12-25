<?php

Class Site_model extends MY_Model{
	var $table = 'site_setting';

	 public function getSettingMeta($key)
    {
        // $data = collect(['setting_value' => '']);
        $data = '';
        $where = "setting_key='".$key."'";

        $setting = $this->get_info_rule($where);

        if (!empty($setting)) {
           return $setting->setting_value;
        }
        else{
            echo '';
        }
    }

}