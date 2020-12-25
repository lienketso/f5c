<?php 
class City_model extends MY_Model{
  var $table = 'city';

  function getCity($id){
    $city = $this->get_info($id);
    if(!empty($city)){
      echo $city->name;
    }else{
      echo 'Chưa rõ';
    }
  }

  function optionCity($id,$selected){
    $input = array();
    $input['where'] = array('status'=>1);
    $input['order'] = array('is_order','asc');
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
  function getSelectedCity($category_id, $id){
    $input = array();
    $mang = explode(',',$id);
    $input['order'] = array('is_order','asc');
    $arrMenu = $this->get_list($input);
    if(in_array(4,$mang,true)){
      echo "Chứa 1";
    }
    foreach ($arrMenu as $row) {
      echo "<option value='".$row->id."'";
      if(in_array($row->id, $mang , true)){
        echo " selected=''";
      }
      echo">".$row->name."</option>";  
    }
  }

}