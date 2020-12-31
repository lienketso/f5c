<?php 
	if($category->parent_id!=0){
     $this->load->view('site/product/templates/list');
	}else{
		 $this->load->view('site/product/templates/parent');
	}
?>