<?php
$this->_loadPlugin('drupal');

if(strlen($this->p) > 0){
        $nodes = $this->_drupal->drupal_load_nodes('u.alias <> "' . $this->p . '" AND u.alias LIKE "%' . $this->parray(0) . '%"',
                                                    array('limit' => '8'));

        if($nodes === FALSE){
            $this->content_footer->html = '';
        } else {
            // Multiple nodes
            $this->content_footer->html = '';
            foreach($nodes as $node){
                $this->content_footer->html .= grid_item($node);
            }
        }	
} else {
    $return = '';
    $blogs = $this->_drupal->drupal_load_nodes('',array('limit' => '4,12'));
       
    while(sizeof($blogs) > 0){
    	$blog = array_shift($blogs);
    	$return .= grid_item($blog);
    }
    $this->content_footer->html = $return;
}




?>

