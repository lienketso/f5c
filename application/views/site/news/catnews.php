

<?php 

if($category->cat_type=='news'){
$this->load->view('site/templates/blog'); 
}elseif ($category->cat_type=='duan') {
	$this->load->view('site/templates/tour/list'); 
}elseif ($category->cat_type=='real') {
	$this->load->view('site/templates/real/list'); 
}elseif ($category->cat_type=='forum') {
	$this->load->view('site/forum/category'); 
}

?>



