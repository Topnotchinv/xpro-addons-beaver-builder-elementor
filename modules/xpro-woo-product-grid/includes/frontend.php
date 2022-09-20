<?php
$settings->post_type = 'product';
$query               = FLBuilderLoop::query( $settings );

// Render the products.
if ( $query->have_posts() ) {

	while ( $query->have_posts() ) {
		$query->the_post();

		ob_start();

		the_title();
	}
} else {
	?><p>No Products Found</p>
	<?php
}

wp_reset_postdata();

