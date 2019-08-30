<?php 
/*
Template Name: Trail
*/

get_header(); ?>
<figure role="main">
    <?php
    $bandeau = get_field('bandeau')['ID'];//print_r($bandeau);
    $size = 'full';
    if( $bandeau ) {

	echo wp_get_attachment_image( $bandeau, $size );

}
?>
</figure>
	<main role="main">
            <section class="left">
                <aside class="desktop">
                    <div class="embed-container"><?php //print_r(get_field('lavideo')); ?>
                            <?php the_field('lavideo'); ?>
                    </div>
                </aside>
                <figure>
                    <?php //the_post_thumbnail(large); ?>
                <?php //print_r(get_field('image'));

$image = get_field('image')['ID'];//print_r($image);
$size = 'full'; // (thumbnail, medium, large, full or custom size)
//print_r($size);

if( $image ) {

	echo wp_get_attachment_image( $image, $size );

}

?>
                </figure>
                <article class="desktop">
                    <?php the_field('texte2'); ?>
                </article>
                <aside class="desktop">
                    <?php the_field('texte'); ?>
                </aside>
            </section>
		<!-- section -->
		<section>

			<h1><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

				<?php comments_template( '', true ); // Remove if you don't want comments ?>

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>
                <article class="mobile">
                    <?php the_field('texte2'); ?>
                </article>
                <aside class="mobile">
                    <div class="embed-container"><?php //print_r(get_field('lavideo')); ?>
                            <?php the_field('lavideo'); ?>
                    </div>
                </aside>

		</section>
		<!-- /section -->
                <aside id="partenaires">
                    <?php

// check if the repeater field has rows of data
if( have_rows('partenaires') ):

 	// loop through the rows of data
    while ( have_rows('partenaires') ) : the_row();
//echo 'test';
$url = get_sub_field('lien');
//echo '<a href="'.get_sub_field('lien').'">'.test.'</a>';
        // display a sub field value
        if($url) : $lien = '<a href="'.get_sub_field('lien').'">';$lienoff='</a>';//print_r($lien);
        else:$lien='';$lienoff='';endif;

$logo = get_sub_field('logo')['ID'];
$size = 'full'; // (thumbnail, medium, large, full or custom size)

if( $logo ) {

	echo '<figure>'.$lien.wp_get_attachment_image( $logo, $size ).$lienoff.'</figure>';

}

    endwhile;

else :

    // no rows found

endif;

?>
                </aside>
	</main>


<?php get_footer(); ?>
