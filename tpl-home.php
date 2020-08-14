<?php /* Template Name: Home Page */
get_header(); 

$settings = get_post_meta( get_the_id(), 'sh_page_meta', true );
$bread_crums = sh_set( $settings, 'show_bread_crums' );
?>
<?php if($bread_crums):?>
<div class="head-banner clearfix mb30">
  <div class="wrapper">
	<h4><?php the_title();?></h4>
	<?php echo get_the_breadcrumb(); ?>
	<div class="clear"></div>
  </div>
</div>
<?php endif;?>	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('content', 'flexslider'); ?>
		
				<?php the_content(); ?>

	<?php endwhile; endif; ?>
	
		
<?php get_footer(); ?>
