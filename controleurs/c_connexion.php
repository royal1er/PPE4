<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		break;
	}
  case 'deconnexion':{
    deconnecter();
		include("acceuil.php");
		break;
  }
	case 'valideConnexion' :{
	//Connexion d'un visiteur
if (isset($_REQUEST["connexion"])){
			global $pdo;
      $login = $_REQUEST['login'];
			$mdp = $_REQUEST['password'];
			$visiteur = getInfosVisiteur($login, $mdp);
			if($visiteur==null){
				ajouterErreur("Login ou mot de passe incorrect");
				include("vues/v_erreurs.php");
				// include("vues/v_connexion.php");
			} else{
				$nom = $visiteur[0]-> nom;
				$prenom = $visiteur[0]-> prenom;
				$id = $visiteur[0]-> id;
				connecter($id, $nom, $prenom);
				include("acceuil.php");
			}
      break;
}
}
	default :{
		include("acceuil.php");
		break;
	}
}
?>