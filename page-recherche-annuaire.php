<?php get_header();
// le require sert à lier le fichier fonctions 
//require_once("outils/fonctions.php");
//on établit la connexion à  la base 	
//$connexion=connexion();//on stocke dans une variable ($connexion) établie par la fonction connexion()
//mysqli_set_charset($connexion, "utf8");
//$chemin=get_theme_root_uri() . "/annuaire?fiche";
?>


<section id="annuaireform">
    <?php //$termsold = get_terms( 'secteurs', array('hide_empty' => false,) );
    $terms = get_terms( array(
        'taxonomy' => 'secteurs',
        'hide_empty' => false,
    ) );
    //var_dump($terms);
    /*echo '<ul>';
    foreach ($terms as $term){
        echo '<li><a href="'.get_term_link( $term ).'">'.$term->name.'</a>';
    }
    echo '</ul>';*/
    

       //if ($_POST): echo $_POST['id_secteur']; endif;

    ?>
	<h1>Rechercher dans l'annuaire Activ'est : </h1>
        
        <form class=" annuairesearch" method="POST" action="#fiche">

	
	<?php wp_nonce_field('search', 'search-verif'); ?>

			<input  type="text" autocomplete="off" name="recherche" placeholder="Rechercher un nom, une entreprise...">
			<?php
			$terms = get_terms( 'secteurs', array('hide_empty' => false,) );

			echo "<select name=\"id_secteur\" placeholder=\"Secteur d'activité\">\n";
			foreach ($terms as $term){
				echo "<option value=\"" . $term->term_id . "\">" . $term->name . "</option>\n";
				}	
			echo "</select>\n";
			?>

		<input class="valider" type="submit" name="submit" value="Rechercher">
	</form>

</section>
<section class=".contenu_recherche"></section>

<!---MOTEUR DE RECHERCHE------------------------------------------------------------------------------------------->
<?php                        


$query = new WP_Query(
                        [
                            'post_type' => 'recherche_annuaire',
                            'tax_query' => array(
                                array(
                                        'taxonomy' => 'secteurs',
                                        'field'    => 'term_id',
                                        'terms'    => $_POST['id_secteur'],
                                ),
                        ),
                        ]
                        );?>
<section id="fiche">
<?php if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
	echo '<div class="allcontacts">';
		$query->the_post();
		echo '<li>' . get_the_title() . '</li>';
		//echo '<li>' . get_taxonomy('activites') . '</li>';
                echo '<li>';the_terms( $post->ID, 'activites', 'Activités&nbsp;: ', ', ', ' ' );echo '</li>';
                //var_dump(get_the_terms( $post->ID, 'activites'));
echo '</div>';
	}
        var_dump($query);
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
}?>
</section>





<?php //var_dump($_POST['submit']);
if(isset($_POST['submit']))
{
	//cas d'une recherche que par le secteur
	if(isset($_POST['id_secteur']) && !empty($_POST['id_secteur']) && empty($_POST['recherche']) && isset($_POST['search-verif'])) {
		
		
            
            
            if (wp_verify_nonce($_POST['search-verif'], 'search')) {
			$requete="SELECT e.*, c.* 
					FROM entreprises e 
					INNER JOIN contacts c 
					ON e.id_entreprise=c.id_entreprise 
					WHERE e.id_secteur='" . $_POST['id_secteur'] . "'";
                                        
	}

		
	if(isset($_POST['recherche']) && !empty($_POST['recherche']) && isset($_POST['search-verif'])) {
			
		if (wp_verify_nonce($_POST['search-verif'], 'search')) {

			$_POST['recherche'] = htmlspecialchars($_POST['recherche']);

			// on exploite tous les mots de la recherche

			$mot=explode(" ",$_POST['recherche']);

			//on sélectionne tous les contacts et tous les id entreprises 

			$requete="SELECT e.*, c.* 
						FROM entreprises e 
						INNER JOIN contacts c 
						ON e.id_entreprise=c.id_entreprise WHERE ("; //faire la corrélation entre les tables entreprises et contacts

		//On calcule les résultats qui contiennent la recherche

			for ($i=0; $i < sizeof($mot) ; $i++)
			{ 
				if($i!=0)
				{
					$requete.=" OR ";
				}
				$requete.= "nom_entreprise LIKE '%".$mot[$i]."%' 
				OR activite_entreprise LIKE '%".$mot[$i]."%'
				OR nom_contact LIKE '%".$mot[$i]."%' 
				OR tel1_contact LIKE '%".$mot[$i]."%'";
			}
			//On les range par nom d'entreprises
			$requete.=")" ;
			if(isset($_POST['id_secteur']) && !empty($_POST['id_secteur']))
			{
				$requete.=" AND e.id_secteur='" . $_POST['id_secteur'] . "'";
			}

			$requete.=" ORDER BY e.nom_entreprise";

		}
	}
	if(isset($requete)){
		//On exploite le résultat de la requête
		$resultat=mysqli_query($connexion,$requete);

		$affichage_resultat="<section id=\"fiche\">\n";
		// $affichage_resultat.="<span class=\"fa fa-chevron-circle-up\"></span>";
		$i=0;
		$tab_entreprise = array();
		while($ligne=mysqli_fetch_object($resultat))
		{
			// si le nom de l'entreprise est different du nom précédent on applique la condition
			if(!in_array($ligne->id_entreprise,$tab_entreprise))
			{
				if(!empty($tab_entreprise)) {
					$affichage_resultat.="</div>\n";
				}
				$affichage_resultat.="<div class=\"allcontacts\"><div class=\"topfiche\"><div><a href=\"" . $chemin . "=" . $ligne->id_entreprise . "\">\n<span class=\"nomentreprise\">".$ligne->nom_entreprise . "</span></a><span class=\"act_entreprise\">(" . $ligne->activite_entreprise . ")</span></div><a href=\"" . $chemin . "=" . $ligne->id_entreprise ."/#fiche_ind\"><span class=\"linkfiche\">Voir la fiche</span></a></div>\n";
				$tab_entreprise[] = $ligne->id_entreprise;
				if(!empty($ligne->adresse_entreprise)){
					$affichage_resultat.="<div class=\"adresse_entreprise\"><span><img src=\"". get_template_directory_uri()."/img/picto_adress.png\" alt=\"picto telephone activ-est\"/>&nbsp;&nbsp;".$ligne->adresse_entreprise."</span></div>";
				}
			}
		
			$affichage_resultat.="<div class=\"fiche\">";

			//si visibilité = oui alors on affiche le numéro de téléphone et/ou le mail
			$tel1_contact=$ligne->tel1_contact;
			$tel2_contact=$ligne->tel2_contact;
			$visibilite_tel1=$ligne->visibilite_tel1;
			$visibilite_tel2=$ligne->visibilite_tel2;
			if(!empty($tel1_contact) && $visibilite_tel1==1)
			{
				$tel1="<img src=\"". get_template_directory_uri()."/img/picto_phone.png\" alt=\"picto telephone activ-est\"/>&nbsp;&nbsp;".$ligne->tel1_contact . "\n";
			}
			else
			{
				$tel1="";
			}
			if(!empty($tel2_contact) && $visibilite_tel2==1){
				$tel2="<img src=\"". get_template_directory_uri()."/img/picto_phone.png\" alt=\"picto telephone activ-est\"/>&nbsp;&nbsp;".$ligne->tel2_contact . "\n";
			}
			else{
				$tel2="";
			}

			if($ligne->visibilite_mail==1)
			{
				$mel="<img src=\"". get_template_directory_uri()."/img/picto_email.png\" alt=\"picto email activ-est\"/>&nbsp;&nbsp;".$ligne->mail_contact . "<br />\n";	
			}
			else{
				$mel="";
			}				
			$affichage_resultat.="<div><span class=\"prenom\"><img src=\"". get_template_directory_uri()."/img/picto_user.png\" alt=\"picto user activ-est\"/>&nbsp;&nbsp;".$ligne->prenom_contact ."&nbsp;</span>
			<span class=\"nom\">".$ligne->nom_contact."</span></div><br /> <span class=\"telephone\">".$tel1."</span><br />"."<span class=\"telephone\">".$tel2."</span>\n";
			$affichage_resultat.="<span class=\"email\">".$mel ."\n</span>";			
			$affichage_resultat.="</div>\n";			
			
		}
		//$affichage_resultat.="</div>";
		$affichage_resultat.="</section>\n";

		//On affiche les résultats
		echo $affichage_resultat;
	}
}
}

 ?>

 <!---FICHE-------------------------------------------------- -->
<?php 
if(isset($_GET['fiche']))
{
	$requete="SELECT e.*, c.* 
			FROM entreprises e 
			INNER JOIN contacts c 
			ON e.id_entreprise=c.id_entreprise WHERE e.id_entreprise='" . $_GET['fiche'] . "'";

	$resultat=mysqli_query($connexion,$requete);
	$ligne=mysqli_fetch_object($resultat);
	$fiche_entreprise="<section id=\"fiche_ind\">\n";
	$fiche_entreprise.="<div class=\"image_background\"></div>\n";
	$fiche_entreprise.="<h2 class=\"h2_logo\">" . $ligne->nom_entreprise ." (". $ligne->activite_entreprise.")</h2>\n";
	$fiche_entreprise.="<div class=\"contact_entreprise\"><p>Adresse : ".$ligne->adresse_entreprise."<br />".$ligne->cp_entreprise."&nbsp;".$ligne->ville_entreprise. "</p>";
	$fiche_entreprise.="<p>Téléphone : ".$ligne->tel_entreprise."</p>";
	$fiche_entreprise.="<a href=\"$ligne->site_entreprise\" class=\"siteweb\">Accès au site : ".$ligne->site_entreprise."</a></div>";	
	
	$fiche_entreprise.="</section>\n";
	echo $fiche_entreprise;
}
?>


<?php get_footer();?>