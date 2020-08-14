<?php global $wp_query; 
ob_start(); 
		  $services_column = ($services_column == 'column3') ? 'column3' : 'column4';
?>

<?php if( have_posts()):?>
<div class="wrapper dark features mb20">
		<?php   $column = ($services_column == 'column3') ? '4' : '3';
		while( have_posts() ): the_post(); 
				$meta = get_post_meta( get_the_id(), 'sh_services_option', true );//printr($meta);
				$detail_link = esc_url( sh_set( $meta, 'services_url' ) );
		?>
		<?php 
		
		$last_class = ( ( $wp_query->current_post % $column ) == 0 ) ? ' first' : '';
		$style = ( $services_column == 'column3') ? 'style="height: 60px; font-size: 25px; right: -15px;  width: 60px;  line-height: 60px;"' : '';


		?>


		<div class="<?php echo $services_column . $last_class; ?>">
			<div class="feature-box">
				<div class="feat-text">
                	<?php if( $detail_link ): ?>
						<h4><a href="<?php echo $detail_link; ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
                    <?php else: ?>
                    	<h4><?php the_title(); ?></h4>
                    <?php endif; ?>
					<p>
                    	<?php echo _sh_trim( get_the_excerpt(), $txtlimit ); ?>
						<?php //echo character_limiter( get_the_excerpt(), 180 ); ?>
						<?php //echo $this->excerpt(get_the_excerpt(), 180); ?>
					</p>
                  	<a href="<?php echo $detail_link; ?>" class="pull-right">Learn More &raquo;</a>
				</div>
				<i class="fa <?php echo sh_set($meta, 'fontawesome');?>" <?php echo $style; ?> ></i>
			</div>
		</div>
        <?php endwhile; ?>
		
		
		<div class="clear">
		</div>
	</div>

<?php endif; 

$output = ob_get_contents();
ob_end_clean(); ?>

