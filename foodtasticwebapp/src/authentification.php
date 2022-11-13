<?php
// connexion à la bdd correspondante dbconnect

include('db_user_connect.php');

$loginst = 0;

// Vérifier si identifiant de l'utilisateur existe dans la bdd

if (isset($_SESSION['identifiant'])) {
$id_auth=$_SESSION['identifiant'];

// requête permettant de parcourir le tableau dans la bdd

	$ses_req = $db->prepare("SELECT identifiant FROM utilisateurs WHERE identifiant='$id_auth' ");

// exécution de la requête 
	$ses_req -> execute(array($id_auth));


	if(!isset($login_id)){
	$loginst = 1;
	}
}
?>