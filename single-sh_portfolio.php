<?php get_header(); ?>


<div class="head-banner clearfix mb30">
  <div class="wrapper">
	<h4><a href="<?php echo site_url('/portfolio/'); ?>">Portfolio</a></h4>
	<?php echo get_the_breadcrumb(); ?>
	<div class="clear"></div>
  </div>
</div>


<section class="main-content wrapper dark">
    <div class="container clearfix">
        <div class="content column12 clearfix">
            
            <?php while( have_posts() ): the_post(); ?>
            
                <?php $meta = get_post_meta( get_the_id(), 'sh_portfolio_meta', true );  //printr( $meta ); 
				$page_opts = sh_set( sh_set( $meta, 'sh_page_options' ), 0 );
				$p_type = sh_set( sh_set( sh_set( $meta, 'sh_portfolio_type' ), 0 ), 'type' );
				$pull_content = ( sh_set( $page_opts, 'position' ) == 'right' ) ? ' pull-right' : ''; ?>
                
                <div class="column4<?php echo $pull_content; ?>">
                    <div class="portfolio_details">
                        <div class="details_section">
                            
                            <h3><?php the_title(); ?></h3>
                            	<?php the_content(); ?>

                            
                            <ul class="deets">
                                <?php if (sh_set( $page_opts, 'client_name' )) { ?>
                                <li class="version">
									<?php _e( 'Client:', 'arkitekt'); ?> 
                                	<span><a href="<?php echo esc_url(sh_set( $page_opts, 'demo_link' )); ?>" title="<?php echo sh_set( $page_opts, 'client_name' ); ?>"><?php echo sh_set( $page_opts, 'client_name' ); ?></a></span>
                                </li>
                                <?php } ?>
                                
                                <?php if (sh_set( $meta, 'sh_skills' ) && sh_set( $skill, 'link' )[0] !== 'http://example.com') {
                                    if ( $skills = sh_set( $meta, 'sh_skills' ) )  { 
                                        ?>
                                	
                                    <li class="update">
                                    	<?php _e('Skills: ', 'arkitekt' );  //printr($skills); ?> 
                                		<span>
                                        	<?php foreach( $skills as $skill ): ?>
                                            	<a href="<?php echo esc_url(sh_set( $skill, 'link' )); ?>" title="<?php echo sh_set( $skill, 'skill' ); ?>"><?php echo sh_set( $skill, 'skill' ); ?></a>,
                                            <?php endforeach; ?>
                                        </span>
                                    </li>
                                    
                                <?php }
                                } ?>
                                
                                <?php if( $author_name = sh_set( $page_opts, 'author' ) ): ?>
                                	<li><?php _e('Author Name:', 'arkitekt' ); ?> <span><?php echo $author_name; ?></span></li>
                                <?php endif; ?>
                                <?php if( $author_url = sh_set( $page_opts, 'website' ) ): ?>
                                	<li><?php _e('Author URI:', 'arkitekt' ); ?> <span><?php echo $author_url; ?></span></li>
                                <?php endif; ?>
                                
                                <li class="release">
									<?php _e('Release Date: ', 'arkitekt'); ?>
                                    
                                    <?php if( $rel_date = sh_set( $page_opts, 'date' ) ): ?>
                                    	<span><?php echo date(get_option('date_format'), strtotime( $rel_date ) ); ?></span>
                                    <?php else: ?>
                                    	<span><?php the_date(); ?></span>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                        <!-- details section --> 
                    </div>
                    <!-- theme details --> 
                </div>
                <!-- end col-lg 8 -->
            
                <div class="column8">
                	
                    <?php $attachments = get_posts( array( 'post_type'=>'attachment', 'posts_per_page' => -1, 'post_parent' => get_the_id() ) ); ?>
                    <div class="item_image">
                        <?php if( count( $attachments ) > 1 && $p_type == 'slider' ): ?>
                            <div class="flexwrapper">
                                <div class="flexslider">
                                    <ul class="slides">
                                    
                                    
                                    <?php foreach( $attachments as $k => $att ) { ?>
                                        <li class="cf slide"> 
                                            <a rel="lightbox" href="<?php echo wp_get_attachment_image_src( $att->ID, 'full')[0]; ?>"><?php echo wp_get_attachment_image( $att->ID, 'portfolio-img', '',  array('class'=>'img-responsive') ); ?></a>
                                        </li>
                                        <!-- end item -->
                                    <?php } ?>

                               </ul>
                                </div>
                            </div>
    
<?php wp_enqueue_style( 'flexslidercss', get_stylesheet_directory_uri() . '/flexslider-css.css'); ?>

<script type="text/javascript" language="javascript">
jQuery(document).ready(function($) {
        var n = 1;
        $('.flexslider').flexslider({
                animation: "fade",
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
                        <?php elseif( $p_type == 'video' ): ?>
                        	<?php echo sh_set( sh_set( sh_set( $meta, 'sh_portfolio_type' ), 0 ), 'video' ); ?>
						<?php else: ?>
                        	<a rel="lightbox" href="<?php echo wp_get_attachment_image_src( $att->ID, 'full')[0]; ?>"><?php the_post_thumbnail( 'portfolio-img' ); ?></a>
                        <?php endif; ?>
                        <!-- end carousel --> 
                    </div>
                    <!-- end item_image --> 
                </div>
            <!-- end col-lg 8 -->
            
            <div class="clear"></div>
            <ul class="pager">
            
            	<li class="previous"><?php previous_post_link('%link', '&larr; Previous', FALSE); ?></li>
                <li class="nextt"><?php next_post_link('%link', 'Next &rarr;', FALSE); ?></li>
            </ul>
            
            <?php endwhile; ?>
            <div class="clearfix"></div>
            
        </div>
        <!-- end content --> 
    </div>
    <!-- end container --> 
</section>
<!-- end section -->

<?php get_footer(); ?>