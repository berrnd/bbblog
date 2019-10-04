<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Independent Publisher
 * @since   Independent Publisher 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() && ! independent_publisher_has_full_width_featured_image() ) : ?>
		<?php the_post_thumbnail( 'independent_publisher_post_thumbnail', array( 'itemprop' => 'image' ) ); ?>
	<?php endif; ?>
	<header class="entry-header">
		<?php if ( ! independent_publisher_post_has_post_cover_title() ): ?>
		
			<?php if (get_post_meta(get_the_ID(), 'show_meta', true) == '1') : ?>
			<div class="entry-meta-container-small-screens">
			<?php /* Show last updated date if the post was modified AND
						Show Updated Date on Single Posts option is enabled AND
							'independent_publisher_hide_updated_date' Custom Field is not present on this post */ ?>
			<?php if ( get_the_modified_date() !== get_the_date() &&
						independent_publisher_show_updated_date_on_single() &&
							! get_post_meta( get_the_ID(), 'independent_publisher_hide_updated_date', TRUE ) ) : ?>
				<h3 class="entry-title-meta"><?php _e('Updated', 'independent-publisher'); ?></h3>
				<h3 class="entry-title-meta"><?php independent_publisher_post_updated_date(); ?></h3>
			<?php endif; ?>
		
				<h3 class="entry-title-meta">Hashtags <em><?php echo independent_publisher_post_categories( ', ', false ); ?></em></h3>
				<h3 class="entry-title-meta">Geschätzte Lesedauer <em><?php echo estimated_reading_time(get_the_content()); ?></em></h3>
			</div>
			<?php endif; ?>
			
			<?php if(has_tag())
				echo '<h3 class="entry-title-meta">Teil der Story <em>' . independent_publisher_post_tags( '', true ) . '</em></h3>';
			?>
			<h1 class="entry-title <?php if(get_the_subtitle(get_the_ID(), '', '', FALSE) === '') { echo ' hasno-subtitle'; } ?>"><?php the_title(); ?></h1>
			<?php if(get_the_subtitle(get_the_ID(), '', '', FALSE) !== '') { the_subtitle('<h2 class="entry-title entry-subtitle">', '</h2>'); } ?>
		<?php endif; ?>
	</header>
	<!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages(
			array(
				'before'           => '<div class="page-links-next-prev">',
				'after'            => '</div>',
				'nextpagelink'     => '<button class="next-page-nav">' . __( 'Next page &rarr;', 'independent-publisher' ) . '</button>',
				'previouspagelink' => '<button class="previous-page-nav">' . __( '&larr; Previous page', 'independent-publisher' ) . '</button>',
				'next_or_number'   => 'next'
			)
		); ?>
		<?php wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'independent-publisher' ),
				'after'  => '</div>'
			)
		); ?>
	</div>
	<!-- .entry-content -->

	<footer class="entry-meta">
		<?php do_action( 'independent_publisher_entry_meta_top' ); ?>

		<?php if ( comments_open() && ! independent_publisher_hide_comments() ) : ?>
			<div id="share-comment-button">
				<button>
					<i class="share-comment-icon"></i><?php echo independent_publisher_comments_call_to_action_text() ?>
				</button>
			</div>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'independent-publisher' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	<!-- .entry-meta -->

</article><!-- #post-<?php the_ID(); ?> -->
