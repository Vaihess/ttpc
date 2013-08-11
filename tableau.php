<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Paramètres des matchs joués</title>
    </head>
<h2><p>Table Tennis points calculator </p></h2>
<body>
</html>
<?php
// on récupère les variables du formulaire
$pm = $_POST['points_moi']; // mes points si je les connais
$_SESSION['licence'] = $_POST['licence']; //mon n° de licence
$_SESSION['sexe'] = $_POST['sexe']; //compétition masculine ou féminine
// Vérification du remplissage Points ou n° licence
if ((($pm == "") AND ($_SESSION['licence'] == "")) OR (($pm != "") AND ($_SESSION['licence'] != ""))) {
$color = 'red';
?>
<strong style='color: <?php echo $color; ?>;'>Il faut remplir soit vos points soit le numéro de licence. Vous allez être redirigé vers la page précédente</strong> 
<?php
header("Refresh: 5; URL=index.php" );
}
else {
echo "les deux premiers champs sont remplis correctement";
}
// Vérification du champ points_moi
if(!is_numeric($pm) AND !is_numeric($_SESSION['licence'])) 
{
		$color = 'red';
		?>
		<strong style='color: <?php echo $color; ?>;'>Le nombre que vous avez entré dans un champ n'est pas un chiffre. Vous allez être redirigé vers la page précédente</strong> 
		<?php
		header("Refresh: 5; URL=index.php" );
}
else {
	if ($pm != "") { // on regarde si le nombre de points est rempli
	//Récupération des autres variables
	$_SESSION['points_moi'] = $pm;
	$nbm = $_POST['nbm'];
	$_SESSION['nbm'] = $nbm;
	$coeff = $_POST['coefficient'];
	$_SESSION['coefficient'] = $coeff;
	} else {
	$nbm = $_POST['nbm'];
	$_SESSION['nbm'] = $nbm;
	$coeff = $_POST['coefficient'];
	$_SESSION['coefficient'] = $coeff;
	require ('script_ptmoi.php'); // exécute le script de récupération des points en fonction du n° de licence
	}
?>
<html>
<h3>         
<pre><p>
    <?php echo "Vous avez " , $_SESSION['points_moi'] , " points"; ?>
    <br>
    <?php echo "Les matchs joués sont coefficient = " , $_SESSION['coefficient']; ?>
</p></pre>
</h3>
<table id="resultats" class="tabcenter">
    <thead> <!-- En-tête du tableau -->
       <tr>
			  <th>Match n°</th>
           <th>Points adversaires ou n° de licence</th>
           <th>Gagné ou perdu</th>
       </tr>
   </thead>
   <tbody> <!-- Corps du tableau -->
</html>
<?php
//Génération du formulaire des points de l'adversaire
$_SESSION['nombre_de_lignes'] = 1;
//On génère un champ input pour chaque match
?>
<form method="post" action="resultats.php">
<?php
while ($_SESSION['nombre_de_lignes'] <= $nbm)
{
   $nom="points_adv". $_SESSION['nombre_de_lignes'];
   $licence="licence". $_SESSION['nombre_de_lignes'];
   $choix="choix".$_SESSION['nombre_de_lignes'];
   $_SESSION['nom'] = $nom;
   $_SESSION['choix'] = $choix;
   $_SESSION['licence'] = $licence;
?>
<td><?php echo $_SESSION['nombre_de_lignes'] ;?></td>
<td><input type="text" size="4" name="<?php echo $_SESSION['nom'] ; ?>"> OU <input type="text" size="4" name="<?php echo $_SESSION['licence'] ; ?>"></td>
<td><p><input type="radio" name="<?php echo $_SESSION['choix'] ; ?>" value="gagné" checked="checked" />Match gagné</p><input type="radio" name="<?php echo $_SESSION['choix'] ; ?>" value="perdu" />Match perdu</p></td>
<tr>
</tr>
<?php 
$_SESSION['nombre_de_lignes']++;
}
?>
</tbody>
</table>
<div align="center">
<input type="submit" value="Validez ces informations">
</div>
<?php
}
?>
<?php require 'footer.php'; ?>