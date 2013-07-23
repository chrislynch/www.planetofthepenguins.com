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
	        <link rel="stylesheet" href="style.css?updated=20130719" type="text/css" media="screen, projection">
        
	        <!-- JQuery -->
        	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

        	<!-- Colour Box -->
        	<link rel="stylesheet" href="_e/lib/colorbox/colorbox/colorbox.css" />
        	<script src="_k/lib/colorbox/colorbox/jquery.colorbox-min.js"></script>
        
	</head>
	<body>
            <div class="container">
		<!--
                <div id="header-menu" class="sixteen columns alpha omega" align="right">
                    <a href="http://www.facebook.com/thefictionalist"><img src="_images/icons/Facebook.png"></a>
                    <a href="https://github.com/chrislynch"><img src="_images/icons/Github.png"></a>
                    <a href="http://uk.linkedin.com/in/chrislynchtechnologywriter/"><img src="_images/icons/LinkedIn.png"></a>
                    <a href="https://www.twitter.com/chrislynch_mwm"><img src="_images/icons/Twitter.png"></a>
                    <a href="http://www.youtube.com/user/chrislynch"><img src="_images/icons/Youtube.png"></a>
                    <a href="xml/rss"><img src="_images/icons/RSS.png"></a>
                </div>
		-->
                <div id="header" class="sixteen columns alpha omega">
                    <strong><a href="">chris lynch's planet of the penguins</a>: </strong>a blog about <em>writing</em>, <em>comics</em>, <em>technology</em>, and colliding them together on the <em>internet</em>&nbsp;
                </div>
                <div id="banner" class="sixteen columns">
                	<?php 
                	print @$this->banner->html;
                	?>
                </div>
				<div id="content" class="sixteen columns">
                    <?php 
                    if (strlen(trim(@$this->sidebar->html)) > 0) {
                        print '<div class="ten columns alpha">' . $this->content->html . '</div>' . 
                                '<div id="sidebar" class="six columns omega"><div id="sidebar_content">' . @$this->sidebar->html . '</div></div>';
                    } else {
                        print @$this->content->html; 
                    }
                    ?>
                </div> 
                <div id="content_bar" class="sixteen columns">
                    <?php print @$this->content_bar->html; ?>
                </div> 
                <div id="content_footer" class="sixteen columns">
                    <?php print @$this->content_footer->html; ?>
                </div> 
                <div id="footer" class="sixteen columns alpha omega">
                    <div class="five columns">
                        <h4>Chris Lynch:<br>Writing and Creativity</h4>
                        <p>Chris Lynch is an award winning writer based in Cardiff, UK.</p>
                        <p>Chris wrote <a href="http://www.thedarkcomicbook.com">The Dark</a> for AAM/Markosia, and is the 
                            co-creator of the seminal UK horror anthology <strong>Monkeys with Machineguns</strong>.</p>
                        <p>Chris also edited the Red Cross Charity Anthology <a href="http://www.lulu.com/spotlight/mwm">"Hammer of Time</a>.</p>
                        <p>Chris has written for a number of UK and US publications; including work for The Judge Dredd Megazine, Arcana, 2026 Books, Accent UK, Something Wicked, The Sorrow, and Insomnia Publications.</p>
                    </div>
                    <div class="five columns alpha">
                        <h4>Chris Lynch:<br>Technology and eCommerce</h4>
                        <p>Chris Lynch is CTO of <a href="http://www.ecommercecentric.co.uk">eCommerce Centric</a>, 
                           who own and run such brands as <a href="http://www.technologycentric.co.uk). ">Android Tablet store Technology Centric</a>.</p>
                        <p>Chris created the <strong>engine4 PHP Framework</strong> as part of this work with <a href="http://www.gravit-e.co.uk">UK eCommerce development company Gravit-e Centric</a>,
                            of which he is also CTO, and released the code as open source in early 2013.
                        <p>Chris also created the <a href="pages/bubble">Bubble Plain Text Comics Markup Language</a>.</p>
                        <p>Chris blogs about technology, the internet, and eBusiness both here and for eCommerce Centric and Gravit-e Centric.
                            Chris has also been published by Linux.com.</p>
                    </div>
                    <div class="six columns omega">
                        <h4>Contact Chris Lynch</h4>
                        <div><a href="http://www.facebook.com/thefictionalist"><img src="_images/icons/Facebook.png" style="vertical-align:middle">Chris Lynch on Facebook</a></div>
                        <div><a href="https://github.com/chrislynch"><img src="_images/icons/Github.png" style="vertical-align:middle">Chris Lynch on Github</a></div>
                        <div><a href="http://uk.linkedin.com/in/chrislynchtechnologywriter/"><img src="_images/icons/LinkedIn.png" style="vertical-align:middle">Chris Lynch on LinkedIn</a></div>
                        <div><a href="https://www.twitter.com/chrislynch_mwm"><img src="_images/icons/Twitter.png" style="vertical-align:middle">Chris Lynch on Twitter</a></div>
                        <div><a href="http://www.youtube.com/user/chrislynch"><img src="_images/icons/Youtube.png" style="vertical-align:middle">Chris Lynch on YouTube</a></div>
                        <div><a href="xml/rss"><img src="_images/icons/RSS.png" style="vertical-align:middle">Chris Lynch RSS Feed</a></div>
                    </div>
                    <div class="sixteen columns">
                        <p align="center">
                            <strong>Disclaimer: All views and opinions on this website are Chris' own, and not those of his businesses, employers, clients, or publishers.</strong>
                        </p>
                    </div>
                </div>
            </div>
	</body>
</html>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1031684-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

    
