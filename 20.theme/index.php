<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        	<base href="<?= $this->_basehref() ?>">

	        <link rel="icon" type="image/png" href="favicon.ico">

        	<!-- Title and SEO information -->
        	<title></title>

	        <meta name="keywords" content="" />
	        <meta name="description" content="" />
        	<meta name="abstract" content="" />

	        <meta name="copyright" content="" />

	        <!-- URL canonicalisation -->
        	<link rel="canonical" href="" />

	        <!-- ROBOTS directives -->	
        	<meta name="robots" content="index,follow" />
        
	        <!-- Blueprint CSS http://www.blueprintcss.org -->
        	<link rel="stylesheet" href="_e/lib/blueprint/src/grid.css" type="text/css" media="screen, projection">		
	        <!--[if lt IE 8]>
                <link rel="stylesheet" href="_e/lib/blueprint/ie.css" type="text/css" media="screen, projection">
	        <![endif]-->

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
            <div class="container-container">
                <div id="header-menu">
                    <a href="#">HOME</a>
                </div>
                <div id="header">
                    <strong>planet of the penguins: </strong>a blog about <em>writing</em>, <em>technology</em>, and colliding them together on the <em>internet</em>
                </div>
		<div class="container">
                    <div id="content" class="span-16">
                            <?php print @$this->content->html; ?>
                    </div>
                    <div id="sidebar" class="span-8 last">
                        <div id="sidebar-contents">
                            <?php print @$this->sidebar->html; ?>
                            
                            <!-- <h3>Radio Chris</h3> -->
                            <?php // print theme_sidebar_podcasts(); ?>
                        </div>
                    </div>
                    <div id="footer" class="span-24 last">
                        
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