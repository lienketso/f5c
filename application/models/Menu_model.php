<?php
Class Menu_model extends MY_Model{
  var $table = 'menu';
  function optionMenu($id=0, $lever=0,$max=5, $selected,$ids){
    $this->language = language_current();
    $input = array();
    $input['where'] = array('parent'=>$id,'lang_code'=>$this->language);
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
    $input['where'] = array('parent'=>$id,'lang_code'=>$this->language,'is_online'=>1);
    $input['order'] = array('is_order','asc');
    $arrListMenu = $this->get_list($input);
    $arr = array();
    if ($arrListMenu){
        foreach($arrListMenu as $row){
        $v1 = array();        
        $v1['title'] = $row->name;
        $v1['id'] = $row->id;
        $v1['href'] = $row->link;
        $v1['slug'] = $row->slug;
        $subcat = $this->getAllMenuLink($v1['id']);
        $v1['subcat'] = $subcat;
        if($row->menu_type=='link'){
          $v1['href'] = $row->link;
        }
        else
        if($row->menu_type=='category'){
           $v1['href'] = catnews_url($row->slug);
        }
        else
        if($row->menu_type=='product' || $row->menu_type=='chothue'){
           $v1['href'] = category_url($row->slug);
        }
        else
        if($row->menu_type=='page'){
           $v1['href'] = base_url($row->slug);
        }
        $arr[] = $v1;
    }//endforeach
    return $arr;  
    }//endif
    return $arr; 
  }//end function
}//end class