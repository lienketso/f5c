<?php
Class Menu_model extends MY_Model{
  var $table = 'menu';
  function optionMenu($id=0, $lever=0,$max=5, $selected,$ids){
    $this->language = language_current();
    $input = array();
    $input['where'] = array('parent_id'=>$id);
    $arrMenu = $this->get_list($input);
  if($arrMenu){
    foreach($arrMenu as $row){
      echo "<option value='".$row->id."'";
      if($selected==$row->id){
      echo " selected=''";
      }
      if($row->id==$ids){
        echo " disabled=''";
      }
      echo">".str_repeat("&brvbar;---",$lever-1).$row->name."</option>";
      if($lever<$max){
        $this->optionMenu($row->id, $lever+1,$max=5, $selected,$ids);
      }
    }
    }
    }
    //get all menu link
    function getAllMenuLink($id=0){
    $this->language = language_current();
    $input = array();
    $input['where'] = array('parent_id'=>$id);
    $input['order'] = array('sort_order','asc');
    $arrListMenu = $this->get_list($input);
    $arr = array();
    if ($arrListMenu){
        foreach($arrListMenu as $row){
        $v1 = array();        
        $v1['title'] = $row->title;
        $v1['id'] = $row->id;
        $v1['href'] = $row->url;
        $subcat = $this->getAllMenuLink($v1['id']);
        $v1['subcat'] = $subcat;
        $arr[] = $v1;
    }//endforeach
    return $arr;  
    }//endif
    return $arr; 
  }//end function
}//end class