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
                $this->content->html = Markdown($node['body_value']);
                if (isset($_GET['debug'])){
                	$this->content->html .= "<pre>" . print_r($node,TRUE) . "</pre>";
                }
            } else {
                // Multiple nodes
                foreach($nodes as $node){
                        print "<a href='{$node['url']}'><h2>{$node['title']}</h2></a>";
                        if (strlen($node['body_summary']) > 0){
                                print Markdown($node['body_summary']);
                        } else {
                                $node['body_summary'] = Markdown($node['body_value']);
                                $node['body_summary'] = substr($node['body_summary'],0,strpos($node['body_summary'],'</p>'));
                                print $node['body_summary'];
                        }	
                }
            }
        }	
} else {
    $this->content->html = homepage($this);
    $this->content->title = 'Planet of the Penguins: Writing, Comics, Creativity, Technology, and Where They Meet. By Chris Lynch';            
}
	
function homepage(&$e) {
    $return = '';
    $blogs = $e->_drupal->drupal_load_nodes('n.sticky = 1');
       
    while(sizeof($blogs) > 0){
    	$blog = array_shift($blogs);
    	$return .= '<div class="ten columns head">';
    	$teaser = '';
    	$teaser .= Markdown(teaser($blog['body_value'],750,'<img><iframe>'));
    	$teaser = str_ireplace('<h1>', '<a href="' . $blog['url'] . '"><h1>', $teaser);
    	$teaser = str_ireplace('</h1>', '</h1></a>', $teaser);
    	$return .= $teaser;
    	$return .= " ...<p><strong><a href='{$blog['url']}'>Read More about '{$blog['title']}'</a></strong></p>";
    	$return .= '</div><hr>';
    }
    
    $blogs = $e->_drupal->drupal_load_nodes('n.sticky = 0');
       
    while(sizeof($blogs) > 0){
    	$blog = array_shift($blogs);
    	$return .= '<div class="ten columns head">';
    	$teaser = '';
    	$teaser .= Markdown(teaser($blog['body_value'],500,'<img><iframe>'));
    	$teaser = str_ireplace('<h1>', '<a href="' . $blog['url'] . '"><h2>', $teaser);
    	$teaser = str_ireplace('</h1>', '</h2></a>', $teaser);
    	$return .= $teaser;
    	$return .= " ...<p><strong><a href='{$blog['url']}'>Read More about '{$blog['title']}'</a></strong></p>";
    	$return .= '</div><hr>';
    }
    
    /*
    $i = 2;
    while ($i > 0 && (sizeof($blogs) > 0)){
        $blog = array_shift($blogs);
        $teaser = teaser($blog->content->html,700,'<img>');
        $teaser = str_ireplace('<h1>', '<a href="' . $blog->content->url . '"><h2>', $teaser);
        $teaser = str_ireplace('</h1>', '</h2></a>', $teaser);
        $return .= '<div class="ten columns subhead">';
        $return .= $teaser;
        $return .= " ...<p><strong><a href='{$blog->content->url}'>Read More about '{$blog->content->title}'</a></strong></p>";
        $return .= '</div><hr>';
        $i--;
    }
    
    $i = 10;
    while ($i > 0 && (sizeof($blogs)> 0)){
        $blog = array_shift($blogs);
        $teaser = teaser(@$blog->content->html);
        $teaser = str_ireplace('<h1>', '<a href="' . $blog->content->url . '"><h3>', $teaser);
        $teaser = str_ireplace('</h1>', '</h3></a>', $teaser);
        $return .= '<div class="five columns alpha grid">';
        $return .= $teaser;
        $return .= " ...<p><strong><a href='{$blog->content->url}'>Read More about '{$blog->content->title}'</a></strong></p>";
        $return .= '</div>';
        $i--;
    }

    $return .= '<hr>';
    $return .= '<h2 class="invert">Latest Shares on Google+</h2>';
    $blogs = e::_search('10.content/shares');
    $i = 10;
    while ($i > 0 && (sizeof($blogs) > 0)){
        $blog = array_shift($blogs);
        $teaser = $blog->content->html;
        $teaser = str_ireplace('<h1>', '<a href="' . $blog->content->url . '"><h4>', $teaser);
        $teaser = str_ireplace('</h1>', '</h4></a>', $teaser);
        $teaser = strip_tags($teaser,'<h4><img><a>');
        $return .= '<div class="ten columns subhead">';
        $return .= $teaser;
        $return .= '</div><hr>';
        $i--;
    }
*/
    return $return;
    
}

?>
