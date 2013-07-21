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
$pm = $_POST['points_moi'];
// Vérification du champ points_moi
if(!is_numeric($pm))
{
$color = 'red';
?>
<strong style='color: <?php echo $color; ?>;'>Le nombre de point que vous avez entré n'est pas un chiffre. Vous allez être redirigé vers la page précédente</strong> 
<?php
header("Refresh: 5; URL=index.php" );
}
else {
//Récupération des autres variables
$_SESSION['points_moi'] = $pm;
$nbm = $_POST['nbm'];
$_SESSION['nbm'] = $nbm;
$coeff = $_POST['coefficient'];
$_SESSION['coefficient'] = $coeff;
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
           <th>Points adversaires</th>
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
   $choix="choix".$_SESSION['nombre_de_lignes'];
   $_SESSION['nom'] = $nom;
   $_SESSION['choix'] = $choix;
?>
<td><?php echo $_SESSION['nombre_de_lignes'] ;?></td>
<td><input type="text" size="4" name="<?php echo $_SESSION['nom'] ; ?>"></td>
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