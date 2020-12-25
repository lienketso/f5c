
<?php 
	if($info->type=='news'){
    $this->load->view('site/templates/single_post');
	}else if($info->type=='page'){
		$this->load->view('site/templates/about');
	}
?>



