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

                 <div class="topfiche">
            <?php
            //var_dump($query);
            //var_dump(get_the_terms( $post->ID, 'activites'));
            $cat = get_the_terms( $post->ID, 'activites');
            echo '<div><a href="'.get_permalink().'"><span class="nomentreprise">'. get_the_title() . '</span></a>';
           if($cat[0]->name){
            echo '<span class ="act_entreprise">('.$cat[0]->name.')</span>';
            }
            echo '</div>';
            
            //echo '<li>' . get_taxonomy('activites') . '</li>';

            echo '<a href="'.get_permalink().'"><span class="linkfiche">Voir la fiche</span></a>';
            //var_dump(get_the_terms( $post->ID, 'activites'));

            ?>
             </div>
        <div class="adresse_entreprise">
            <?php if('adresse_entreprise'):?><span><img src="<?php echo get_template_directory_uri();?>/img/picto_adress" alt="picto telephone activ-est">&nbsp;&nbsp;<?php the_field('adresse_entreprise'); ?></span><?php endif; ?>
        </div>
        <?php
        $args=['orderby'=>'name','order'=>'ASC','meta_key' => 'entreprise','meta_value' => $post->ID,'meta_compare' => 'IN',
        ];

        $user_query = new WP_User_Query($args);
        $auteurs=$user_query->get_results();
        //var_dump($auteurs);
        if($auteurs){
            foreach($auteurs as $auteur){
                $auteur_infos=get_userdata($auteur->ID);
                //print_r($auteur_infos->data);
                $auteur_id=$auteur_infos->data->ID;
                $auteur_email=$auteur_infos->data->user_email;?>
                <div class="fiche">
                    <div><span class="prenom">
                           <img src="<?php echo get_template_directory_uri();?>/img/picto_user.png" alt="picto user activ-est">&nbsp;&nbsp;<?php echo $auteur_infos->first_name;?>&nbsp;</span>
                        <span class="nom"><?php echo $auteur_infos->last_name;?></span></div>
                        <?php if(get_field('telephone', 'user_'.$auteur_id)):?><span class="telephone"><img src="<?php echo get_template_directory_uri();?>/img/picto_phone">&nbsp<a href="tel:<?php the_field('telephone', 'user_'.$auteur_id); ?>"><?php the_field('telephone', 'user_'.$auteur_id); ?></a></span><?php endif; ?>
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