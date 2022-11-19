<?php
/** Températures par mois pour la ville de RENNES en 2021 en °C
 * Exemples:
 * $temperatures[0] correspond à la température en janvier 2021
 * ...
 * $temperatures[11] correspond à la température en decembre 2021
*/

$temperatures = [6.0, 6.2, 6.2, 8.5, 13.8, 18.0, 17.1, 18.1, 16.6, 11.7, 10.3, 3.6];


/**
 * Mois de l'année
 */
$mois = ['janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];

// On demande à l'utilisateur un nombre entre 1 et 12

$nombre = readline('Donne un nombre entre 1 et 12:');

if (($nombre < 1) || ($nombre > 12)){
    echo 'Essaye encore.';
}
else {
    echo "En {$mois[$nombre -1 ]} 2021, la température moyenne à Rennes était de $temperatures[$nombre] °C." . PHP_EOL;
}

foreach($temperatures as $index => $temp){
    if ($index != $nombre -1){
        echo "En $mois[$index] 2021, la température moyenne à Rennes était de $temp °C." . PHP_EOL;
    }
}