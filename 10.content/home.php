<?php

$this->content->html = homepage();
$this->content->title = 'Planet of the Penguins: Writing, Creativity, Technology, and Where They Meet. By Chris Lynch';

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
    
    $return .= '<hr>';
    $return .= '<h1>Quick Posts and Shares</h1>';
    
    $blogs = e::_search('10.content/posts');
    foreach($blogs as $blog){
        $teaser = homepage_teaser(@$blog->content->html);
        $teaser = str_ireplace('<h1>', '<h3>', $teaser);
        $teaser = str_ireplace('</h1>', '</h3>', $teaser);
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