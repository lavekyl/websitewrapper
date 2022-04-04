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
		
			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
		
				the_content();
		
			endwhile;
		
			the_posts_navigation();
		
		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
