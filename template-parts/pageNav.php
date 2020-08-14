<?php if(get_field('enable_nav_bar')): 
    
    # There's a set of custom fields that relate to this.
    # To enable it for another post type, enable the custom fields, 
    # and add this snippet to the post template

	$pageTitle = get_field('page_title');
	$pageUrl = get_field('page_url');
	$firstBCText = get_field('first_breadcrumb_text');
	$firstBCUrl = get_field('first_breadcrumb_url');
	$secondBCText = get_field('second_breadcrumb_text');
	$secondBCUrl = get_field('second_breadcrumb_url');
	
	echo "
	
	<div class='headerInfo'>
		<div class='button-section'>
			<a href='$pageUrl'><div class='customBtn'>$pageTitle</div></a>
		</div>
		<div class='navSection'>
			<div class='navWrapper'>
				<a href='$firstBCUrl'><div class='navText'>$firstBCText</div></a>
				<a href='$secondBCUrl'><div class='navText'>$secondBCText</div></a>
			</div>
		</div>
	</div>
	
	";

	endif;

?>