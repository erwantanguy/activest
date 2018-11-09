<?php get_header(); ?>

<main role="main">
	<!-- section -->

    <section id="fiche_ind">
        <div class="image_background"></div>
        <h2 class="h2_logo"><?php echo the_title();?></h2>
        <div class="contact_entreprise">
            <div>
                <p><?php if (get_field('adresse_entreprise')):
                        echo get_field('adresse_entreprise');
                    else:
                        echo'';
                    endif;
            ?></p>
            <p><?php if (get_field('ville_entreprise')):
                        echo get_field('ville_entreprise');
                    else:
                        echo'';
                    endif;
                    ?>
    
                <?php if (get_field('cp_entreprise')):
                        echo get_field('cp_entreprise');
                    else:
                        echo'';
                    endif;?></p>
            </div>
         
            <p><?php if (get_field('tel_entreprise')):
                        echo get_field('tel_entreprise');
                    else:
                        echo'';
                    endif;
            ?></p>
            <a href="#" class="siteweb">Accéder au site internet de <span> <?php echo the_title();?> </span></a>
        </div>
    </section>

		<!-- article -->

                <article>
                    <div>
                      <?php

$query = new WP_Query( array(
        'post_type' => 'recherche_annuaire',
        's'=>$_POST['recherche'],
        'orderby'=> 'title',
        'order'=> ASC,
        
        //vérifie si les valeurs des id_secteur du select sont les bons et corespondent bien au id
        'tax_query' => array(
            'relation'=>'OR',
            array(
                'taxonomy' => 'secteurs',
                'field'    => 'term_id',
                'terms'    => $_POST['id_secteur'],
            ),
        ),
    )
);
?>

<section id="fiche">
    
    

            <?php if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
            $query->the_post(); ?>
            <div class="allcontacts">

                 
        <div class="adresse_entreprise">
            <?php if('adresse_entreprise'):?><span><?php echo the_field('adresse_entreprise'); ?></span><?php endif; ?>
        </div>
        <?php
        $args=['orderby'=>'name','order'=>'ASC','meta_key' => 'entreprise','meta_value' => $post->ID,'meta_compare' => 'IN',
        ];

        $user_query = new WP_User_Query($args);
        $auteurs=$user_query->get_results();
        if($auteurs){
            foreach($auteurs as $auteur){
                $auteur_infos=get_userdata($auteur->ID);
                $auteur_id=$auteur_infos->data->ID;
                $auteur_email=$auteur_infos->data->user_email;?>
                <div class="fiche">
                    <div><span class="prenom">
                           <?php echo $auteur_infos->first_name;?>&nbsp;</span>
                        <span class="nom"><?php echo $auteur_infos->last_name;?></span></div>
                        <?php if(get_field('telephone', 'user_'.$auteur_id)):?><span class="telephone"><img src="<?php echo get_template_directory_uri();?>/img/picto_phone">&nbsp<a href="tel:<?php echo get_field('telephone', 'user_'.$auteur_id); ?>"><?php echo get_field('telephone', 'user_'.$auteur_id); ?></a></span><?php endif; ?>
                        <?php if($auteur_email):?><span class="email"><a href="mailto:<?php echo $auteur_email; ?>"><?php echo $auteur_email; ?></a>
</span><?php endif; ?></div>
            <?php  }
        }
        if ( $user_query->have_posts() ) {
            while ( $user_query->have_posts() ) {
                $user_query->the_post();

                ?>

            <?php }}?>

    </div>
    <?php

    }
    //var_dump($query);
    /* Restore original Post Data */
    wp_reset_postdata();
    } else {
        // no posts found
    }
    ?>
</section>
                    </div>
                </article>


<?php get_footer(); ?>
