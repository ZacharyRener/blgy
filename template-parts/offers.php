<?php 

if(get_field('enable_offer')):

	$offerTitle = get_field('offer_title');
	$offerExcerpt = get_field('offer_excerpt');
	$buttonText = get_field('button_text');
	$button_url = get_field('button_url');

	echo "

	<div class='offer-section'>

			<div class='image' style='background-image:url(http://blgy.local/wp-content/uploads/2020/08/offer-image.png);'></div>
			<div class='content'>

				<h3 class='main-title'>$offerTitle</h3>
				<p class='paragraph'>$offerExcerpt</p>
				<div class='vc_btn3-container  getStartedBtn vc_btn3-inline'>
					<a href='$button_url'>
					<button class='vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-modern vc_btn3-color-grey'>
						$buttonText
					</button>
					</a>
				</div>

			</div>

	</div>

	";

endif;

?>