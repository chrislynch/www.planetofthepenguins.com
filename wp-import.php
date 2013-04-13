<?php

$posts = fopen('/home/chris/Downloads/wp_posts.csv','r');

while ($post = fgetcsv($posts)){
	print_r($post);
	if($post[21] == 'post'){
		$file = str_ireplace('\"','',strtolower($post[5]));
		$file = str_ireplace('!','',$file);
		$file = str_ireplace('?','',$file);
		$file = str_ireplace('.','',$file);
		$file = str_ireplace("'",'',$file);
		$file = str_ireplace(' ','-',$file);

		$dir = $post[2];
		$dir = str_ireplace(' ','',$dir);
		$dir = str_ireplace(':','',$dir);
		$dir = str_ireplace('-','',$dir);
		$dir = $dir . '.' . $file;
	
		$content = '#' . str_ireplace('\"','',ucwords($post[5])) . "#\n" . str_ireplace('\"','"',$post[4]);

		mkdir('10.content/posts/' . $dir);
		file_put_contents('10.content/posts/' . $dir . '/' . $file . '.html',$content);
	}
}

?>
