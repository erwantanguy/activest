<?php
/*
Template Name: inscription
*/ get_header();?>
<?php //the_content(); ?>

  	<form action="" method="post" autocomplete="on" id="formulaire_inscription">
		
	 	<fieldset id="fiche_contact_mail">

	 	<h2>Fiche informations contact</h2>

		 	<div class="center">
		 		<label id="civil2">Nom de l'entreprise<span class="obligatoire">*</span></label>
                                <input required="required" type="text" name="nom_entreprise" placeholder="Nom de votre entreprise">
                                <label>Adresse<span class="obligatoire">*</span></label>
                                <input required="required" type="text" name="adresse_entreprise" placeholder="L'adresse de votre entreprise">

                                <label>Code postal<span class="obligatoire">*</span></label>
                                <input required="number" type="text" name="cp_entreprise" placeholder="Le code postal de votre entreprise">

                                <label>Ville<span class="obligatoire">*</span></label>
                                <input required="required" type="text" name="ville_entreprise" placeholder="Ville dans laquelle se situe votre entreprise">
                                <label>Nombre de salariés</label>
                                <input type="number" name="effectif_entreprise" placeholder="Le nombre de salariés au sein de votre entreprise">
				<label>Nom et prénom du dirigeant <span class="obligatoire">*</span></label>
		 		<input  required="required" type="text" name="nom_contact" placeholder="Nom et prénom du dirigeant">
                                
		 		<label id="civil1">Civilité <br /></label>
			 	<p class="visibilites_tels">		 				
					<input type="radio" value="madame" name="civilite_contact" id="madame" checked><label for="madame">Madame</label>					
					<input type="radio" value="monsieur" name="civilite_contact" id="monsieur"><label for="monsieur">Monsieur</label>
				</p>
		 		<label >Nom et prénom du représentant <span class="obligatoire">*</span></label>
		 		<input required="required" type="text" name="prenom_contact" placeholder="Nom et prénom du représentant">
		 		<label>Fonction <span class="obligatoire">*</span></label>
		 		<input required="required" type="text" name="fonction_contact" placeholder="Votre fonction">

				<label>Numéro de téléphone du représentant <span class="obligatoire">*</span></label>
		 		<input required="required" type="tel" name="tel1_contact" placeholder="Votre numéro de ligne directe">


			 	<label>Souhaitez-vous faire apparaître ce numéro dans notre annuaire ? <br /></label>	
		 		<p class="visibilites_tels">
					<input type="radio" value="oui" name="visibilite_tel1" id="oui_tel1" ><label for="oui_tel1">Oui</label>
					<input type="radio" value="non" name="visibilite_tel1" id="non_tel1" checked><label for="non_tel1">Non</label>
				</p>
                                <label>Adresse mail du représentant <span class="obligatoire">*</span></label>
                                <input required="required"  type="email" name="mail_contact" placeholder="Votre adresse mail" pattern=".*@.*\:{2,}">

                                <label>Souhaitez-vous faire apparaître cette adresse mail dans notre annuaire ?<br /></label>

                                <p class="visibilites_tels">
					
					<input type="radio" value="oui" name="visibilite_mail" id="oui_tel2" ><label for="oui_tel2">Oui</label>
					<input type="radio" value="non" name="visibilite_mail" id="non_tel2" checked><label for="non_tel2">Non</label>
                                </p>

				 	<textarea class="infos_contact" name="infos_contact" placeholder="Informations complémentaires sur votre place dans l'entreprise, vos diponibilités, vos souhaits, une petite description de votre entreprise..."></textarea>
			 <p class="mention">Les champs suivis de la mention "<span class="obligatoire">*</span>" sont obligatoires.</p>
				
			</div>	
	 	</fieldset>	
		
		

		<fieldset id="fiche_entreprise_mail">

		<h2>Pour améliorer le référencement de votre entreprise dans l’annuaire, veuillez renseigner les informations concernant votre structure</h2>

		<div class="center" >

			<label>Secteur d'activité<span class="obligatoire">*</span></label>
	 		<input required="required" type="text" name="activite_entreprise" placeholder="Secteur d'activité">

	 		<label>La forme juridique de votre structure<span class="obligatoire">*</span></label>
	 		<input required="required" type="text" name="forme_juridique" placeholder="La forme juridique de votre entreprise">

	 		<label>APE</label>
	 		<input type="text" name="ape_entreprise" placeholder="Le numéro APE de votre entreprise">

	 		<label>SIRET<span class="obligatoire">*</span></label>
	 		<input required="required" type="number" name="siret_entreprise" placeholder="Le numéro SIRET de votre entreprise">

	 		<label>Chiffre d'affaire</label>
	 		<input type="number" name="ca_entreprise" placeholder="Chiffre d'affaire">

	 		<label>Numéro de téléphone de l'entreprise <span class="obligatoire">*</span></label>
	 		<input required="required"  type="tel" name="tel_entreprise" placeholder="Le numéro de téléphone de votre entreprise">
	 		
	 		<label>Site WEB</label>
	 		<input type="text" name="site_entreprise" placeholder="Saisissez l'URL du site Web de votre entreprise">
	 	
			
		</div>
		
		<p class="mention">Les champs suivis de la mention "<span class="obligatoire">*</span>" sont obligatoires.</p>
		</fieldset>
	 	<div class="g-recaptcha" id="captcha" data-sitekey="6Ld42xIUAAAAAL9K1TRqE98g_o0BcMApCaNsIwvF"></div>	
		<input type="submit" name="sinscrire" value="S'inscrire" id="sinscrire">
		<a href="http://activ-est.buroscope-tiw.fr/activest_blank/connexion/" class="compte_existant">J'ai déjà un compte</a>
		
 	</form>
 	
	<?php


	if (isset($_POST['prenom_contact'])) {

	$civilite_contact= isset($_POST['civilite_contact']) ? $_POST['civilite_contact'] : NULL;
	$prenom_contact=isset($_POST['prenom_contact']) ? $_POST['prenom_contact'] : NULL;
	$nom_contact=isset($_POST['nom_contact']) ? $_POST['nom_contact'] : NULL;
	$fonction_contact=isset($_POST['fonction_contact']) ? $_POST['fonction_contact'] : NULL;
	$infos_contact=isset($_POST['infos_contact']) ? $_POST['infos_contact'] : NULL;
	$tel1_contact=isset($_POST['tel1_contact']) ? $_POST['tel1_contact'] : NULL;;
	$tel2_contact=isset($_POST['tel2_contact']) ? $_POST['tel2_contact'] : NULL;
	$visibilite_tel1=isset($_POST['visibilite_tel1']) ? $_POST['visibilite_tel1'] : NULL;
	$visibilite_tel2=isset($_POST['visibilite_tel2']) ? $_POST['visibilite_tel2'] : NULL;
	$mail_contact=isset($_POST['mail_contact']) ? $_POST['mail_contact'] : NULL;
	$visibilite_mail=isset($_POST['visibilite_mail']) ? $_POST['visibilite_mail'] : NULL;

	$nom_entreprise=isset($_POST['nom_entreprise']) ? $_POST['nom_entreprise'] : NULL;;
	$activite_entreprise=isset($_POST['activite_entreprise']) ? $_POST['activite_entreprise'] : NULL;
	$tel_entreprise=isset($_POST['tel_entreprise']) ? $_POST['tel_entreprise'] : NULL;
	$fax_entreprise=isset($_POST['fax_entreprise']) ? $_POST['fax_entreprise'] : NULL;
	$adresse_entreprise=isset($_POST['adresse_entreprise']) ? $_POST['adresse_entreprise'] : NULL;
	$cp_entreprise=isset($_POST['cp_entreprise']) ? $_POST['cp_entreprise'] : NULL;
	$ville_entreprise=isset($_POST['ville_entreprise']) ? $_POST['ville_entreprise'] : NULL;
	$ca_entreprise=isset($_POST['ca_entreprise']) ? $_POST['ca_entreprise'] : NULL;
	$ape_entreprise=isset($_POST['ape_entreprise']) ? $_POST['ape_entreprise'] : NULL;
	$siret_entreprise=isset($_POST['siret_entreprise']) ? $_POST['siret_entreprise'] : NULL;
	$forme_juridique=isset($_POST['forme_juridique']) ? $_POST['forme_juridique'] : NULL;
	$effectif_entreprise=isset($_POST['effectif_entreprise']) ? $_POST['effectif_entreprise'] : NULL;
	$site_entreprise=isset($_POST['site_entreprise']) ? $_POST['site_entreprise'] : NULL;
        if($effectif_entreprise>10){$cotisation="250€";}else{$cotisation="160€";}
	$demande_incription="<p>Bonjour,<br><br>Merci d’avoir solliciter votre adhésion à Activ’Est 2018.<br>Pour finaliser votre inscription, merci de bien vouloir envoyer votre règlement de cotisation de ".$cotisation." , soit par chèque à l'ordre de :<br>Activ'Est<br><br>à l'adresse suivante :<br>Association Activ’est<br>7 rue des Charmilles<br>35510 Cesson-Sévigné<br><br>Soit par virement, à l'ordre de :<br>Nom du titulaire du compte : Association Activ'Est<br>Domiciliation : CCM CHANTEPIE<br>IBAN : FR7615589351220123696154095<br>BIC : CMBRFR2BARK<br>intitulé : Adhésion 2018 - \"nom de votre entreprise\"</p><hr>";
	$demande_incription.="<table id=\"envoi_contact\">";
	$demande_incription.="<tr><td>Nom et prénom du dirigeant : ".$_POST['nom_contact']."</td></tr>\n";
	$demande_incription.="<tr><td>Civilité du représentant : ".$_POST['civilite_contact']."</td></tr>\n";
	$demande_incription.="<tr><td>Nom et prénom du représentant : ".$_POST['prenom_contact']."</td></tr>\n";
	$demande_incription.="<tr><td>Fonction du représentant : ".$_POST['fonction_contact']."</td></tr>\n";
	$demande_incription.="<tr><td>Informations complémentaires : ".$_POST['infos_contact']."</td></tr>\n";
	$demande_incription.="<tr><td>Téléphone du représentatnt : ".$_POST['tel1_contact']."</td></tr>\n";
	$demande_incription.="<tr><td>Annuaire : ".$_POST['visibilite_tel1']."</td></tr>\n";
	//$demande_incription.="<tr><td>".$_POST['tel2_contact']."</td></tr>\n";
	//$demande_incription.="<tr><td>".$_POST['visibilite_tel2']."</td></tr>\n";
	$demande_incription.="<tr><td>Mail du représentant : ".$_POST['mail_contact']."</td></tr>\n";
	$demande_incription.="<tr><td>Annuaire : ".$_POST['visibilite_mail']."</td></tr>\n";
	$demande_incription.="</table>";
        $demande_incription.="<hr>";
	$demande_incription.="<table id=\"envoi_entreprise\">";
	$demande_incription.="<tr><td>Nom de l'entreprise : ".$_POST['nom_entreprise']."</td></tr>\n";
	$demande_incription.="<tr><td>Secteur d'activité : ".$_POST['activite_entreprise']."</td></tr>\n";
	$demande_incription.="<tr><td>Téléphone de l'entreprise : ".$_POST['tel_entreprise']."</td></tr>\n";
	//$demande_incription.="<tr><td>".$_POST['fax_entreprise']."</td></tr>\n";
	$demande_incription.="<tr><td>Adresse de l'entreprise : ".$_POST['adresse_entreprise']."</td></tr>\n";
	$demande_incription.="<tr><td>Code postal : ".$_POST['cp_entreprise']."</td></tr>\n";
	$demande_incription.="<tr><td>Ville : ".$_POST['ville_entreprise']."</td></tr>\n";
	$demande_incription.="<tr><td>Chiffre d'affaire : ".$_POST['ca_entreprise']."</td></tr>\n";
	$demande_incription.="<tr><td>Code APE : ".$_POST['ape_entreprise']."</td></tr>\n";
	$demande_incription.="<tr><td>SIRET : ".$_POST['siret_entreprise']."</td></tr>\n";
	$demande_incription.="<tr><td>Forme juridique : ".$_POST['forme_juridique']."</td></tr>\n";
	$demande_incription.="<tr><td>Nombre de salariés : ".$_POST['effectif_entreprise']."</td></tr>\n";
	$demande_incription.="<tr><td>Site web : ".$_POST['site_entreprise']."</td></tr>\n";
	$demande_incription.="</table>";
	

		$destinataire = $_POST['mail_contact'].',contact@activ-est.fr,compta@activ-est.fr,erwan@ticoet.me';
		$sujet = 'Demande d\'inscription';
		$message = 'Vous avez une demande d\'inscription';
		$from_user = "=?UTF-8?B?".base64_encode("contact@activ-est.fr")."?=";
		$header= "From: $from_user <Activ'est>\r\n". 
               "MIME-Version: 1.0" . "\r\n" . 
               "Content-type: text/html; charset=UTF-8" . "\r\n";



		               
         if (isset($_POST['sinscrire'])) {

			//si le formulaire est rempli, on envoi un mail et on redirige vers la page "en cours de validation" avec le script

          	mail($destinataire, $sujet, $demande_incription, $header);
          	//echo '<script type="text/javascript">window.location = "https://activ-est.fr/en-attente-de-validation/"</script>';
                echo '<script type="text/javascript">window.location = "https://activ-est.fr/inscription/niveaux-dadhesion"</script>';
                //echo '<script type="text/javascript">window.location = "https://activ-est.fr/en-attente-de-validation/"</script>';

      		$reCaptcha = new ReCaptcha($secret);
			if(isset($_POST["g-recaptcha-response"])) {
			    $resp = $reCaptcha->verifyResponse(
			        $_SERVER["REMOTE_ADDR"],
			        $_POST["g-recaptcha-response"]
			        );
			    if ($resp != null && $resp->success) {echo "CAPTCHA OK";}
			    else {echo "CAPTCHA incorrect";}
			    }
          }
      }

      

	?>
 	

<?php get_footer();?>