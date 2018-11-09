<?php get_header(); ?>

<form action="" method="post" autocomplete="on" id="formulaire_inscription" class="formcontact">
		
	 	<fieldset id="fiche_contact_mail">

	 	<h2>Formulaire de contact</h2>

		 	<div class="center">
				<label>Nom <span class="obligatoire">*</span></label>
		 		<input  required="required" type="text" name="nom_contact_contact" placeholder="Nom">
		 		<label >Prénom <span class="obligatoire">*</span></label>
		 		<input required="required" type="text" name="prenom_contact_contact" placeholder="Prénom">
				<label>Adresse mail<span class="obligatoire">*</span></label>
				 <input required="required"  type="email" name="mail_contact_contact" placeholder="Votre adresse mail" pattern=".*@.*\:{2,}">
				 <label>Votre message<span class="obligatoire">*</span></label>
				<textarea required="required" name="infos_contact_contact" placeholder="Écrivez votre message ici"></textarea>
				<p class="mention">Les champs suivis de la mention "<span class="obligatoire">*</span>" sont obligatoires.</p>
				<input type="submit" name="sinscrire_contact" value="Envoyer" id="sinscrire" class="sinscrire_contact">
			</div>
	 	</fieldset>		 	
			
		</div>
		
		
		
</form>



<?php


	if (isset($_POST['prenom_contact_contact'])) {

	$prenom_contact=isset($_POST['prenom_contact_contact']) ? $_POST['prenom_contact_contact'] : NULL;
	$nom_contact=isset($_POST['nom_contact_contact']) ? $_POST['nom_contact_contact'] : NULL;
	$mail_contact=isset($_POST['mail_contact_contact']) ? $_POST['mail_contact_contact'] : NULL;
	$message=isset($_POST['infos_contact_contact']) ? $_POST['infos_contact_contact'] : NULL;

	$demande_incription="";
	$demande_incription.="<table id=\"envoi_contact\">";
	$demande_incription.="<tr><td>Nom : ".$_POST['nom_contact_contact']."</td></tr>\n";
	$demande_incription.="<tr><td>Prénom : ".$_POST['prenom_contact_contact']."</td></tr>\n";
	$demande_incription.="<tr><td>Mail : ".$_POST['mail_contact_contact']."</td></tr>\n";
	$demande_incription.="<tr><td>Message : <br>".$_POST['infos_contact_contact']."</td></tr>\n";
	$demande_incription.="</table>";

	

		$destinataire = 'contact@activ-est.fr';
		$sujet = 'Fomulaire de contact';
		$message = 'Activ-Est - Nouveau message';
		$from_user = "=?UTF-8?B?".base64_encode("contact@activ-est.fr")."?=";
		$header= "From: $from_user <Activ'est>\r\n". 
               "MIME-Version: 1.0" . "\r\n" . 
               "Content-type: text/html; charset=UTF-8" . "\r\n";



		               
        if (isset($_POST['sinscrire_contact'])) {

			//si le formulaire est rempli, on envoi un mail et on redirige vers la page "en cours de validation" avec le script

          	mail($destinataire, $sujet, $demande_incription, $header);
          	echo '<script type="text/javascript">window.location = "http://activ-est.fr/envoi-confirme/"
      		</script>';
        }
      }

     get_footer();

	?>