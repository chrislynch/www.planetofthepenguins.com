<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        	<base href="<?= $this->_basehref() ?>">
		<meta name="google-site-verification" content="WLoyjKe5rrt9314tg-t09hxgsWkdwR1jjWZFTVYJfFA" />
	        <link rel="icon" type="image/png" href="favicon.ico">

        	<!-- Title and SEO information -->
        	<title><?= $this->content->title ?></title>

	        <meta name="keywords" content="comics,technology,writing,creativity" />
	        <meta name="description" content=
		<?php 
		if (isset($this->content->description)) { print '"' . $this->content->description . '"';} else { print '"Website of UK based author, comics writer, and technologist Chris Lynch. A fusion of writing, creativity, and technology centric blogging."';}
		?> />
        	<meta name="abstract" content=
		<?php 
		if (isset($this->content->abstract)) { print '"' . $this->content->abstract . '"';} else { print '"Website of UK based author, comics writer, and technologist Chris Lynch. A fusion of writing, creativity, and technology centric blogging."';}
		?>/>

	        <meta name="copyright" content="Chris Lynch" />

	        <!-- URL canonicalisation -->
        	<link rel="canonical" href="<?=$this->qp()?>" />

	        <!-- ROBOTS directives -->	
        	<meta name="robots" content="index,follow" />
        	        
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                <link rel="stylesheet" href="_e/lib/skeleton/stylesheets/base.css">
                <link rel="stylesheet" href="_e/lib/skeleton/stylesheets/skeleton.css">
                <link rel="stylesheet" href="_e/lib/skeleton/stylesheets/layout.css">

                <!-- Font CSS -->
                <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700,500,300' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
                
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
                <div id="header-menu" class="sixteen columns alpha omega" align="right">
                    <a href="http://www.facebook.com/thefictionalist"><img src="_images/icons/Facebook.png"></a>
                    <a href="https://github.com/chrislynch"><img src="_images/icons/Github.png"></a>
                    <a href="http://uk.linkedin.com/in/chrislynchtechnologywriter/"><img src="_images/icons/LinkedIn.png"></a>
                    <a href="https://www.twitter.com/chrislynch_mwm"><img src="_images/icons/Twitter.png"></a>
                    <a href="http://www.youtube.com/user/chrislynch"><img src="_images/icons/Youtube.png"></a>
                    <a href="xml/rss"><img src="_images/icons/RSS.png"></a>
                </div>
                <div id="header" class="sixteen columns alpha omega">
                    <strong><a href="">chris lynch's planet of the penguins</a>: </strong>a blog about <em>writing</em>, <em>comics</em>, <em>technology</em>, and colliding them together on the <em>internet</em>&nbsp;
                </div>
		<div class="sixteen columns">
		    <div id="content" class="ten columns alpha">
