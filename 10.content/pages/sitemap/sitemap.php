<?php

$this->content->html = sitemap();
$this->content->title = 'Planet of the Penguins: Writing, Comics, Creativity, Technology, and Where They Meet. By Chris Lynch';

function sitemap() {
    $return = '<ul>';
    $blogs = e::_search('10.content/posts');
    
    foreach ($blogs as $blog){
        
        $return .= '<li><a href="' . $blog->content->url . '">' . $blog->content->title . '</a></li>';
        
    }
    $return .= '</ul>';
       
    return $return;
}

?>
