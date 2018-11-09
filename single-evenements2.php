<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section class="single col-xs-12">

	<?php if (have_posts()): while (have_posts()) : the_post(); 

					$image1=  get_field('image_evenement_1');
					$image2=  get_field('image_evenement_2');
					$image3=  get_field('image_evenement_3');

	                $size = 'small';

	                $image1 = wp_get_attachment_image( $image1, $size );
	                $image2 = wp_get_attachment_image( $image2, $size );
	                $image3 = wp_get_attachment_image( $image3, $size );




	?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="article_single">
                    <div>
                        <img src="<?php echo get_the_post_thumbnail_url($evenements,'large');?>">
                    </div>
                    
                    <div>
                        <h1><?php echo the_title(); ?></h1>
                        <p><?php echo the_content(); ?></p>
                    </div>
                        
                </div>
<!--            	
                    <div class="images_sup">
                        <a href="#fullscreen1" class="fancybox"><img  src="<?php echo  $image1; ?>"> </a>
                        <a href="#fullscreen2" class="fancybox"><img  src="<?php echo  $image2; ?>"> </a>
                        <a href="#fullscreen3" class="fancybox"><img  src="<?php echo  $image3; ?>"> </a>
<img id="fullscreen1" src="<?php echo  get_field('image_evenement_1'); ?>">
                        <img id="fullscreen2" src="<?php echo  get_field('image_evenement_2'); ?>">
                        <img id="fullscreen3" src="<?php echo  get_field('image_evenement_3'); ?>">-->
                        

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