<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Independent Publisher
 * @since   Independent Publisher 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="content" class="site-content" role="main">

			<section class="error-404 not-found">
				<header class="entry-header">
					<h1 class="entry-title">Ungültiger Link</h1>
				</header>
				<!-- .entry-header -->

				<div class="entry-content">
					<p>Diese Seite existiert nicht.</p>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

				</div>
				<!-- .entry-content -->
			</section>
			<!-- .error-404 -->

		</main>
		<!-- #main -->
	</div><!-- #primary .content-area -->

<?php get_footer(); ?>