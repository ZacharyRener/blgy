<?php global $wp_query;
//printr ($wp_query);
ob_start(); ?>
<?php if( have_posts()):?>

<div class="about-services">
<div class="services dark">
	<?php while( have_posts() ): the_post(); 
		$meta = get_post_meta( get_the_id(), 'sh_services_option', true );//printr($meta);
	?>
  <div class="our-service column3">
	<i class="<?php echo sh_set($meta, 'fontawesome');?>"></i>
	<h3><?php the_title();?></h3>
	<p>
		<?php echo character_limiter( get_the_excerpt(), 180 ); ?>
		<?php //echo $this->excerpt(get_the_excerpt(), 180); ?> 
	</p>
  </div>
		<?php endwhile; ?>
  
  <div class="clear"></div>
</div>
</div>

<?php endif; 

$output = ob_get_contents();
ob_end_clean(); ?>
