<?php
/*
Template Name: booking
*/
get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>
                    <div class="title">
			<h1><?php the_title(); ?></h1>
                    </div>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article  class="actus archives_actus">

				<?php the_content(); ?>

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article class="actus archives_actus">

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
