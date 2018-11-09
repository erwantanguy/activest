<?php
/*
Template Name: adhésion
*/
get_header(); ?>

	<main role="main">
		<!-- section -->
		<section id="archives_actus">
                    <div class="title">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div id="adhesion">
                        <?php the_content(); ?>
                    </div>
		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
