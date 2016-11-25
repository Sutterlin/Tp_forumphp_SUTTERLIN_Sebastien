<!--
BUT : Page qui gère le formulaire de connexion et la suppression des variables de session suite à l'appui sur le bouton de déconnexion
-->
<?php
	//Initialisation de la session pour avoir accès aux variables de session
	session_start();
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Authentification</title>
	</head>
	<body>
	<?php 
		if (isset($_POST['logout']))  //si l'on clique sur logout on détruit la session.
		{
			session_destroy();
		}
	?>
		<form id="login" action="Authentification.php" method="POST">
			<div>
				<p><label for="id">Identifiant : </label><input type="text" name="id"  required /></p>
				<p><label for="pass">Mot de passe : </label><input type="text" name="pass" required /></p>
				<p><input type="submit" value="login" /></p>				
			</div>
		</form>		
	</div>
	 <?php 
	
	if((isset($_POST['id'])) && (isset($_POST['pass'])))
	{
		$id = htmlspecialchars($_POST['id']);
		$pass = htmlspecialchars($_POST['pass']);
		
		$xml = new DOMDocument();
		
		$xml->load('logins.xml'); //on charge un nouveau fichier xml
		
		$xml_logins = $xml->getElementsByTagName('logins');
		
		$xml_logins = $xml_logins[0];
		
		$xml_utilisateur = $xml_logins->getElementsByTagName('utilisateur');
		
		$Nbrutilisateur = $xml_utilisateur->length;
		
		for ($i = 0 ; $i < $Nbrutilisateur ; $i++ )
		{
			if ((( $xml_utilisateur[$i]->getElementsBytagName('id')[0]->nodeValue) == $id ) && (( $xml_utilisateur[$i]->getElementsByTagName('mdp')[0]->nodeValue) == $pass))
			{
				$_SESSION['id'] = $id;
				$_SESSION['pass'] = $pass;
				header('Location: TP_SUTTERLIN_Sebastien.php');
				exit();
			} else {
				if ($i == ($Nbrutilisateur - 1) )
				{
					echo "<p>Cet identifiant ou ce mot de passe n'existe pas.</p>";
				}
			}			
		}
	}
?>
	</body>	
</html>

