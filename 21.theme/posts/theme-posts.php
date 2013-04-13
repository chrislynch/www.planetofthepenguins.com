<?php 
	$this->content->html = str_ireplace('</h1>','</h1><p>Written By <a href="https://plus.google.com/u/0/116170374068555474888?
   rel=author">Chris Lynch</a>',@$this->content->html);
	print @$this->content->html; 
?>
<hr>
<br>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-1543873788475773";
/* Planet of the Penguins Posts Page Horizontal Bar */
google_ad_slot = "9928613547";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<center>
	<script type="text/javascript"
	src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
</center>
<br>
<h1 class="invert">Also on Planet of the Penguins</h1>
<?php

print theme_posts_others($this);

function theme_posts_others(&$e){
	$blogs = e::_search('10.content/posts');
	$i = 6;
	$return = '';
    	while ($i > 0 && (sizeof($blogs)> 0)){
		$blog = array_shift($blogs);
		if(!($blog->content->url == $e->content->url)){
			$teaser = teaser(@$blog->content->html);
			$teaser = str_ireplace('<h1>', '<a href="' . $blog->content->url . '"><h3 class="invert">', $teaser);
			$teaser = str_ireplace('</h1>', '</h3></a>', $teaser);
			$return .= '<div class="five columns alpha grid">';
			$return .= $teaser;
			$return .= " ...<p><strong><a href='{$blog->content->url}'>Read More about '{$blog->content->title}'</a></strong></p>";
			$return .= '</div>';
			$i--;
		}
		
    	}
	return $return;
}

?>
