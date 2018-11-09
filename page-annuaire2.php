<?php get_header();
// le require sert à lier le fichier fonctions 
//require_once("outils/fonctions.php");
//on établit la connexion à  la base 	
//$connexion=connexion();//on stocke dans une variable ($connexion) établie par la fonction connexion()
//mysqli_set_charset($connexion, "utf8");
//$chemin=get_theme_root_uri() . "/annuaire?fiche";

$secteurs = get_terms('secteurs');
?>




	<section id="annuaireform">
		<h1>Rechercher dans l'annuaire Activ'est : </h1>
		<form class=" annuairesearch" method="POST" action="#fiche">


			<?php wp_nonce_field('search', 'search-verif'); ?>

			<input  type="text" autocomplete="off" name="recherche" placeholder="Rechercher un nom, une entreprise...">
			<select name="id_secteur">
				<option>Choisir un secteur</option>
				<?php foreach($secteurs as $secteur): ?>
					<option value="<?php echo $secteur->term_id;?>"><?php echo $secteur->name;?></option>
				<?php endforeach;
				/*$requete_secteur="SELECT * FROM secteurs ORDER BY secteur";
				$resultat=mysqli_query($connexion,$requete_secteur);

				$ld_secteurs="<select name=\"id_secteur\" placeholder=\"Secteur d'activité\">\n";
				$ld_secteurs.="<option value=\"\"></option>\n";
				$i=0;
				while($ligne=mysqli_fetch_object($resultat)) {
					$ld_secteurs.="<option value=\"" . $ligne->id_secteur . "\">" . $ligne->secteur . "</option>\n";
					}
				$ld_secteurs.="</select>\n";
				echo $ld_secteurs;*/
				?>
			</select>
			<!--<input class="valider" type="submit" name="submit" value="Rechercher">-->
		</form>
	</section>
	<section class="contenu_recherche"></section>



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
	$fiche_entreprise="<div class=\"image_background\"></div>\n";
	$fiche_entreprise.="<h2 class=\"h2_logo\">" . $ligne->nom_entreprise ." (". $ligne->activite_entreprise.")</h2>\n";
	$fiche_entreprise.="<div class=\"contact_entreprise\"><p>Adresse : ".$ligne->adresse_entreprise."<br />".$ligne->cp_entreprise."&nbsp;".$ligne->ville_entreprise. "</p>";
	$fiche_entreprise.="<p>Téléphone : ".$ligne->tel_entreprise."</p>";
	$fiche_entreprise.="<a href=\"$ligne->site_entreprise\" class=\"siteweb\">Accès au site : ".$ligne->site_entreprise."</a></div>";

	$fiche_entreprise.="</section>\n";
	echo $fiche_entreprise;
}

?>


<?php get_footer();