<?php 

Class Manufac_model extends MY_Model{
	var $table = 'manufac';

	  function optionManufac($selected){
    $input = array();
    $input['where'] = array();
    $input['order'] = ['name','asc'];
    $arrMenu = $this->get_list($input);
  if($arrMenu){
    foreach($arrMenu as $row){
      echo "<option value='".$row->id."'";
      if($selected==$row->id){
      echo " selected=''";
      }
      echo">".$row->name."</option>";
       
    }
    }
    }

    function getManufacName($id){
      $manulist = $this->get_info($id);
      if(!empty($manulist)){
        return $manulist->name;
      }
    }


}