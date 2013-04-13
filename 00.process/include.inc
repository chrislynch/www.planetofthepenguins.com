<?php
function teaser($content,$characters = 250,$extraallowedtags = '',$taglistoverride = '<h1>,<p>,</p>,<br>,') {
    $content = strip_tags($content,$taglistoverride . $extraallowedtags);
    $content = substr($content,0,$characters);
    return $content;
}
?>
