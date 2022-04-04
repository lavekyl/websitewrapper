<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter
 */

get_header();
?>

	<main id="primary" class="site-main container">
		
		<?php
		$date_cutoff = '20200102';
		
		// WP_Query arguments
		$args = array(
			'post_type'	=> array( 'event' ),
			'tax_query' => array(
				array (
					'taxonomy' => 'event_type',
					'field' => 'slug',
					'terms' => 'webinar',
				)
			),
			'meta_query' => array(
				array(
					'key' => 'start_date',
					'type'=> 'DATE',
					'compare' => '>=', // Upcoming Events - Greater than or equal to chosen date
					'value' => $date_cutoff,
				)
			),
			'meta_key' => 'start_date',
			'orderby' => 'meta_value',
			'order' => 'ASC'
		);
		
		// The Query
		$query = new WP_Query( $args );
		
		// The Loop
		if ( $query->have_posts() ) { ?>
			<div class="row">
			<?php while ( $query->have_posts() ) {
				$query->the_post(); ?>
				
				<div class="col-md-4">
					<?php  ?>
					<?php the_post_thumbnail(); ?>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php the_excerpt(); ?>
				</div>
				
			<?php } ?>
			</div>
		<?php } else {
			// no posts found
		}
		
		// Restore original Post Data
		wp_reset_postdata();
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
