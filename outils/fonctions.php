<?php

//===============================
// la fonction connexion() permet de choisir une
// base de données et de s'y connecter.
function connexion()
{
  require_once("connect.php");
  $connexion = mysqli_connect(SERVEUR,LOGIN,PASSE,BASE) or die("Error " . mysqli_connect_error($connexion));
  return $connexion; 
}
//fonction pour l'affichage des résulatats du moteur de recherche 

function my_google(){}


?>