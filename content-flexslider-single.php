
		<div class="flexwrapper">
			<div class="flexslider">
				<ul class="slides">
				
				
				<?php foreach( $attachments as $k => $att ) { ?>
					<li class="cf slide"> 
						<a rel="lightbox" href="<?php echo wp_get_attachment_image_src( $att->ID, 'full')[0]; ?>"><?php echo wp_get_attachment_image( $att->ID, 'portfolio-img', '',  array('class'=>'img-responsive') ); ?></a>
					</li>
					<!-- end item -->
				<?php } ?>

		   </ul></div>
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
				after: function(slider) {
					 if (slider.currentSlide == slider.count - 1) { // is last slide
							n--;
							if(n==0) {
								slider.pause();
							}
					 }
				}
		});
});
</script>
		<?php 
	//wp_reset_query();
?>