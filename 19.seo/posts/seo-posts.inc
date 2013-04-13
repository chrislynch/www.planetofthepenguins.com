<?php
	$meta = teaser($this->content->html,250,'','');
	$meta = str_ireplace("\n",".",$meta);
	$meta = str_ireplace('"',"",$meta);
	$this->content->description = $meta;
	$this->content->abstract = $meta;
?>
