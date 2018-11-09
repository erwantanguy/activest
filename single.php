<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section class="single">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		
			<!-- post title -->
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="underline"><?php the_title(); ?></span></a></h1>
			<!-- /post title -->
			
			<!-- post details -->
				<p class="post_details">
					<span class="author"><?php _e( 'Publié par '); ?><?php the_author_posts_link(); ?></span>
					<span class="date">Le <?php the_time('j F, Y'); ?></span>
				
					<!-- /post details -->

					<?php if(has_tag()):
					the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end 
					endif; ?>
					
					<?php if (has_category()) : ?>
					<?php _e( 'Catégorie(s) : ', 'html5blank' ); the_category(', '); // Separated by commas ?>
					<?php endif; ?>
				</p>
			
			<div class="content">
			<!-- post thumbnail -->
			<div class="middle">
				<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('large'); // Fullsize image for the single post ?>
					</a>
				<?php endif; ?>
				
					
			</div>
			<!-- /post thumbnail -->
			
			
			
			
				<?php the_content(); // Dynamic Content ?>
			</div>
	
			

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>
			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>



<?php get_footer(); ?>
