<?php
//header('content-type:text/html; charset=utf-8');
$monfichier = fopen('compteur.txt', 'r+');
$pages_vues = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
$pages_vues++; // On augmente de 1 ce nombre de pages vues
fseek($monfichier, 0); // On remet le curseur au début du fichier
fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues
fclose($monfichier);
echo '<p>Il y a eu ' . $pages_vues . ' pages visitées !</p>';
?>
