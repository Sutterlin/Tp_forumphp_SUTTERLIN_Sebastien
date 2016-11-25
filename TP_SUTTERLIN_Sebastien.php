<?php
	session_start();
	if (isset($_SESSION['id']))
	{
		if (isset($_SESSION['Time']))
		{
			if ( time() > $_SESSION['Time']+1800)
			{
				session_destroy();
			}
		} else {
			$_SESSION['Time'] = time();
		}
	} else {
		header('Location: Authentification.php');
		exit();
	}
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Forum</title>
	<link rel="stylesheet" href="style.css">
	<script src="script.js"> </script>
</head>

<body>
<form id="deco" action="Authentification.php" method="POST">
			<input name="logout" type="submit" value="logout" />
</form>
<form action="TP_SUTTERLIN_Sebastien.php" method="POST">
<h1><center>Forum</center></h1>
<p>



</p>


</form>




<footer>
<form action="TP_SUTTERLIN_Sebastien.php" method="POST">

<h2><center>FORMULAIRE</center></h2>   
<div>
<p>

	<center><label for="pseudo"><strong>Pseudo : </strong></label><input type="text" name="pseudo" /></center>  
	<br/>
	<br/>
	<center><label for="titre"><strong>Titre du message : </label><input type="text" name="titre" /></center> 
	<br/>
	<br/>
	
	<center><textarea name="message" for="message"  placeholder="Entrez votre message..." rows="5" cols="27"></textarea></center>   
	
	<br/>
	<br/>
	<center><input type="submit" value="Poster" /></center>  

	

</p>
</form>
</div>
</footer>
</body>
</html>




	 
	
	<div>
	<div class="scroll">
<?php

	date_default_timezone_set('Europe/Paris'); //On règle le fuseau horaire sur celui de Paris
	$today = date("F j, Y, g:i a");    		// On enregistre la date et l'heure et on la place dans la variable today.

	if(isset($_POST['pseudo']) AND isset($_POST['titre']) AND isset($_POST['message']) )
	{
		$file = fopen("tp.txt", "a+");		//On ouvre le fichier en lecture+écriture, et on place le pointeur au début du fichier.
		echo '<br/>';
		fwrite($file,"Pseudo : ".$_POST['pseudo']."<br/>"."<br/>");     //On écrit le pseudo à la bonne place dans le tableau
		
		fwrite($file,"Titre : ".$_POST['titre']."<br/>"."<br/>");		//On écrit le titre à la bonne place dans le tableau
		echo '<br/>';
		fwrite($file,"Message : ".$_POST['message']."<br/>"."<br/>");	//On écrit le message  à la bonne place dans le tableau
		echo '<br/>';
		fwrite($file,"Date : ".$today."<br/>"."<br/>");                 //On écrit  simplement le contenu de la variable qui contient la date
		echo '<br/>';
		// fwrite($file,"----------------------------------------------------------------------"."<br/>");  //ecriture de la séparation
		 // echo '<br/>';
		 
		$lines = file("tp.txt");		
		foreach($lines as $n => $line)   //On affiche le texte ligne par ligne.
		echo $line . "<br/>";
		}
	
	
	
	
	
	
	
	
	
	
	 
	 
	
?>