<?php get_header(); ?>


<div class="head-banner clearfix mb30">
  <div class="wrapper">
	<h4><a href="<?php echo site_url('/about/team/'); ?>">Team</a></h4>
	<?php echo get_the_breadcrumb(); ?>
	<div class="clear"></div>
  </div>
</div>


<section class="main-content wrapper dark">
    <div class="container clearfix">
        <div class="content column12 clearfix">
            
            <?php while( have_posts() ): the_post(); ?>
            
                <?php $meta = get_post_meta( get_the_id(), '_sh_team_meta', true ); //printr( $meta ); 
				//$page_opts = sh_set( sh_set( $meta, 'sh_page_options' ), 0 );
				//$p_type = sh_set( sh_set( sh_set( $meta, 'sh_portfolio_type' ), 0 ), 'type' );
				/*$pull_content = ( sh_set( $page_opts, 'position' ) == 'right' ) ? ' pull-right' : '';*/ ?>
                
                <div class="column6<?php //echo $pull_content; ?>">
                    <div class="portfolio_details">
                        <div class="details_section">
                            
                            <h3><?php the_title();?></h3>
                            	<?php the_content(); ?>
                            <hr>
                            
                            <ul>
                                 <li class="version">
                                	<span><?php echo sh_set($meta, 'designation') ?></span>
                                </li>
                                <li>
                                <?php $social_icon = sh_set($meta, 'social_icon_group'); foreach($social_icon as $key => $value):?>
									<a href="<?php echo sh_set( $value, 'social_url' ); ?>" title="<?php echo sh_set( $value, 'title' ); ?>"><i class="fa <?php echo sh_set( $value, 'social_icon' ); ?>"></i></a>
								<?php endforeach; ?>                                
                                </li>
                            </ul>
                        </div>
                        <!-- details section --> 
                        
                       
                    </div>
                    <!-- theme details --> 
                </div>
                <!-- end col-lg 8 -->
            
                <div class="column6">
                	
                    <div class="item_image">
                     	<?php the_post_thumbnail( '919x534' ); ?>
                       
                        <!-- end carousel --> 
                    </div>
                    <!-- end item_image --> 
                </div>
            <!-- end col-lg 8 -->
            
            <div class="clear"></div>
            
            <?php endwhile; ?>
            <div class="clearfix"></div>
            
        </div>
        <!-- end content --> 
    </div>
    <!-- end container --> 
</section>
<!-- end section -->

<?php get_footer(); ?>