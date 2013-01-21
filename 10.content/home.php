<?php

$this->content->html = homepage();

function homepage() {
    $return = '';
    $blogs = e::_search('10.content/pages');
    
    $blog = array_shift($blogs);
    $return .= homepage_teaser($blog->content->html,500);
    $return .= " ...<p><strong><a href='{$blog->content->url}'>Read More about '{$blog->content->title}'</a></strong></p>";
    
    foreach($blogs as $blog){
        $teaser = homepage_teaser(@$blog->content->html);
        $teaser = str_ireplace('<h1>', '<h2>', $teaser);
        $teaser = str_ireplace('</h1>', '</h2>', $teaser);
        $return .= $teaser;
        $return .= " ...<p><strong><a href='{$blog->content->url}'>Read More about '{$blog->content->title}'</a></strong></p>";
    }
    
    return $return;
}

function homepage_teaser($content,$characters = 250) {
    $content = strip_tags($content,'<h1>,<p>,</p>,<br>');
    $content = substr($content,0,$characters);
    return $content;
}

?>