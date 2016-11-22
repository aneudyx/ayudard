<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title><?php bloginfo('name'); ?></title>
	
	<!-- Meta -->
	<meta property="og:title" content="Ayuda RD - Una mano solidaria a tu país" />
	<meta property="og:site_name" content="Ayuda RD"/>
	<meta property="og:url" content="http://ayudard.com/" />
	<meta property="og:description" content="Nuestro fin es proveerte un listado de todos los centros de acopio, de manera que puedas ayudar a los afectados por las lluvias" />
	<meta property="og:image" content="http://ayudard.com/wp-content/themes/ayudard_template/screenshot.png" />
	
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@AyudaRD" />
	<meta name="twitter:title" content="Ayuda RD - Una mano solidaria a tu país" />
	<meta name="twitter:description" content="Nuestro fin es proveerte los lugares donde estan los damnificados y sus necesidades, para que puedas ayudar via los centros de acopio" />
	<meta name="twitter:image" content="<?php bloginfo('template_url'); ?>/screenshot.png" />
	<meta name="twitter:url" content="<?php echo site_url(); ?>" />

    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />

    <meta name="description" content="">

    <!-- CSS -->
    <link href="<?php bloginfo('template_url'); ?>/assets/css/preload.css" rel="stylesheet">

    <!-- Compiled in vendors.js -->
    <!--
    <link href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/animate.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/slidebars.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/lightbox.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_url'); ?>/assets/css/buttons.css" rel="stylesheet">
    -->

    <link href="<?php bloginfo('template_url'); ?>/assets/css/vendors.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/syntaxhighlighter/shCore.css" rel="stylesheet" >

    <!-- RS5.0 Stylesheet -->
    <!--<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/settings.css">
    <link rel="stylesheet" type="text/css" href="a<?php bloginfo('template_url'); ?>/ssets/css/layers.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/navigation.css">-->

    <link href="<?php bloginfo('template_url'); ?>/assets/css/style-blue.css" rel="stylesheet" title="default">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/width-full.css" rel="stylesheet" title="default">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="<?php bloginfo('template_url'); ?>/assets/js/html5shiv.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/assets/js/respond.min.js"></script>
    <![endif]-->
	
	
	
	<?php wp_head(); ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-87686693-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>

<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

<body>
	
<div class="sb-site-container">
<div class="boxed">


<nav class="navbar navbar-default yamm navbar-static-top" role="navigation" id="header">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <a id="ar-brand" class="navbar-brand" href="<?php echo site_url(); ?>">Ayuda<span>RD</span></a>
        </div> <!-- navbar-header -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo site_url(); ?>">Inicio</a>
                     
                </li>
                <li>
                    <a href="<?php echo site_url(); ?>/fundaciones" >Centros De Acopio</a>
                </li>
				<li>
                    <a href="https://donorbox.org/somos-puerto-plata" target="_blank">Jompeame</a>                    
                </li>
				<li>
                    <a href="<?php echo site_url(); ?>/contactos">Contactos</a>                    
                </li>
             </ul>
        </div><!-- navbar-collapse -->
    </div><!-- container -->
</nav>
