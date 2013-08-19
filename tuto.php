<?php
session_start();
?>
<html>
    <head>
		<title>TTCP</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
		<meta name="viewport" content="width=device-width">
		<title>TTPC : Mode d'emploi</title>
		<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="fr">
	</head>
<h2><p>Table Tennis points calculator : mode d'emploi</p></h2>
<body>

<h3><p>Utilisation :</p></h3>
<ul>
<li>Entrez votre nombre de points ou votre numéro de licence dans le champ prévu. Dans ce dernier cas, n'oubliez pas de préciser votre sexe (homme ou femme). Le script va récupérer les points de votre situation mensuelle à partir de votre numéro de licence.</li>
<li>Choisissez le nombre de matchs que vous avez joué.</li>
<li>Choisissez le type de compétition parmi celles proposées ou directement le coefficient correspondant.</li>
</ul>
Ensuite, entrez dans les champs prévus :
<ul>
<li>soit le nombre de points de vos adversaires</li>
<li>soit le numéro de licence de chacun de vos adversaires (précisez obligatoirement homme ou femme): les points seront récupérés à partir de leurs situations mensuelles.</li>
<li>n'oubliez pas d'indiquer si vous avez gagné ou perdu chacun des matchs.</li>
</ul>

<h3><p>Résultats :</p></h3>

Pour chacun des matchs joué, vous aurez le nombre de points acquis (ou non ...) à chaque partie, le nombre de point total ainsi que le total
de vos points à l'issue de tous les matchs.

<?php require 'footer.php'; ?>


