<?php

$rss = new DOMDocument();
$rss->load('http://gplusrss.com/rss/feed/b6f35c7c9d9a1ac73eba1a6e196929ce51423a87d828b');
$feed = array();
foreach ($rss->getElementsByTagName('item') as $node) {
    $item = array ( 
        'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
        'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
        'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
        'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
        );
    array_push($feed, $item);
}
$limit = 20;
for($x=0;$x<$limit;$x++) {
    $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
    $link = $feed[$x]['link'];
    $description = $feed[$x]['desc'];
    $date = date('l F d, Y', strtotime($feed[$x]['date']));
    
    if (strlen($title > 0)){
        echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
        echo '<small><em>Posted on '.$date.'</em></small></p>';
        echo '<p>'. strip_tags($description,'<img>,<p>,<br>') .'</p>';
    }

}


?>