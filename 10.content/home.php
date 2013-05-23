<?php

$this->content->html = homepage();
$this->content->title = 'Planet of the Penguins: Writing, Comics, Creativity, Technology, and Where They Meet. By Chris Lynch';

function homepage() {
    $return = '';
    $blogs = e::_search('10.content/posts');
    
    $blog = array_shift($blogs);
    $return .= '<div class="ten columns head">';
    $teaser .= teaser($blog->content->html,1400,'<img><iframe>');
    $teaser = str_ireplace('<h1>', '<a href="' . $blog->content->url . '"><h1>', $teaser);
    $teaser = str_ireplace('</h1>', '</h1></a>', $teaser);
    $return .= $teaser;
    $return .= " ...<p><strong><a href='{$blog->content->url}'>Read More about '{$blog->content->title}'</a></strong></p>";
    $return .= '</div><hr>';
    
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
        $return .= '<div class="ten columns subhead">';
        $return .= $teaser;
        $return .= '</div><hr>';
        $i--;
    }
   
    return $return;
}

?>
