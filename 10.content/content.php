<?php
$this->_loadPlugin('drupal');

$this->content->html = '<h1>404. Ballsack</h1>';
$this->content->title = 'Planet of the Penguins: Writing, Comics, Creativity, Technology, and Where They Meet. By Chris Lynch';            

if(strlen($this->p) > 0){
        $nodes = $this->_drupal->drupal_load_nodes_byURL($this->p);

        if($nodes === FALSE){
            $this->content->html = '<h1>404. Ballsack</h1>';
            $this->content->title = 'Planet of the Penguins: Writing, Comics, Creativity, Technology, and Where They Meet. By Chris Lynch';            
        } else {
            if (count($nodes) == 1){
                // Single node
                $node = array_shift($nodes);
                $this->content->title = $node['title'];
                $this->content->html = item($node);
                if (isset($_GET['debug'])){
                	$this->content->html .= "<pre>" . print_r($node,TRUE) . "</pre>";
                }
            } else {
                // Multiple nodes
                $this->content->html = '';
                foreach($nodes as $node){
                        $this->content->html .= grid_item($node);
                }
            }
        }	
} else {
    $return = '';
    $blogs = $this->_drupal->drupal_load_nodes('',array('limit' => '0,3'));
       
    while(sizeof($blogs) > 0){
    	$blog = array_shift($blogs);
    	$return .= headline_item($blog);
    }
    $this->content->html = $return;
    $this->content->title = 'Planet of the Penguins: Writing, Comics, Creativity, Technology, and Where They Meet. By Chris Lynch';            
}
	




?>
