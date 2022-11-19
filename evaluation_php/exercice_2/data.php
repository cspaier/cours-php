<?php
/** Températures par mois pour la ville de RENNES en 2021 en °C
 * $temperatures[0] correspond à la température en janvier 2021
 * ...
 * $temperatures[11] correspond à la température en decembre 2021
*/

$temperatures = [6.0, 6.2, 6.2, 8.5, 13.8, 18.0, 17.1, 18.1, 16.6, 11.7, 10.3, 3.6];


/**
 * Mois de l'année
 */
$mois = ['janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];

/**Données météos pour la ville de RENNES en 2021
 * N'est pas utile avant la question 5.
 * 
 * 'Temp. min' => Température minimum en °C
 * 'Temp. moy' => Température moyenne en °C
 * 'Temp. max' => Température maximum en °C
 * 'Pression moy' => Pression moyenne en hPa
 * 'Pluie' => Précipitation en mm
 * 'Ensoleillement' => Durée d'ensoleillement en h et min
 */
$data = array (
  'janvier' => 
    array (
      'Temp. min' => '-6.5',
      'Temp. moy' => '6.0',
      'Temp. max' => '14.2',
      'Pression moy' => '1007.0',
      'Pluie' => '113.6',
      'Ensoleillement' => '67h48min',
    ),
    'fevrier' => 
    array (
      'Temp. min' => '-2.7',
      'Temp. moy' => '6.2',
      'Temp. max' => '12.9',
      'Pression moy' => '1013.9',
      'Pluie' => '84.5',
      'Ensoleillement' => '76h42min',
    ),
    'mars' => 
    array (
      'Temp. min' => '-4.2',
      'Temp. moy' => '6.2',
      'Temp. max' => '15.8',
      'Pression moy' => '1015.4',
      'Pluie' => '36.2',
      'Direction' => 'Variable',
      'Ensoleillement' => '124h36min',
    ),
    'avril' => 
    array (
      'Temp. min' => '-1.4',
      'Temp. moy' => '8.5',
      'Temp. max' => '21.5',
      'Pression moy' => '1017.6',
      'Pluie' => '37.9',
      'Ensoleillement' => '145h18min',
    ),
    'mai' => 
    array (
      'Temp. min' => '4.0',
      'Temp. moy' => '13.8',
      'Temp. max' => '24.3',
      'Pression moy' => '1017.2',
      'Pluie' => '15.0',
      'Ensoleillement' => '261h24min',
    ),
    'juin' => 
    array (
      'Temp. min' => '8.0',
      'Temp. moy' => '18.0',
      'Temp. max' => '27.1',
      'Pression moy' => '1017.2',
      'Pluie' => '37.4',
      'Ensoleillement' => '218h36min',
    ),
    'juillet' => 
    array (
      'Temp. min' => '7.2',
      'Temp. moy' => '17.1',
      'Temp. max' => '32.1',
      'Pression moy' => '1018.3',
      'Pluie' => '27.5',
      'Ensoleillement' => '226h42min',
    ),
    'aout' => 
    array (
      'Temp. min' => '7.8',
      'Temp. moy' => '18.1',
      'Temp. max' => '31.5',
      'Pression moy' => '1015.8',
      'Pluie' => '132.1',
      'Ensoleillement' => '186h30min',
    ),
    'septembre' => 
    array (
      'Temp. min' => '6.2',
      'Temp. moy' => '16.6',
      'Temp. max' => '26.6',
      'Pression moy' => '1018.2',
      'Pluie' => '54.0',
      'Ensoleillement' => '184h00min',
    ),
    'octobre' => 
    array (
      'Temp. min' => '0.9',
      'Temp. moy' => '11.7',
      'Temp. max' => '22.4',
      'Pression moy' => '1020.2',
      'Pluie' => '24.4',
      'Ensoleillement' => '140h06min',
    ),
    'novembre' => 
    array (
      'Temp. min' => '-1.9',
      'Temp. moy' => '10.3',
      'Temp. max' => '19.8',
      'Pression moy' => '1009.7',
      'Pluie' => '87.1',
      'Direction' => 'Variable',
      'Ensoleillement' => '90h30min',
    ),
    'decembre' => 
    array (
      'Temp. min' => '-7.8',
      'Temp. moy' => '3.6',
      'Temp. max' => '14.1',
      'Pression moy' => '1023.5',
      'Pluie' => '23.1',
      'Ensoleillement' => '84h06min',
    ),
  );