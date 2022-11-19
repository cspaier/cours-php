<?php
/**
 * Renvoie la moyenne des valeurs d'un tableau
 * 
 * @param array $tableau Le tableau
 * @return float La moyenne des valeurs du tableau
 */
function moyenne(array $tableau): float
{
    return array_sum($tableau) / count($tableau);
}

/**
 * Renvoie les minutes d'une durée formatée en 13h05
 * 
 * @param str $duree La durée formatée en 13h05
 * @return int Le nombre de minute de cette durée
 */
function minutes(string $duree): int
{
    // La fonction explode va renvoyer un tableau [heures, minutes]
    $heure_min = explode('h', $duree);
    // $heure_min[0] est le nombre d'heures.
    // $heure_min[1] est le nombre de minutes.
    $minutes = $heure_min[0] * 60 + $heure_min[1];
    return $minutes;
}

