<?php


Class Ads_location_model extends MY_Model{
	var $table = 'ads_location';


	function getLocation($id){
		$location = $this->get_info($id);
		if(!empty($location)){
			return $location->name;
		}else{
			return '';
		}
		
	}

}