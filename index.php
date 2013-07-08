<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Page de renseignements</title>
    </head>
<h2><p>Table Tennis points calculator </p></h2>
</head>
<body>
<h3>

<form method="post" action="tableau.php">

Vos points actuels : <input type="number" name="points_moi" size="4" value="500"><br><br><br><br>

<select name="nbm">
<option value=""> ----- Nombre de matchs joués ----- </option>
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
<option value="1"> Championnat de France Vétérans (National, Régional, Départemental)</option>
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


