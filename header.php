<?php if(!is_user_logged_in()){
	header("Location: http://horizonindy.org/hcs/");
	die();
} ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php if (!is_home()){ wp_title( '| HCS', true, 'right' ); }else{ echo 'Horizon Christian School'; } ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/webflow.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/hcsindy.addedstyles.css">	
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic","Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic"]
      }
    });
  </script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
</head>
	
<body<?php if (is_home()) echo ' class="homepage"';?>>
	
  <div class="w-section navbar-section">
    <div class="navbar-background">
      <div class="w-container navbar-container">
        <div class="w-row hide-phone">
          <div class="w-col w-col-3 w-col-small-3 header-logo-col">
            <div class="w-row mobile-nav-row">
			  <div class="w-col w-col-9 w-col-tiny-9"><a href="<?php echo home_url('/'); ?>" title="HCS Homepage"><img class="header-logo mobile-nav" src="<?php echo get_template_directory_uri(); ?>/images/website-logo-top-white-transparent.png"></a>
              </div>
              <div class="w-col w-col-3 w-col-tiny-3 mobile-nav-button">
                <div class="navbar-button">
					<img class="navbar-button-img" src="<?php echo get_template_directory_uri(); ?>/images/website-hamburger.svg">
                </div>
              </div>
			</div>
			  <a href="<?php echo home_url('/'); ?>" title="HCS Homepage">
				  <img class="header-logo" src="<?php echo get_template_directory_uri(); ?>/images/website-logo-top-white-transparent.png">
			  </a>
		  </div>
		
			<?php // The desktop nav: ?>
		  <div class="w-col w-col-9 hide-phone">
			<?wp_nav_menu( array(
				'theme_location' 	=> 'nav-menu', 
				'container_class'	=> 'top-nav w-row navbar-section-links',
				'depth'				=> '1',
				'menu-class'		=> 'w-row navbar-section-links',
				'walker'			=> new Walker_TopNav_Menu()
			) ); ?>
		  </div>
		</div>
  
		<?php // And the mobile nav: ?>
		<div class="w-nav webflow-navbar mobile-nav-row" data-collapse="tiny" data-animation="default" data-duration="400" data-contain="1">
			<div class="w-container webflow-navbar-container">
				<a class="w-nav-brand webflow-navbar-link" href="<?php echo home_url('/'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/website-logo-top-white-transparent.png">
				</a>
				<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'nav-menu',
					'depth'				=> '1',
					'items_wrap'		=> '<nav class="w-nav-menu webflow-navbar-menu" role="navigation">%3$s</nav>'
				) );
				?>
				<div class="w-nav-button webflow-navbar-button">
					<div class="w-icon-nav-menu webflow-navbar-icon"></div>
				</div>
			</div>
		</div>
    
	  </div>
    </div>
	  
	<?php /* Dropdowns. HTML code is in functions.php. I know, I know. */
	$printme = wp_nav_menu( array(
		'theme_location' 	=> 'nav-menu',
		'container'			=> 'div',
		'container_class'	=> 'w-container dropdown',
		'depth'				=> '2',
		'items_wrap'		=> '%3$s',
		'walker'			=> new Walker_TopNavDropDowns_Menu()
	) );
	?>
  </div>
	
<?php // HERO BLOCK //* The two bits of PHP here check if it is the homepage. If it IS NOT the homepage, the 'singlepage' class isn't added. If it IS the homepage, it adds the school motto and call to action. */?>
  <div class="w-section hero<?php echo (is_home() ? '': ' singlepage'); ?>">
	<?php if(is_home()){ ?>
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-2">
          <div>&nbsp;</div>
        </div>
        <div class="w-col w-col-6 hero-type-box">
          <h1 class="hero-heading">Sound academics,<br>solid faith!</h1><a class="button" href="<?php echo home_url('/about/'); ?>">LEARN MORE ABOUT HCS <img src="<?php echo get_template_directory_uri(); ?>/images/icon-arrow.svg"/></a>
        </div>
        <div class="w-col w-col-4">
          <div>&nbsp;</div>
        </div>
      </div>
    </div>
	  <?php }; ?>
  </div>
	
  <div class="w-section">
	
  <?php /*/ ALERT BLOCK /*/
  $hcs_alert_data = 0;
  if(is_home() && function_exists('hcs_alert')) $hcs_alert_data = hcs_alert();
  if($hcs_alert_data['alert_enbl']):?>
    <div class="w-container alert">
      <div class="w-row">
        <div class="w-col w-col-2"><img class="alert-img" src="<?php echo get_template_directory_uri(); ?>/images/warning-white.svg">
        </div>
        <div class="w-col w-col-10 alert-text">
          <h2 class="alert-heading"><?php echo $hcs_alert_data['alert_title']; ?></h2>
          <p class="alert-p"><?php echo $hcs_alert_data['alert_desc']; ?></p>
        </div>
      </div>
    </div>
  <?php endif; ?>

<?php // EVENTS // This is the event block on the homepage. */
		if (is_home()):
		?>
	<div class="w-container dates2">
		<div class="w-row dates2-row">
			<?php
				$eventhtml = sprintf(do_shortcode('[gcal id="503"]'),'','',' right');
				$today = current_time('l');
				$tomorrow = date('l', intval(current_time('U')) + 86400);
				$eventhtml = str_replace($tomorrow, 'Tomorrow', $eventhtml);
				$eventhtml = str_replace($today, 'Today', $eventhtml);
				$eventhtml = str_replace_nth('w-col w-col-4 dates2-col','w-col w-col-3 dates2-col',$eventhtml,2); // Replaces third instance
				echo $eventhtml;
			?>
			<div class="w-col w-col-1 dates2-arrow">
				<a href="http://horizonindy.org/youth/gce_feed/events/">
					<span class="phone-only">Event Calendar </span>
					<img src="<?php echo get_template_directory_uri(); ?>/images/icon-arrow.svg"/>
				</a>
			</div>
		</div>
	</div>
<?php endif; ?>
	  
<?php // MAIN CONTENT // This is the main content block. */ ?>
    <div class="w-container content<?php if(is_home()) echo ' content-nosidebar'; ?>">
		<div class="w-row">