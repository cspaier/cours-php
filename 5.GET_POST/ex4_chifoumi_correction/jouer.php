<?php
/**
* Pierre - Feuille - Ciseaux
* Dans tout le script, on va coder les choix des joueurs:
* 0: Pierre
* 1: Feuille
* 2: Ciseaux
*/

// Les inclusions de bibliothèques de fonctions sont placées en début de fichier
include('fonctions.php');

// On récupère le choix de l'utilisateur
$choix_utilisateur = $_GET['choix'];
// La machine joue au hasard
$choix_machine = rand(0,2);
// On détermine le gagnant
$gagnant = gagnant($choix_utilisateur, $choix_machine);

// On génère le HTML
include('vues/reponse.php')
