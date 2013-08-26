<?php
// COMPTEUR VISITEURS //
if (file_exists("compteur_visites.txt")) {
$fichier_visites = fopen('compteur_visites.txt', 'r+');
$visites = fgets($fichier_visites); // On lit la première ligne (nombre de pages vues)
	if(!isset($_SESSION['compteur_de_visites'])) //si session n'existe pas
	{
	$_SESSION['compteur_de_visites'] = 'visites'; //on crée la variable de session
	$visites++;// On augmente de 1 ce nombre de visites
	fseek($fichier_visites, 0); // On remet le curseur au début du fichier
	fputs($fichier_visites, $visites); // On écrit le nouveau nombre de visite
	$_SESSION['visites'] = $visites;
	include("geo.php"); //géolocalisation du visiteur
	fclose($fichier_visites);
	echo '<p>Il y a eu ' . $visites . ' visiteurs !</p>';
	}
	else {
	echo '<p>Il y a eu ' . $visites . ' visiteurs !</p>';
	}
} else {
$visites = 1;
$_SESSION['compteur_de_visites'] = 'visites'; //on crée la variable de session
touch ("compteur_visites.txt" , 0777); //On crée le fichier du compteur
$fichier_visites = fopen('compteur_visites.txt', 'r+');
fseek($fichier_visites, 0);
fputs($fichier_visites, $visites);
fclose($fichier_visites);
echo '<p>Il y a eu ' . $visites . ' visiteur !</p>';
}

// COMPTEUR PAGES //
if (file_exists("compteur.txt")) {
$monfichier = fopen('compteur.txt', 'r+');
$pages_vues = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
$pages_vues++; // On augmente de 1 ce nombre de pages vues
fseek($monfichier, 0); // On remet le curseur au début du fichier
fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues
fclose($monfichier);
echo '<p>Il y a eu ' . $pages_vues . ' pages visitées !</p>';
} else {
$pages_vues = 1;
touch ("compteur.txt" , 0777);
$monfichier = fopen('compteur.txt', 'r+');
fseek($monfichier, 0);
fputs($monfichier, $pages_vues);
fclose($monfichier);
echo '<p>Il y a eu ' . $pages_vues . ' pages visitées !</p>';
}
?>
