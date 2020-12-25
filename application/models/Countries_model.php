<?php
Class Countries_model extends MY_Model{
	var $table = 'countries';

	function optionCountries($selected){
    $input = array();
    $input['where'] = array();
    $input['order'] = ['name','asc'];
    $arrMenu = $this->get_list($input);
  if($arrMenu){
    foreach($arrMenu as $row){
      echo "<option value='".$row->name."'";
      if($selected==$row->id){
      echo " selected=''";
      }
      echo">".$row->name."</option>";
       
    }
    }
    }

}