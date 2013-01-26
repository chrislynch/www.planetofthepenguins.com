<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        	<base href="<?= $this->_basehref() ?>">

	        <link rel="icon" type="image/png" href="favicon.ico">

        	<!-- Title and SEO information -->
        	<title><?= $this->content->title ?></title>

	        <meta name="keywords" content="" />
	        <meta name="description" content="" />
        	<meta name="abstract" content="" />

	        <meta name="copyright" content="" />

	        <!-- URL canonicalisation -->
        	<link rel="canonical" href="" />

	        <!-- ROBOTS directives -->	
        	<meta name="robots" content="index,follow" />
        
	        
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


                <link rel="stylesheet" href="_e/lib/skeleton/stylesheets/base.css">
                <link rel="stylesheet" href="_e/lib/skeleton/stylesheets/skeleton.css">
                <link rel="stylesheet" href="_e/lib/skeleton/stylesheets/layout.css">

                <!-- Font CSS -->
                <link href='http://fonts.googleapis.com/css?family=Donegal+One' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
                
	        <!-- Template CSS -->
	        <link rel="stylesheet" href="style.css" type="text/css" media="screen, projection">
        
	        <!-- JQuery -->
        	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

        	<!-- Colour Box -->
        	<link rel="stylesheet" href="_e/lib/colorbox/colorbox/colorbox.css" />
        	<script src="_k/lib/colorbox/colorbox/jquery.colorbox-min.js"></script>
        
	</head>
	<body>
            <div class="container sixteen columns">
                <div id="header-menu" class="sixteen columns alpha omega">
                    <a href="#">HOME</a>
                </div>
                <div id="header" class="sixteen columns alpha omega">
                    <strong>planet of the penguins: </strong>a blog about <em>writing</em>, <em>comics</em>, <em>technology</em>, and colliding them together on the <em>internet</em>&nbsp;
                </div>
		<div class="sixteen columns">
                    <div id="content" class="ten columns alpha">
                            <?php print @$this->content->html; ?>
                    </div>
                    <div id="sidebar" class="six columns omega">
                        <div id="sidebar-contents">
                            <?php print @$this->sidebar->html; ?>
                            
                            <!-- <h3>Radio Chris</h3> -->
                            <?php // print theme_sidebar_podcasts(); ?>
                        </div>
                    </div>
                    <div id="footer" class="sixteen columns">
                        
                    </div>
		</div>
            </div>
	</body>
</html>

<?php

function theme_sidebar_podcasts(){
    $return = '<ul>';
    $podcasts = e::_search('10.content/podcasts');
    foreach ($podcasts as $podcast){
        $return .= '<li>' . $podcast->content->title . '</li>';
    }
    $return .= '</ul>';
    return $return;
}

?>