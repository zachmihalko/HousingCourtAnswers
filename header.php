<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php esc_attr(bloginfo('charset')) ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>

		<!-- For iPad with high-resolution Retina display running iOS ≥ 7: -->
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/favicon-152.png">

		<!-- For iPad with high-resolution Retina display running iOS ≤ 6: -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/favicon-144.png">

		<!-- For iPhone with high-resolution Retina display running iOS ≥ 7: -->
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/favicon-120.png">

		<!-- For iPhone with high-resolution Retina display running iOS ≤ 6: -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/favicon-114.png">

		<!-- For first- and second-generation iPad: -->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/favicon-72.png">

		<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/favicon-57.png">

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<?php wp_head(); ?>
	</head>
	<body data-spy="scroll" data-target="#scroll-spy" data-offset="60" <?php body_class('no-js'); ?>>
	    <?php if ( ( is_front_page() )  ) { 
	
			//include 'inc/default-nav.php'; 
		?>
		<header class="navbar navbar-default navbar-fixed-top" id="top" role="banner">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hca-navbar" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/hcalogo.png" alt="" class="img-responsive"><span class="logo hidden-sm visible-xs-*">Housing Court Answers</span></a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <nav id="hca-navbar" class="collapse navbar-collapse navbar-right">
		    <?php
					if( has_nav_menu( 'main' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'main',
							'container' => false,
							'depth' => -1,
							'menu_class' => 'nav navbar-nav',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
						) );
					}

			  ?>
		      <ul class="nav navbar-nav">
		        <a class="btn btn-primary donate-button" role="button" href="#">Donate</a>
		      </ul>
		    </nav><!-- /.navbar-collapse -->
		  </div><!-- /.container -->
        </header>
        <?php } elseif ( ( is_search() )  ) { ?>
        
        <header class="navbar navbar-default navbar-fixed-top" id="top" role="banner">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hca-navbar" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/hcalogo.png" alt="" class="img-responsive"><span class="logo hidden-sm visible-xs-*">Housing Court Answers</span></a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <nav id="hca-navbar" class="collapse navbar-collapse navbar-right">
		    <?php
					if( has_nav_menu( 'main' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'main',
							'container' => false,
							'depth' => -1,
							'menu_class' => 'nav navbar-nav',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
						) );
					}

			  ?>
		      <ul class="nav navbar-nav">
		        <a class="btn btn-primary donate-button" role="button" href="#">Donate</a>
		      </ul>
		    </nav><!-- /.navbar-collapse -->
		  </div><!-- /.container -->
        </header>
        
        <?php } else { ?>
        
        <header class="navbar navbar-default navbar-fixed-top" id="top" role="banner">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hca-navbar" area-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/hcalogo.png" alt="" class="img-responsive"><span class="logo hidden-sm hidden-md visible-xs-*">Housing Court Answers</span></a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <nav id="hca-navbar" class="collapse navbar-collapse navbar-right">
		    <div class="navbar-form navbar-right hidden-sm" role="search">
		        <?php get_search_form(); ?>
		    </div>
		    <?php
					if( has_nav_menu( 'main' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'main',
							'container' => false,
							'depth' => -1,
							'menu_class' => 'nav navbar-nav',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
						) );
					}

			  ?>
		    
		      <ul class="nav navbar-nav">
		        <a class="btn btn-primary donate-button" role="button" href="#">Donate</a>
		      </ul>
		    </nav><!-- /.navbar-collapse -->
		  </div><!-- /.container -->
        </header>
        
	        
         <?php } ?>
<section class="site-content" id="site-content">
