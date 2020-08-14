<?php get_header(); ?>
<?php 
$theme_options = _WSH()->option(); //printr($theme_options);
$sidebar = sh_set( $theme_options, 'category_sidebar' );
$layout = sh_set( $theme_options, 'category_sidebar_layout' );
?>

<div class="head-banner clearfix mb30">
  <div class="wrapper">
	<h4><?php printf( __( '%s', 'arkitekt' ), single_cat_title( '', false ) ); ?></h4>
	<?php echo get_the_breadcrumb(); ?>
	<div class="clear"></div>
  </div>
</div>

<div class="main-content wrapper dark">
				
				<?php //$class = ( $layout == 'full' ) ? 'column12' : 'column9';
					if( $sidebar && $layout == 'left' ): ?>
						<aside class="column3">
                    		<?php dynamic_sidebar( $sidebar ); ?>
                		</aside>
            	<?php endif; ?>
				<?php $col_class = ( $layout != 'full' ) ? 'column9' : 'column12'; ?>
                
				<div class="home-blog <?php echo $col_class; ?>">
							<?php get_template_part('content', 'blog'); ?>
							<div class="clear"></div><br />
							<?php _the_pagination(); ?>
						
				</div>
				
				<?php if( $sidebar && $layout == 'right' ): ?>
					<aside class="column3">
                    	<?php dynamic_sidebar( $sidebar ); ?>
                	</aside>
            	<?php endif; ?>

<div class="clear"></div>
</div>

<?php get_footer(); ?>