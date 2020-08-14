<!doctype html>

<html <?php language_attributes(); ?>>
	<head> 
		<?php $theme_options = _WSH()->option(); ?>
		
		<meta charset="utf-8">
		<title>
		<?php if(is_home() || is_front_page()) {
		echo get_bloginfo('name').' - '.get_bloginfo('description');
		}
		else{
		wp_title('');
		echo ' - '.get_bloginfo('name'); 
		}?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- ============================================================== -->
		<!-- MIFW Theme Files -->
		<!-- ============================================================== -->
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/Front-End-Toolkit/build/main.min.js" ></script> 
		<!-- ============================================================== -->
		
		<?php echo ( sh_set( $theme_options, 'favicon' ) ) ? '<link rel="icon" type="image/png" href="'.sh_set( $options, 'favicon' ).'">': '';?>    
		
		  
		<?php wp_head(); ?>
	
	</head>
<?php $boxed = sh_set( $theme_options, 'boxed_version' );
	$boxed = sh_set( $_GET, 'boxed' ) ? true : $boxed; 
	  $dark = sh_set( $theme_options, 'dark_version' );
	  $dark = sh_set( $_GET, 'dark' ) ? true : $dark; 
 ?>


<?php $body_class = '';
$container_class = ( $boxed ) ? ' wrapper' : '';
$body_class .= ( $boxed ) ? ' boxed' : '';
$body_class .= ($dark ) ? ' dark-version' : ''; ?>

<body <?php body_class( $body_class ); ?>>
	
	<div id="container" class="<?php echo $container_class; ?>">

	<header>

	<div class="sub-header clearfix">
		<div class="wrapper">
			<?php if( $policy_page = sh_set( $theme_options, 'policy_page' ) || $aboutus_page = sh_set( $theme_options, 'aboutus_page' ) || $login_page = sh_set( $theme_options, 'login_page' ) || $contactus_page = sh_set( $theme_options, 'contactus_page' ) ) { ?>
				<ul>
            
            	<?php if( $policy_page = sh_set( $theme_options, 'policy_page' ) ): ?>
                    <li>
       	<i class="fa fa-caret-square-o-right"></i><a href="<?php echo get_permalink( $policy_page ); ?>">terms & conditions</a>
                    </li>
                <?php endif; ?>
                
               	<?php if( $aboutus_page = sh_set( $theme_options, 'aboutus_page' ) ): ?>
            
				<li>
			<i class="fa fa-caret-square-o-right"></i><a href="<?php echo get_permalink( $aboutus_page ); ?>">about us</a>
            	</li>
                <?php endif; ?>
				
                 <?php if( $login_page = sh_set( $theme_options, 'login_page' ) ): ?>

                <li>
				<i class="fa fa-caret-square-o-right"></i><a href="<?php echo get_permalink( $login_page ); ?>">login</a>
				</li>
                <?php endif; ?>
                
				<?php if( $contactus_page = sh_set( $theme_options, 'contactus_page' ) ): ?>
				<li>
				<i class="fa fa-caret-square-o-right"></i><a href="<?php echo get_permalink( $contactus_page ); ?>">contact us</a>
				</li>
                <?php endif; ?>
			</ul>
			<?php } ?>
			<div class="socials">
            
     			<?php $socializing = sh_set( sh_set( $theme_options, 'social_icons' ), 'social_icons' );?>
				
                <?php if( $socializing ) foreach( $socializing as $social ): ?>
                <?php if (sh_set($social,'tocopy') || !sh_set( $social, 'icon' ) ) continue ?> 
                <a target="_blank" href="<?php echo sh_set( $social, 'link' ); ?>" title="<?php echo sh_set( $social, 'title' ); ?>"><i class="fa <?php echo sh_set( $social, 'icon' ); ?>"></i></a>
              	<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="upper-header wrapper">
		<div class="logo">   
                    


                         <?php
							  
							  if( sh_set( $theme_options, 'logo_type' ) == 'text' )
							  {
								  $LogoStyle = sh_get_font_settings( array( 'logo_font_size' => 'font-size', 'logo_font_face' => 'font-family', 'logo_font_style' => 'font-style', 'logo_color' => 'color' ), ' style="', '"' );
								  $Logo = $theme_options['logo_heading'];
								  $Slogan = $theme_options['slogan_heading'];
								  
							  }
							  else
							  {
								  $LogoStyle = '';
								  $LogoImageStyle = ( sh_set( $theme_options, 'logo_width' ) || sh_set( $theme_options, 'logo_height' ) ) ? ' style="': '';
								  $LogoImageStyle .= ( sh_set( $theme_options, 'logo_width' ) ) ? ' width:'.sh_set( $theme_options, 'logo_width' ).'px;': '';
								  $LogoImageStyle .= ( sh_set( $theme_options, 'logo_height' ) ) ? ' height:'.sh_set( $theme_options, 'logo_height' ).'px;': '';
								  $LogoImageStyle .= ( sh_set( $theme_options, 'logo_width' ) || sh_set( $theme_options, 'logo_height' ) ) ? '"': '';
								  $Logo = '<img src="'.$theme_options['logo_image'].'" alt=""'.$LogoImageStyle.' />';
								  $Slogan = '';
							  }
							  ?><?php //print_r($Logo);exit; ?>
							  
							  <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"<?php echo $LogoStyle;?>><?php echo $Logo;?></a><br><?php echo $Slogan; ?>


		</div>
		<!-- Navigation -->

		<div id="nav">
		   <?php 
		   //for parent & submenu 
		   
		 /*  
		   wp_nav_menu( array(  'theme_location' => 'main_menu' ,
								'depth'           => 0,
								'container'       => false,
								'menu_id'         => 'top-menu',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'bs-example-navbar-collapse-1',
								'menu_class'      => 'nav navbar-nav navbar-right sm sm-blue',
								'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
							    'walker' => new wp_bootstrap_navwalker()
							   )); ?> */ ?>

			<ul id="top-menu" class="nav navbar-nav navbar-right sm sm-blue" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement"><li id="menu-item-912" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-912 nav-item"><a title="who we are" href="/about" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-912"><span itemprop="name">Who We Are</span></a>
			<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-912">
				<li id="menu-item-1303" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1303 nav-item"><a itemprop="url" href="/about/team/" class="dropdown-item"><span itemprop="name">Our Team</span></a></li>
				<li id="menu-item-1307" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1307 nav-item"><a itemprop="url" href="/news/" class="dropdown-item"><span itemprop="name">News</span></a></li>
				<li id="menu-item-1565" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1565 nav-item"><a title="Work at BLGY" itemprop="url" href="/careers/" class="dropdown-item"><span itemprop="name">Careers</span></a></li>
				<li id="menu-item-1304" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1304 nav-item"><a itemprop="url" href="/about/awards-recognition/" class="dropdown-item"><span itemprop="name">Awards</span></a></li>
			</ul>
			</li>
			<li id="menu-item-917" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-750 current_page_item active menu-item-917 nav-item"><a title="start here" itemprop="url" href="/services" class="nav-link" aria-current="page"><span itemprop="name">What We Offer</span></a></li>
			<li id="menu-item-828" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-828 nav-item"><a title="what we offer" itemprop="url" href="/portfolio/" class="nav-link"><span itemprop="name">Our Work</span></a></li>
			<li id="menu-item-829" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-829 nav-item"><a title="our work" itemprop="url" href="/insights" class="nav-link"><span itemprop="name">Our Insights</span></a></li>

			<li id="menu-item-896" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-896 nav-item"><a title="get in touch" itemprop="url" href="/contact/" class="nav-link"><span itemprop="name">Contact Us</span></a></li>
			</ul>
				
				<!-- Navigation -->
        </div>
		<div class="clear"></div>
		
	</div>
	</header>
	<!--end header-->
