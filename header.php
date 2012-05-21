<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" media="screen, projection" href="<?php echo get_template_directory_uri(); ?>/stylesheets/screen.css">
<link href="http://fonts.googleapis.com/css?family=Cabin+Condensed:500" rel="stylesheet">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.min.js"></script>
<?php	wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="page">

  <div id="info-bar">

    <ul id="info-selectors">
      <li><a class="info-bar-icon info-box-loader" id="about-me-icn" data-infosection="about" href="" title="More about me"></a></li>
<?php /*      <li><a class="info-bar-icon info-box-loader" id="config-icn" data-infosection="config" href="" title="Display options for the site"></a></li> */ ?>
    </ul>

    <ul id="sm-links">
      <li><a class="info-bar-icon" id="github-icn" href="" title="Fork me on Github"></a></li>
      <li><a class="info-bar-icon" id="flickr-icn" href="" title="View my photos on Flickr"></a></li>
      <li><a class="info-bar-icon" id="twitter-icn" href="" title="Follow me on Twitter"></a></li>
      <li><a class="info-bar-icon" id="linkedin-icn" href="" title="View my profile on Linkedin"></a></li>
      <li><a class="info-bar-icon" id="gplus-icn" href="" title="Add me to your circles on Google+"></a></li>
      <li><a class="info-bar-icon" id="subscribe-icn" href="" title="Subscribe to my RSS feed"></a></li>
    </ul>

  </div>
  <div id="info-box">
    <?php /*<div>

    <section class="info-box-segment">
      <h1 class="info-segment-title">Me, Phil Parsons</h1>
      <p>
        <img class="align-left" src="http://www.gravatar.com/avatar/<?php echo md5("phil@profilepicture.co.uk");
?>?s=48" alt="My Gravatar">
        This is an example page. It’s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:
Hi there! I’m a bike messenger by day, aspiring actor by night, and this is my blog.
      </p>
    </section>

    <section class="info-box-segment">
      <h1 class="info-segment-title">Achievements</h1>
      <div id="cw-badges"></div>
    </section>

    <section class="info-box-segment">
      <h1 class="info-segment-title">Skills</h1>
      <ul class="skill-bars">
        <li class="skill-bar">
          <h2 class="skill">
            <span class="skill-level" data-level="95"></span>
            <span class="skill-title">JavaScript &amp; jQuery</span>
          </h2>
          <div class="skill-total">95%</div>
        </li>
        <li class="skill-bar">
          <h2 class="skill">
            <span class="skill-level" data-level="80"></span>
            <span class="skill-title">HTML(5), CSS(3) &amp; SASS</span>
          </h2>
          <div class="skill-total">80%</div>
        </li>
        <li class="skill-bar">
          <h2 class="skill">
            <span class="skill-level" data-level="90"></span>
            <span class="skill-title">PHP &amp; ColdFusion</span>
          </h2>
          <div class="skill-total">90%</div>
        </li>
        <li class="skill-bar">
          <h2 class="skill">
            <span class="skill-level" data-level="65"></span>
            <span class="skill-title">Ruby &amp; Rails</span>
          </h2>
          <div class="skill-total">65%</div>
        </li>
        <li class="skill-bar">
          <h2 class="skill">
            <span class="skill-level" data-level="75"></span>
            <span class="skill-title">Photoshop</span>
          </h2>
          <div class="skill-total">75%</div>
        </li>
      </ul>
    </section>

    </div>*/ ?>
  </div>

	<header id="branding" role="banner">

    <h1 id="site-title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    </h1>

    <nav id="access" role="navigation">
      <h2 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h2>

      <div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
      <div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>

      <?php wp_nav_menu( array( 'menu' => 'primary', 'container' => FALSE, 'walker' => new Main_Menu_Walker() ) ); ?>
    </nav><!-- #access -->

	</header><!-- #branding -->

	<div id="main" role="main">
