<?php
/*analyse du type de requête reçue par le serveur*/
$method = $_SERVER['REQUEST_METHOD'];

/*réponse en fonction du type de la requête*/
switch($method) {
	
	//réception en GET = read (one ou all) ou isset
	case "GET" :
		$error_msg = "Veuillez utiliser un attribut \"id\" ou bien un attribut \"isset\" avec pour valeur un entier strictement positif correspondant à l'identifiant de l'objet à considérer" ;
		
		if(count($_GET) > 1) {
			echo "Erreur : trop de paramètres transmis au serveur. " . $error_msg ;
		} else if(count($_GET) == 0) {
			echo "on fait un READ ALL" ;
		} else if(isset($_GET['isset']) && ((int)$_GET['isset'] > 0)) {
			echo "On fait un ISSET ONE (quitte à renvoyer un message d'inexistance)" ;
		} else if(isset($_GET['id']) && ((int)$_GET['id'] > 0)) {
			echo "on fait un READ ONE (quitte à renvoyer un message d'inexistance)" ;
		} else {
			echo "Une erreur dans le paramètre transmis empêche le serveur de répondre. " . $error_msg ;
		}
	break ;
	
	//réception en POST = create
	case "POST" :
		echo "On checke qu'on a reçu ce qu'il faut, que l'envoyeur a les permissions nécessaires, et on crée" ;
	break ;
	
	//réception en PUT = update
	case "PUT" :
		echo "On checke qu'on a reçu ce qu'il faut, que l'envoyeur a les permissions nécessaires, et on modifie" ;
	break ;
	
	//réception en DELETE = delete
	case "DELETE" :
		echo "On checke qu'on a reçu ce qu'il faut, que l'envoyeur a les permissions nécessaires, et on supprime" ;
	break ;

	//réception différente
	default : 
		echo "Protocole de requête non pris en charge par ce serveur" ;
}
?>
<!--

chaque page devra renvoyer le bon code http (200, etc) en fonction du résultat, des données en json ou un true
chaque page devra demander confirmation avant action (ou utiliser un token de session, donc peut-être plus d'un paramètre en get, à voir)

-->
