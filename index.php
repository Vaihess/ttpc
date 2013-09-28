<?php
session_start();
?>
<html>
    <head>
		<title>TTCP</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
		<meta name="viewport" content="width=device-width"> 
		<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="fr">
		<META NAME="DESCRIPTION" CONTENT="ttpc est un calculateur de points obtenus lors d´une compétition de tennis de table. Calculs des points par match en fonction des points de l´adversaire ou du numéro de licence">
		<META NAME="KEYWORDS" CONTENT="tennis de table, ping pong, calculateur, points, compétitions, licence, numéro">
		<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
		<META NAME="REVISIT-AFTER" CONTENT="15days">
		<META NAME="IDENTIFIER-URL" CONTENT="http://ttpc.biotux.org">
		<meta name="author" content="root" >
		<META NAME="REPLY-TO" CONTENT="stef@biotux.org">
		<script type="text/javascript">
<!--
function open_tuto()
{
window.open('tuto.php','tutoriel','menubar=no, scrollbars=yes, top=100, left=100, width=300, height=200');
}
-->
		</script>		
    </head>
<h2><p>Table Tennis points calculator </p></h2>
<body>
<a href="#null" onclick="javascript:open_tuto();">Mode d'emploi de TTPC</a>
<h3>

<form method="post" action="tableau.php">

Vos points actuels : <input type="number" name="points_moi" size="4"><br><br>
Ou votre numéro de licence : <input type="number" name="licence" size="8"><br><br>

<p><input type="radio" name="sexe" value="200" checked="checked" />Homme</p>
<p><input type="radio" name="sexe" value="300" />Femme</p><br>

<select name="nbm">
<option value="">Nombre de matchs joués</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option> 
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>

<select name="coefficient" STYLE="width:275">
<option value="" class='gras' style="color:red" >Sélectionnez votre compétition :</option>
<option value="1"> Championnat de France par équipes (National, Régional, Départemental)</option>
<option value="1.25"> Critérium Fédéral Senior (National, Régional, Départemental)</option>
<option value="1"> Critérium Fédéral Jeunes (National, Régional, Départemental)</option>
<option value="1.5"> Championnat de France individuel sénior</option>
<option value="1"> Championnat de France Jeunes (National, Régional, Départemental)</option>
<option value="0.5"> Interclubs Jeunes (National, Régional, Départemental)</option>
<option value="1.25"> Finales par Classement (National, Régional, Départemental)</option>
<option value="0.75"> Challenge Bernard Jeu (National, Régional)</option>
<option value="1"> Finales Individuelles (Régional,Départemental)</option>
<option value="0.5"> Championnat de France Vétérans (National, Régional, Départemental)</option>
<option value="1"> Championnat de France Corporatifs (National, Régional, Départemental)</option>
<option value="0.75"> Championnat de France des Régions (National)</option>
<option value="0.75"> Coupe Nationale Vétérans (National, Régional, Départemental)</option>
<option value="1"> Coupe Nationale Corporative</option>
<option value="1.5"> Top national Seniors (N)</option>
<option value="0.75"> Tournois Nationaux et Internationaux joués en France</option>
<option value="0.5"> Autres compétitions par équipes Régionales ou Départementales</option>
<option value="0.5"> Autres compétitions individuelles Régionales ou Départementales</option>
<option value="" class='gras' style="color:red" >Ou sélectionnez directement le coefficient :</option>
<option value="0.5">0.5</option>
<option value="0.75">0.75</option>
<option value="1">1</option>
<option value="1.25">1.25</option>
<option value="1.5">1.5</option>
</select>

<input type="submit" value="Validez vos choix">

</h3>
<?php require 'footer.php'; ?>


