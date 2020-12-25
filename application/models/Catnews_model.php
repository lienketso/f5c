<?php
Class Catnews_model extends MY_Model{
  var $table = 'news_cat';
  function optionCatnews($id=0, $lever=0,$max=5, $selected,$ids){
    $this->language = language_current();
    $input = array();
    $input['where'] = ['parent_id'=>$id];
    $arrMenu = $this->get_list($input);
  if($arrMenu){
    foreach($arrMenu as $row){
      echo "<option value='".$row->id."'";
      if($selected==$row->id){
      echo " selected=''";
      }
      if($row->id==$ids){
        echo "disabled=''";
      }
      echo">".str_repeat("&brvbar;---",$lever-1).$row->name."</option>";
      if($lever<$max){
        $this->optionCatnews($row->id, $lever+1,$max=5, $selected,$ids,$type);
      }  
    }
    }
    }
    function checkboxCatnews($id=0,$lever=0,$max=5, $checked,$type=''){
    $this->language = language_current();
    $input = array();
    if($type!=''){
    $input['where'] = ['cat_type'=>$type,'parent_id'=>$id];
    }else{
    $input['where'] = array('parent'=>$id);
    }
    $arrMenu = $this->get_list($input);
    if($arrMenu){
    foreach($arrMenu as $row){
      echo "<div class='form-check'>";
      echo "<label class='form-check-label'>";
      echo "<input type='checkbox' class='form-check-input' name='category[]' value='".$row->id."'" ;
      if($checked==$row->id){
      echo " checked='checked'";
      }
      echo ">".$row->name;
      echo"</label>";
      echo "</div>";
      if($lever<$max){
        $this->checkboxCatnews($row->id, $lever+1,$max=5, $checked,$type);
      }  
    }
    }
    }
    //get all catnews link
    function getAllCatnewsLink($id=0){
      $this->language = language_current();
      $input = array();
      $input['where'] = array('parent'=>$id,'lang_code'=>$this->language);
      $input['order'] = array('is_order','desc');
      $arr = array();
      $arrListCatNews1 = $this->get_list($input);
      if ($arrListCatNews1){
      foreach ($arrListCatNews1 as $row){
        $v1 = array();
        $v1['title'] = $row->name;
        $v1['href'] = base_url().$row->cat_name.".htm";
        $v1['subcat'] = $this->getAllCatnewsLink($row->id);
        $arr[] = $v1;
      }
    }
    return $arr;
  }
  function getCatNewsbyStatus($status,$type,$display,$lim){
    $this->load->model('news_model');
    $this->load->model('news_catnews_model');
    $input['where'] = ['status'=>$status,'parent'=>0,'cat_type'=>$type,'display'=>$display];
    $input['order'] = ['is_order','asc'];
    $arrCate = $this->get_list($input);
     foreach($arrCate as $row){
      $inputs['where'] = ['parent'=>$row->id,'status'=>$status];
      $subcat = $this->get_list($inputs);
      if(!empty($subcat)){
        $idsub = [];
        foreach($subcat as $sub){
          $idsub[] = $sub->id;
        }
        $ids = implode(',', $idsub);
        $memay = 'cat_id IN('.$ids.')';
        $order = ['id','asc'];
        $limit = [$lim,0];
        $newscat = $this->news_catnews_model->get_where_in($memay,$order,$limit);
        $item = $this->getNews($newscat);
        $row->item = $item;
      }else{
        $where['where'] = ['cat_id'=>$row->id];
        $where['order'] = ['id','desc'];
        $where['limit'] = [$lim,0]; 
        $newscat = $this->news_catnews_model->get_list($where);
        $item = $this->getNews($newscat);
        $row->item = $item;
      }
    }
    return $arrCate;
  }
  public function getNews($array){
    $this->load->model('news_model');
    $arrList = [];
    if(!empty($array)){
      foreach($array as $row){
          $items = $this->news_model->get_info($row->news_id);
          $arrList[] = $items;
      }
      return $arrList;
    }
    return $arrList;
  }
}//end model