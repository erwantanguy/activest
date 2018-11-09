<?php get_header(); ?>
        


        <div id="presentation_commissions">
            <h1>Qui sommes-nous ?</h1>

            <p class="def_activest">Activ'Est est une association dont le but premier est de fédérer les entreprises de trois territoires,<br />l'Ecopôle sud-est, la ZA les peupliers et la ZA du bordage. Activ'Est est composée de chefs d'entreprises bénévoles.</p>
        </div>

        <div id="commissions">
            
        <?php

        $arguments= array('post_type'=>'commissions',
                    'posts_per_page'=>'6',                                       
                    'order'=>'ASC'
                    );
        
        $commission= new WP_query($arguments);
        
            if($commission->have_posts()):

                while ($commission->have_posts()):
                    
                    $commission->the_post();
            
                    //$nom_commission=get_field('nom_commission');
                    //$personnes=get_field('personnes_commission');
                    //$image= get_field('photo_commission');
                    //$url = $image['url'];
                    $nom_commission=get_the_title();
                    $personnes=get_the_content();
                    $url=  get_the_post_thumbnail_url($commissions,'large');
                    ?>

                    <div class="commission">
                        <img src="<?php echo $url;?>">
                        <h2 class="titre_commission"><?php echo $nom_commission ?></h2><br />
                        <span class="noms_commission"><?php echo $personnes ?></span>
                    </div>
                    
        <?php

                endwhile;
                  
                else: echo '<div id="bgbientot"><p id="bientot">Nous afficherons bientôt les commissions d\'Activest ici.</p></div>';
            
            endif;
        ?>
        
        </div>
        
        <section id="mot_president" style="display:none;">
        <div class="mot_center">
            <h1>Le mot du président, Jean-Luc JOUAN :</h1>
            <div>
                <p>Forte des 45 ans que fêtera Activ'est cette année, l'association s’est toujours voulue un facilitateur pour  la mise en relation des entreprises entre elles mais aussi pour favoriser des débats d'idées autour de services propres à améliorer la vie de chacun :  covoiturage, sécurité, gardes d’enfants etc…mais aussi organisation d’évènements mensuels tels que les « after ou before work ».<br /><br /></p> 
                <p>
                    ACTIVEST reste l’interlocutrice privilégiée des collectivités territoriales notamment des villes de CESSON-SEVIGNE, CHANTEPIE et RENNES
                    L’équipe d’Activ’Est  a travaillé  sur la refonte du site portail de l’Ecopôle Sud-Est en collaboration avec la société BUROSCOPE.
                    Les objectifs de ce changement pour mieux faire connaitre le rôle d’ ACTIVEST mais également votre entreprise sont les suivants :
                    <ul>
                        <li>Favoriser les débats d’idées et améliorer les conditions de vie sur le territoire du pôle multi-activités</li>
                        <li>Continuer activement la représentation des entreprises auprès des collectivités territoriales</li>
                        <li>Mettre en ligne de l’annuaire des entreprises de l’Ecopôle Sud-Est</li>
                        <li>Avoir un espace dédié aux adhérents : forum d’échanges, espace emplois...</li>
                        <li>Publier une lettre d’informations régulièrement et offrir la possiblité d’avoir un espace d’annonces publicitaires</li>
                        <li>Mettre en avant et annoncer les nouvelles installations</li>
                        <li>Proposer des liens vers des sites utiles aux entreprises et à ses salariés</li>
                    </ul>
                </p>

                <p>
                 Pour conclure, ce nouveau site portail qui est dédié aux entreprises installées dans ces zones d’activité vous appartiendra et nous sommes d’ores et déjà convaincus que vous en deviendrez les acteurs principaux   
                </p>

                <span id="nom_president">Jean-Luc JOUAN</span>
                <span id="grade">Président d'Activ'Est</span>
            </div>
        </div>
               
            
             
        
        </section>

 <?php get_footer(); ?>

