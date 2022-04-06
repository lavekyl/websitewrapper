<?php
/**
 * The template for displaying event archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter
 */

get_header();
?>

	<main id="primary" class="site-main container">

		<?php if ( have_posts() ) : ?>
		
			<header class="page-header jumbotron text-center">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
			<div class="row the-posts">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post(); ?>
			
					<div class="col-md-4 the-post">
						<?php the_post_thumbnail(); ?>
						<a href="<?php the_permalink(); ?>" class="the-post-title"><?php the_title(); ?></a>
						<div class="the-post-content"><?php the_excerpt(); ?></div>
						<?php if( get_field( 'start_date' ) ) : ?>
							
							<span class="date start-date"><em>Event Start: <?php echo get_field('start_date'); ?></em></span>
							<span class="date end-date"><em>Event End: <?php echo get_field('end_date'); ?></em></span>
							
						<?php endif; ?>
						<a href="<?php the_permalink(); ?>" class="btn btn-primary the-post-btn">Learn More</a>
					</div><!-- .col-md-4 .the-post -->
			
				<?php endwhile; ?>
			</div><!-- .row .the-posts -->
		
			<?php the_posts_navigation();
		
		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
