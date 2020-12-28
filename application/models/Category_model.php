<?php
Class Category_model extends MY_Model{
  var $table = 'cat';
  function optionCategory($id=0, $lever=0,$max=5, $selected,$ids){
    $this->language = language_current();
    $input = array();
    $input['where'] = array('parent_id'=>$id);
    $input['order'] = ['name','asc'];
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
        $this->optionCategory($row->id, $lever+1,$max=5, $selected,$ids);
      }  
    }
    }
    }

    function optionMenuCategory($id=0, $lever=0,$max=5, $selected,$ids){
    $this->language = language_current();
    $input = array();
    $input['where'] = array('parent'=>$id);
    $arrMenu = $this->get_list($input);
  if($arrMenu){
    foreach($arrMenu as $row){
      echo "<option value='".$row->slug."'";
      if($selected==$row->slug){
      echo " selected=''";
      }
      if($row->id==$ids){
        echo " disabled=''";
      }
      echo">".str_repeat("&brvbar;---",$lever-1).$row->name."</option>";
      if($lever<$max){
        $this->optionMenuCategory($row->id, $lever+1,$max=5, $selected,$ids);
      }  
    }
    }
    }

    function checkboxCategory($id=0,$lever=0,$max=5, $checked){
    $this->language = language_current();
    $input = array();
    $input['where'] = array('parent_id'=>$id);
    $input['order'] = ['name','asc'];
    $arrMenu = $this->get_list($input);
    if($arrMenu){
    foreach($arrMenu as $row){
      if($row->parent_id>0){
        $class = 'mgleft';
      }else{
        $class = '';
      }
      echo "<div class='form-check ".$class."'>";
      echo "<label class='form-check-label'>";
      echo "<input type='checkbox' class='form-check-input' name='cat_id[]' value='".$row->id."'" ;
      if($checked==$row->id){
      echo " checked='checked'";
      }
      echo ">".$row->name;
      echo"</label>";
      echo "</div>";

      if($lever<$max){
        $this->checkboxCategory($row->id, $lever+1,$max=5, $checked);
      }  
    }
    }
    }
    //get all catnews link
    function getAllCateLink($id=0){
      $this->language = language_current();
      $input = array();
      $input['where'] = array('status'=>1,'parent'=>$id);
      $input['order'] = array('is_order','desc');
      $arr = array();
      $arrListCatNews1 = $this->get_list($input);
      if ($arrListCatNews1){
      foreach ($arrListCatNews1 as $row){
        $v1 = array();
        $v1['title'] = $row->name;
        $v1['href'] = base_url('danh-muc/').$row->slug;
        $v1['subcat'] = $this->getAllCateLink($row->id);
        $arr[] = $v1;
      }
    }
    return $arr;
  }

  public function getCategoryAllsub($parent=0){
    $input = array();
    $input['where'] = array('parent_id'=>$parent);
    $input['order'] = array('sort_order','asc');
    $arrListCate = $this->get_list($input);
    $arr = array();
    if ($arrListCate){
        foreach($arrListCate as $row){
        $v1 = array();        
        $v1['name'] = $row->name;
        $v1['id'] = $row->id;
        $v1['image_name'] = $row->image_name;
        $v1['link'] = base_url($row->friendly_url.'-'.$row->id);
        $subcat = $this->getCategoryAllsub($v1['id']);
        $v1['subcat'] = $subcat;
        $arr[] = $v1;
      }
      return $arr;
    }
    return $arr;
  }

  public function getCategoryHome($status){
    $this->load->model('product_model');
    $input['where'] = ['status'=>$status,'parent'=>0];
    $input['order'] = ['is_order','asc'];
    $arrCate = $this->get_list($input);
    foreach($arrCate as $row){
      $inputs['where'] = ['parent'=>$row->id,'status'=>1];
      $subcat = $this->get_list($inputs);
      if(!empty($subcat)){
        $idsub = [];
        foreach($subcat as $sub){
          $idsub[] = $sub->id;
        }
        $ids = implode(',', $idsub);
        $memay = 'category_id IN('.$ids.')';
        $order = ['id','asc'];
        $limit = [10,0];
        $product = $this->product_model->get_where_in($memay,$order,$limit);
        $row->product = $product;
      }else{
        $where['where'] = ['category_id'=>$row->id];
        $where['order'] = ['id','desc'];
        $where['limit'] = [10,0]; 
        $product = $this->product_model->get_list($where);
        $row->product = $product;
      }
    }
    return $arrCate;
  }
  
    public function getProductbyCate($cateid){
    $this->load->model('product_model');
    $arrCate = $this->get_info($cateid);
    $idsub = [];
      $inputs['where'] = ['parent'=>$cateid];
      $subcat = $this->get_list($inputs);
      if(!empty($subcat)){
        $idsub[] = $cateid;
        foreach($subcat as $sub){
          $idsub[] .= $sub->id;
          $inputss['where'] = ['parent'=>$sub->id];
          $subsub = $this->get_list($inputss);
          if(!empty($subsub)){
            foreach($subsub as $ss){
              $idsub[] .= $ss->id;
            }
          }
        }
        $idsub[] = implode(',', $idsub);
      }else{
        $idsub[] = $cateid;
      }
        $memay = 'category_id IN('.$idsub.')';
        $order = ['id','asc'];
        $limit = [50,0];
        $product = $this->product_model->get_where_in($memay,$order,$limit);
        return $product;
  }
  function getCategory($display,$limit){
    $this->language = language_current();
    $input['where'] = ['status'=>1,'display'=>$display];
    $input['order'] = ['is_order','asc'];
    $input['limit'] = [$limit,0];
    $listCate = $this->get_list($input);
    return $listCate;
  }

  function showCategory($parent_id = 0, $char = '', $stt = 0){
      $input['order'] = ['sort_order','asc'];
      $categories = $this->get_list($input);
      $child = [];
      foreach($categories as $key=>$item){
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            $child[] = $item;
            unset($categories[$key]);
        }
      }
     // HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
      if ($child)
    {
        if ($stt == 0){
            // là cấp 1
        }
        else if ($stt == 1){
            // là cấp 2
        }
        else if ($stt == 2){
            // là cấp 3
        }
         
        echo '<ul>';
        foreach ($child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo '<li>'.$item['title'];
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['id'], $char.'|---', ++$stt);
            echo '</li>';
        }
        echo '</ul>';
    }

  }


}//end model