<?php get_header(); ?>

<section class="container">

    <h1 class="h1_annonces">Nos annonces</h1>
    <div id="annonces " class="row ">
            
        <?php

        $arguments= array('post_type'=>'annonces',
                    'posts_per_page'=>'-1',                                       
                    'order'=>'ASC'
                    );
        
        $annonce= new WP_query($arguments);
        
            if($annonce->have_posts()):

                while ($annonce->have_posts()):
                    
                    $annonce->the_post();
            
                    $nom_annonce=get_the_title();
                    
                    $url=  get_the_post_thumbnail_url($annonces,'annonce-size');

                    $texte_annonce=get_the_content();

                    if (strlen($texte_annonce)>80){

                            $texte=substr($texte_annonce,0,80)."...";

                            $texte.="<br />&nbsp";

                        }else{

                            $texte= $texte_annonce;

                        }
                    ?>

                    <div class="annonce col-xs-12 col-sm-6 col-md-3">
                        
                        <a href="<?php echo get_the_permalink();?>"><div class="div_image_annonce"><img class="image_annonce" src="<?php echo $url;?>"></div></a>
                        <div class="contenu_annonce">

                            <h2 class="titre_annonce"><?php echo $nom_annonce ?></h2>
                            <p class="date_annonce"><?php the_date('d-m-Y'); ?> </p>
                            <p class="texte_annonce"><?php echo  $texte;  ?></p>
                            <div class="annonceur_prix">
                                
                                <div>
                                    <?php if(get_field('prix')){
                                        echo "<p class=\"prix_annonce\">".get_field('prix')."€<p/>";
                                    }
                                    else {
                                        echo "<p class=\"prix_annonce\">Gratuit</p>";
                                    }; ?>
                                    
                                </div>

                                <a href="<?php echo get_the_permalink();?>">Voir l'annonce</a>
                            </div>
                        </div>
                        

                    </div>
                    
        <?php

                endwhile;
                  
                else: echo '<div id="bgbientot"><p id="bientot">Nous afficherons bientôt les annonces d\'Activest ici.</p></div>';
            
            endif;
        ?>
</section>
        
<?php get_footer(); ?>