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
			
			<div class="row">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post(); ?>
			
					<div class="col-md-4">
						<?php  ?>
						<?php the_post_thumbnail(); ?>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php the_excerpt(); ?>
					</div>
			
				<?php endwhile; ?>
			</div>
		
			<?php the_posts_navigation();
		
		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
