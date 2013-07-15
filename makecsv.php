<?php
$dir = '/home/chris/Github/www.planetofthepenguins.com/10.content/posts';
$dirs = scandir($dir);
$csv = fopen('output.csv','w');
fputcsv($csv,array('guid','title','published','body'));
foreach($dirs as $postdir){
	if ($postdir !== '.' AND $postdir !== '..'){
		$files = scandir($dir . '/' . $postdir);
		foreach($files as $file) {
			if($file !== '.' AND $file !== '..') {
				if(strstr($file,'.html')){
                                        $guid = $dir . '/' . $postdir . '/' . $file;
					$post = file_get_contents($dir . '/' . $postdir . '/' . $file);
					// $post = str_ireplace('"','""',$post);

					$postdate = array_shift(explode('.',$postdir));
                                        $unixtime = array();
                                        $unixtime['year'] = substr($postdate,0,4);
                                        $unixtime['month'] = substr($postdate,4,2);
                                        $unixtime['day'] = substr($postdate,6,2);
                                        $unixtime['hour'] = substr($postdate,8,2);
                                        $unixtime['minute'] = substr($postdate,10,2);
                                        $unixtime['second'] = substr($postdate,12,2);
                                        if($unixtime['second'] == '') $unixtime['second'] = '00';
                                        
                                        print_r($unixtime);
                                        $postdate = mktime($unixtime['hour'],$unixtime['minute'],$unixtime['second'],
                                                            $unixtime['month'],$unixtime['day'],$unixtime['year']);
					
					$file = str_ireplace('.html','',$file);
					$file = str_ireplace('-',' ',$file);
					$file = ucwords($file);

					fputcsv($csv,array($guid,$file,$postdate,$post),',','"');
					print "Exported $file\n";
				}
			}
		}
	}
}

fclose($csv);

?>
