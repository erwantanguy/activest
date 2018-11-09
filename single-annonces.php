<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section class="single col-xs-12">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div>
                    <div class="image_single_annonce">
                        <img src="<?php echo get_the_post_thumbnail_url($annonce,'details_annonce-size');?>">
                        <?php 
                        $arguments= array('post_type'=>'annonces',
                        'posts_per_page'=>'6',                                       
                        'order'=>'ASC'
                        );

                $annonce= new WP_query($arguments);

                if($annonce->have_posts()):

                    while ($annonce->have_posts()):

                        $annonce->the_post();

                       $image2=  get_field('image2');
                       $image3=  get_field('image3');
                       $image4=  get_field('image4');
                       $image5=  get_field('image5');
                       $tel= get_field('numero_tel_annonce');
                       $image2= wp_get_attachment_image_src( $image2, 'small');
                       $image3= wp_get_attachment_image_src( $image3, 'small');
                       $image4= wp_get_attachment_image_src( $image4, 'small');
                       $image5= wp_get_attachment_image_src( $image5, 'small');

                        
                 endwhile;wp_reset_postdata();endif;
                    ?>
                   
                    </div>
                    
                    <div class="contenu_single">
                        
                            <h2 class="titre_annonce_single"><?php echo get_the_title(); ?></h2><br />
                            <p class="date_annonce_single"><?php the_date('d-m-Y'); ?> </p>
                            <p class="titre_description_single">Description</p>
                            <p><?php echo  the_content();  ?></p>

                            <div class="annonceur_single">
                                <div>
                                    <?php if(get_field('prix')){
                                        echo "<p class=\"prix_annonce prix_annonce_single\">".get_field('prix')."€<p/>";
                                    }
                                    else {
                                        echo "<p class=\"prix_annonce prix_annonce_single\">Gratuit</p>";
                                    }; ?>
                                    
                                </div>

                                
                                <div class="coordonnees_annonceur_single">
                                    <div>
                                    <h3>Contacter <sapn class="prenom_annonce_single"><?php echo get_field('prenom_annonce')."&nbsp;"; ?></span><span class="nom_annonce_single"><?php echo get_field('nom_annonce'); ?></spn></h3>
                                        
                                        
                                    </div>
                                    
                                    <a href="mailto: <?php echo get_field('mail_annonce'); ?>"><p class="mail_annonce_single"><img src="<?php echo get_template_directory_uri();?>/img/email.png"><?php echo get_field('mail_annonce'); ?></p></a>
                                    <a href="tel:<?php echo $tel; ?>"><p class="numero_tel_annonce"><img src="<?php echo get_template_directory_uri();?>/img/call.png"><?php echo $tel; ?></p></a> 
                                </div>
                                
                            </div>

                    
                    
    </div>

    
    
		</article>
		<!-- /article -->
                <?php if($image2 || $image3 || $image4 || $image5):?>
    <div class="images_sup_annonces">
        <?php if($image2) :?>
        <img src="<?php if($image2): echo $image2[0]; else: echo ""; endif;?> ">
        <?php endif;if($image3) :?>
        <img src="<?php if($image3): echo $image3[0]; else: echo ""; endif;?> ">
        <?php endif;if($image4) :?>
        <img src="<?php if($image4): echo $image4[0]; else: echo ""; endif;?> ">
        <?php endif;if($image5) :?>
        <img src="<?php if($image5): echo $image5[0]; else: echo ""; endif;?> ">
        <?php endif;?>       
    </div>
                <?php endif; ?>
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
