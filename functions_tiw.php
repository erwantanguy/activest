<?php 

//===============================
// la fonction connecter() permet de choisir une
// base de données et de s'y connecter.

function connexion()
{
  require_once("connect.php");
  $_SESSION['bdd']=constant("BASE");
  $connexion=mysqli_connect (SERVEUR, LOGIN, PASSE, BASE);
  if (! $connexion)
    {
    $message="Impossible de se connecter\n";
    echo $message;
    exit;
    }
  return $connexion;
}

 ?>