<?php

$this->content->html = homepage();
$this->content->title = 'Planet of the Penguins: Writing, Comics, Creativity, Technology, and Where They Meet. By Chris Lynch';

function homepage() {
    $return = '';
    $blogs = e::_search('10.content/posts');
    
    $blog = array_shift($blogs);
    $return .= '<div class="ten columns head">';
    $return .= homepage_teaser($blog->content->html,500,'<img>');
    $return .= " ...<p><strong><a href='{$blog->content->url}'>Read More about '{$blog->content->title}'</a></strong></p>";
    $return .= '</div><hr>';
    
    $i = 2;
    while ($i > 0 && (sizeof($blogs) > 0)){
        $blog = array_shift($blogs);
        $teaser = homepage_teaser($blog->content->html,300,'<img>');
        $teaser = str_ireplace('<h1>', '<h2>', $teaser);
        $teaser = str_ireplace('</h1>', '</h2>', $teaser);
        $return .= '<div class="ten columns subhead">';
        $return .= $teaser;
        $return .= " ...<p><strong><a href='{$blog->content->url}'>Read More about '{$blog->content->title}'</a></strong></p>";
        $return .= '</div><hr>';
        $i--;
    }
    
    $i = 10;
    while ($i > 0 && (sizeof($blogs)> 0)){
        $blog = array_shift($blogs);
        $teaser = homepage_teaser(@$blog->content->html);
        $teaser = str_ireplace('<h1>', '<h3>', $teaser);
        $teaser = str_ireplace('</h1>', '</h3>', $teaser);
        $return .= '<div class="five columns alpha grid">';
        $return .= $teaser;
        $return .= " ...<p><strong><a href='{$blog->content->url}'>Read More about '{$blog->content->title}'</a></strong></p>";
        $return .= '</div>';
        $i--;
    }
       
    return $return;
}

function homepage_teaser($content,$characters = 250,$extraallowedtags = '') {
    $content = strip_tags($content,'<h1>,<p>,</p>,<br>' . $extraallowedtags);
    $content = substr($content,0,$characters);
    return $content;
}

?>