<?php
session_start();
header( 'content-type: text/html; charset=utf-8' );
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Affichage résultats</title>
    </head>
<body>
<h2><p>Table Tennis points calculator </p></h2>
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
			  <th>Match</th>
           <th>Points adversaires</th>
           <th>Différence de points</th>
           <th>Victoire/Défaite</th>
           <th>Points gagnés</th>
       </tr>
   </thead>
   <tbody> <!-- Corps du tableau -->
</html>
<?php
// on récupère les variables : points des adv et si match gagné ou perdu
$nombre_de_lignes = 1;
$pt = array();
while ($nombre_de_lignes <= $_SESSION['nbm'])
{
$pa['$nombre_de_lignes'] = $_POST['points_adv'.$nombre_de_lignes];
$result['$nombre_de_lignes'] = $_POST['choix'.$nombre_de_lignes];
// Tableau de comptage
$points = array();
$va = "Victoire anormale";
$vn = "Victoire normale";
$da = "Défaite anormale";
$dn = "Défaite normale";
//Victoire normale
$points['0-24']['$vn']=6;
$points['25-49']['$vn']=5.5;
$points['50-99']['$vn']=5;
$points['100-149']['$vn']=4;
$points['150-199']['$vn']=3;
$points['200-299']['$vn']=2;
$points['300-399']['$vn']=1;
$points['400-499']['$vn']=0.5;
$points['500+']['$vn']=0;
//Défaite normale
$points['0-24']['$dn']=-5;
$points['25-49']['$dn']=-4.5;
$points['50-99']['$dn']=-4;
$points['100-149']['$dn']=-3;
$points['150-199']['$dn']=-2;
$points['200-299']['$dn']=-1;
$points['300-399']['$dn']=-0.5;
$points['400-499']['$dn']=0;
$points['500+']['$dn']=0;
//Victoire anormale
$points['0-24']['$va']=6;
$points['25-49']['$va']=7;
$points['50-99']['$va']=8;
$points['100-149']['$va']=10;
$points['150-199']['$va']=13;
$points['200-299']['$va']=17;
$points['300-399']['$va']=22;
$points['400-499']['$va']=28;
$points['500+']['$va']=40;
//Défaite anormale
$points['0-24']['$da']=-5;
$points['25-49']['$da']=-6;
$points['50-99']['$da']=-7;
$points['100-149']['$da']=-8;
$points['150-199']['$da']=-10;
$points['200-299']['$da']=-12.5;
$points['300-399']['$da']=-16;
$points['400-499']['$da']=-20;
$points['500+']['$da']=-29;
// Affiche gagné ou perdu
?>

<td><?php echo $nombre_de_lignes ; ?></td>
<td><?php echo $pa['$nombre_de_lignes'] ; ?></td>

<?php
// Calcul la différence de points et l'affiche
$diff=$_SESSION['points_moi'] - $pa['$nombre_de_lignes'];
$abs=abs($diff);
?>

<td><?php echo $abs ; ?></td>

<?php
// match gagné par moi
if (($diff < 0) and ($result['$nombre_de_lignes'] == "gagné")) {

	if ($abs < 24) {
		$tot = $points['0-24']['$va'] * $_SESSION['coefficient'];
	} elseif  ($abs < 49) {
		$tot = $points['50-99']['$va'] * $_SESSION['coefficient'];
	} elseif  ($abs < 99) {
		$tot = $points['50-99']['$va'] * $_SESSION['coefficient'];
	} elseif  ($abs < 149) {
		$tot = $points['100-149']['$va'] * $_SESSION['coefficient'];
	} elseif  ($abs < 199) {
		$tot = $points['150-199']['$va'] * $_SESSION['coefficient'];
	} elseif  ($abs < 299) {
		$tot = $points['200-299']['$va'] * $_SESSION['coefficient'];
	} elseif  ($abs < 399) {
		$tot = $points['300-399']['$va']  * $_SESSION['coefficient'];
	} elseif  ($abs < 499) {
		$tot = $points['400-499']['$va'] * $_SESSION['coefficient'];
	} elseif  ($abs >= 500) {
		$tot = $points['500+']['$va'] * $_SESSION['coefficient'];
	} else { 
		echo "ERREUR";
	}
?>

<td><?php echo $va ; ?></td>
<td><?php echo $tot ; ?></td>

<?php
}
if (($diff > 0) and ($result['$nombre_de_lignes'] == "gagné")) {

		if ($abs < 24) {
		$tot = $points['0-24']['$vn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 49) {
			$tot = $points['50-99']['$vn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 99) {
			$tot = $points['50-99']['$vn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 149) {
			$tot = $points['100-149']['$vn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 199) {
			$tot = $points['150-199']['$vn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 299) {
			$tot = $points['200-299']['$vn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 399) {
			$tot = $points['300-399']['$vn']  * $_SESSION['coefficient'];
		} elseif  ($abs < 499) {
			$tot = $points['400-499']['$vn'] * $_SESSION['coefficient'];
		} elseif  ($abs >= 500) {
			$tot = $points['500+']['$vn'] * $_SESSION['coefficient'];
		} else { 
			echo "ERREUR";
		}
?>

<td><?php echo $vn ; ?></td>
<td><?php echo $tot ; ?></td>

<?php
}
// match perdu par moi
if (($diff > 0) and ($result['$nombre_de_lignes'] == "perdu")) {

	if ($abs < 24) {
		$tot = $points['0-24']['$da'] * $_SESSION['coefficient'];
		} elseif  ($abs < 49) {
			$tot = $points['50-99']['$da'] * $_SESSION['coefficient'];
		} elseif  ($abs < 99) {
			$tot = $points['50-99']['$da'] * $_SESSION['coefficient'];
		} elseif  ($abs < 149) {
			$tot = $points['100-149']['$da'] * $_SESSION['coefficient'];
		} elseif  ($abs < 199) {
			$tot = $points['150-199']['$da'] * $_SESSION['coefficient'];
		} elseif  ($abs < 299) {
			$tot = $points['200-299']['$da'] * $_SESSION['coefficient'];
		} elseif  ($abs < 399) {
			$tot = $points['300-399']['$da']  * $_SESSION['coefficient'];
		} elseif  ($abs < 499) {
			$tot = $points['400-499']['$da'] * $_SESSION['coefficient'];
		} elseif  ($abs >= 500) {
			$tot = $points['500+']['$da'] * $_SESSION['coefficient'];
		} else { 
			echo "ERREUR";
		}
?>

<td><?php echo $da ; ?></td>
<td><?php echo $tot ; ?></td>

<?php
}
if (($diff < 0) and ($result['$nombre_de_lignes'] == "perdu")) {

	if ($abs < 24) {
		$tot = $points['0-24']['$dn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 49) {
			$tot = $points['50-99']['$dn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 99) {
			$tot = $points['50-99']['$dn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 149) {
			$tot = $points['100-149']['$dn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 199) {
			$tot = $points['150-199']['$dn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 299) {
			$tot = $points['200-299']['$dn'] * $_SESSION['coefficient'];
		} elseif  ($abs < 399) {
			$tot = $points['300-399']['$dn']  * $_SESSION['coefficient'];
		} elseif  ($abs < 499) {
			$tot = $points['400-499']['$dn'] * $_SESSION['coefficient'];
		} elseif  ($abs >= 500) {
			$tot = $points['500+']['$dn'] * $_SESSION['coefficient'];
		} else { 
			echo "ERREUR";
		}
?>

<td><?php echo $dn ; ?></td>
<td><?php echo $tot ; ?></td>

<?php
}
?>
<tr>
</tr>
<?php
// on stock dans le tableau $pt les points gagnés/perdu
array_push($pt ,$tot);
$nombre_de_lignes++;
echo '<br>';
}
?>
</tbody>
</table>
<?php
if (array_sum($pt) < 0) {
	$sum = " points perdus";
	$signe = "-";
	} else {
	$sum = " points gagnés";
	$signe = "+";
}
?>
<h3>
<pre><p><?php echo "La somme est de : " . abs(array_sum($pt)) , $sum ; ?></p></pre>
</h3>
<h2>
<pre><p><?php echo "Vous avez maintenant : " , $_SESSION['points_moi'] , $signe , abs(array_sum($pt)) , " = " , $_SESSION['points_moi']+array_sum($pt) , " points"; ?></p></pre>
</h2>
<?php require 'footer.php'; ?>
