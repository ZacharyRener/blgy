<?php 
		// define query parameters based on attributes
		$options = array(
				'post_type' => 'slider',
				'order' => 'ASC',
				'orderby' => 'menu_order',
				'posts_per_page' => -1,
				'post_status' => 'publish',
		);
		
		$featured_query = new WP_Query( $options );
		// run the loop based on the query
		if ( $featured_query->have_posts() ) { 
				?>
				<div class="flexwrapper">
			<div class="flexslider">
				<ul class="slides">
			<?php while ( $featured_query->have_posts() ) { 
					$featured_query->the_post(); 
						$alttext = the_title_attribute('echo=0');
						$scheme = '';
						if (function_exists('get_field') && get_field('color_scheme', $featured_query->ID)) { $scheme = get_field('color_scheme', $featured_query->ID); } 
					echo '<li class="cf slide"><div class="cf homeslide ' . $scheme . '">';
								if (function_exists('get_field') && get_field('image', $featured_query->ID)) { 
								$slide_image = get_field('image', $featured_query->ID);
								$image_info =  wp_get_attachment_image_src( $slide_image, 'slide-img' );
									echo  '<img src="' . $image_info[0] . '" alt="' . get_the_title( $featured_query->ID ) . '" />';
									echo  '<div class="wrapper">';
									echo  '<div class="slidecontent">';
										echo '<h2 class="page-title">';
										echo get_the_title();
										echo '</h2>';
										if (get_field('subtitle', $featured_query->ID)) {
											echo '<span class="subtitle">' . get_field('subtitle', $featured_query->ID) . '</span>';
										}
										if(get_the_content() !== '') {
											$content = get_the_content();
											$content = apply_filters('the_content', $content);
											echo '<div class="slidetext">' . $content . '</div>';
										}
										
										if (get_field('link_to', $featured_query->ID)) {
											if (get_field('call_to_action_text')) {
												echo '<br /><a class="slidecta" href="'. get_field('link_to', $featured_query->ID) . '">' . get_field('call_to_action_text', $featured_query->ID) . '</a>';
											}
										}
									echo  '</div>';
									
									echo '</div>';
							}
					echo '</div></li>';
			}
				?>
				</ul>
				 </div>
</div>
<script type="text/javascript" language="javascript">
jQuery(document).ready(function($) {
		var n = 1;
		$('.flexslider').flexslider({
				animation: "fade",
				animationLoop: true,
				controlNav: false,
				prevText: "<i class='fa fa-2x fa-arrow-left'></i>",
				nextText: "<i class='fa fa-2x fa-arrow-right'></i>",
				/*after: function(slider) {
					 if (slider.currentSlide == slider.count - 1) { // is last slide
							n--;
							if(n==0) {
								slider.pause();
							}
					 }
				}*/
		});
});
</script>
		<?php }
	wp_reset_query();
?>