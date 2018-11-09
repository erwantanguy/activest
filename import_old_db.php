<?php
/**
 * Created by PhpStorm.
 * User: ojowyn
 * Date: 21/02/2017
 * Time: 21:41secteurs
 */

define('DSN_BASE_A','mysql:host=db673438701.db.1and1.com;dbname=db673438701');
define('USER_BASE_A','dbo673438701');
define('PASS_BASE_A','Activ-35');

// chargement des fonctions WP
require "wp-load.php";
require "wp-admin/includes/admin.php";

// Connexion à la base de donnée annu-activ-est
$connexion = new PDO(DSN_BASE_A, USER_BASE_A, PASS_BASE_A);

//recupération des données de la base annu-activ-est
$sql = 'SELECT e.*, c.*, s.* FROM entreprises as e
			LEFT JOIN contacts as c
			ON e.id_entreprise = c.id_entreprise
			LEFT JOIN secteurs as s
			ON e.id_secteur = s.id_secteur
			ORDER BY e.id_entreprise';

$query = $connexion->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ|PDO::FETCH_GROUP);

/**
 *
 * Etape 1. Pour chaque entreprise créer l'entreprise et lier au secteur
 * Etape 2. Pour chaque utilisateur créer l'utilisateur et lier à l'entreprise
 *          (ID = nom_prenom PASS = nom_prenom)
 */


// pour chaque entreprise
foreach($result as $key => $entreprise) {
	$currentEntreprise  = $entreprise[0];
	$activite = strtolower($currentEntreprise->activite_entreprise);
	$secteurs = explode(',', $currentEntreprise->secteur);
	foreach($secteurs as $secteur) {
		trim(strtolower($secteur));
	}
	$secteurs = implode(',', $secteurs);

	// Préparation d'un post de type recherche_annuaire
	$post_arr = array(
		'post_title'   => $currentEntreprise->nom_entreprise,
		'post_content' => '',
		'post_type' => 'recherche_annuaire',
		'post_status'  => 'publish',
		'post_author'  => 1,
		'tax_input'    => array(
			'activites'     => $activite,
			'secteurs' => $secteurs,
		),
		'meta_input'   => array(
			'nom_entreprise' => $currentEntreprise->nom_entreprise,
			'forme_juridique' => $currentEntreprise->forme_juridique,
			'ape_entreprise' => $currentEntreprise->ape_entreprise,
			'siret_entreprise' => $currentEntreprise->siret_entreprise,
			'ca_entreprise' => $currentEntreprise->ca_entreprise,
			'effectif_entreprise' => $currentEntreprise->effectif_entreprise,
			'adresse_entreprise' => $currentEntreprise->adresse_entreprise,
			'cp_entreprise' => $currentEntreprise->cp_entreprise,
			'ville_entreprise' => $currentEntreprise->ville_entreprise,
			'tel_entreprise' => $currentEntreprise->tel_entreprise,
			'fax_entreprise' => $currentEntreprise->fax_entreprise,
			'mail_entreprise' => $currentEntreprise->site_entreprise,
		),
	);
	// Ajout du post type recherche_annuaire
	$id = wp_insert_post($post_arr);
	echo 'l\'entrepise ' . $currentEntreprise->nom_entreprise . ' créé avec l\'ID: ' . $id . PHP_EOL;

	// Ajout des contacts associés à l'entreprise
	foreach($entreprise as $keyContact => $contact) {

		$nom = $contact->nom_contact;
		$prenom = $contact->prenom_contact;
		// Préparation d'un utilisateur
		$userdata = array(
			'user_pass' => strtolower($nom.'.'.$prenom),
			'user_login' => sanitize_title($nom.'.'.$prenom),
			'user_mail' => $contact->mail_contact,
			'first_name' => $prenom,
			'last_name' => $nom,
			'show_admin_bar_front' => false,
			'role' => 'editor',
		);
		// Ajout de l'utilisateur
		$userID = wp_insert_user($userdata);
		// Si $userID est un objet c'est une erreur (surement un doublon de login)
		// donc on recommence en changeant le login
		if(is_object($userID)) {
			$userdata['user_login'] .= $key;
			$userID = wp_insert_user($userdata);
		}
		// on ajoute les metauser 
		add_user_meta($userID, 'entreprise', $id);
		add_user_meta($userID, 'telephone', $contact->tel1_contact);
		echo 'l\'utilisateur ' . $nom .' '. $prenom . ' créé avec l\'ID: '.$userID . PHP_EOL;

	}
}