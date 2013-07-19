<?php
function teaser($content,$characters = 250,$extraallowedtags = '',$taglistoverride = '<h1>,<p>,</p>,<br>,') {
    $content = strip_tags($content,$taglistoverride . $extraallowedtags);
    $content = substr($content,0,$characters);
    return $content;
}

function headline_item($blog){
    $return = '';
    $return .= '<div class="headline_item sixteen columns">';
    $return .= '<div class="six columns alpha image_container">';
    $return .= '<a href="' . $blog['url'] . '">';
    if (isset($blog['field_primary_image_filename']) && strlen(trim($blog['field_primary_image_filename'])) > 1){
        $blog['field_primary_image_filename'] = explode('|',$blog['field_primary_image_filename']);
        $return .= '<img src="http://www.planetofthepenguins.com/_admin/sites/default/files/' . array_shift($blog['field_primary_image_filename']) .'">';
    } else {
        $return .= '<img src="_images/tux-batman.png">';
    }
    $return .= '</a>';
    $return .= '</div>';
    $return .= '<div class="ten columns omega">';
    $return .= '<a href="' . $blog['url'] . '">';
    $return .= '<h1>' . $blog['title'] . '</h1>';
    $return .= '</a>';
    $return .= Markdown($blog['body_summary']);
    $return .= '<p>Posted :' . $blog['created'] . '</p>';
    $return .= '</div>';
    $return .= '</div>';
    return $return;
}

function grid_item($blog){
    $return = '';
    $return .= '<div class="grid_item four columns omega">';
    $return .= '<a href="' . $blog['url'] . '">';
    $return .= '<div class="image_container">';
    if (isset($blog['field_primary_image_filename']) && strlen(trim($blog['field_primary_image_filename'])) > 1){
        $blog['field_primary_image_filename'] = explode('|',$blog['field_primary_image_filename']);
        $return .= '<img src="http://www.planetofthepenguins.com/_admin/sites/default/files/' . array_shift($blog['field_primary_image_filename']) .'">';
    } else {
        $return .= '<img src="_images/tux-batman.png">';
    }
    $return .= '</div>';
    $return .= '<h2>' . $blog['title'] . '</h2>';
    $return .= '</a>';
    $return .= '<p>Posted :' . $blog['created'] . '</p>';
    $return .= '</div>';
    return $return;
}

function item($blog){
    $return = '';
    
    $return .= '<a href="' . $blog['url'] . '">';
    if (isset($blog['field_primary_image_filename']) && strlen(trim($blog['field_primary_image_filename'])) > 1){
        $blog['field_primary_image_filename'] = explode('|',$blog['field_primary_image_filename']);
        $return .= '<img src="http://www.planetofthepenguins.com/_admin/sites/default/files/' . array_shift($blog['field_primary_image_filename']) .'">';
    } else {
        $return .= '<img src="_images/tux-batman.png">';
    }
    $return .= '</a>';
    
    $return .= '<a href="' . $blog['url'] . '">';
    $return .= '<h1>' . $blog['title'] . '</h1>';
    $return .= '</a>';
    
    $return .= Markdown($blog['body_value']);
    $return .= '<hr>';
    
    $return .= '
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = "planetofthepenguins"; // required: replace example with your forum shortname

        /* * * DONT EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement("script"); dsq.type = "text/javascript"; dsq.async = true;
            dsq.src = "//" + disqus_shortname + ".disqus.com/embed.js";
            (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>';
    
    
    $return .= '<p>Posted :' . $blog['created'] . '</p>';
    
    return $return;
}

?>
