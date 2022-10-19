<?php
include('fonctions.php');

// Détermine si l'utilisateur est majeur à l'aide de la fonction est_majeur
$majeur = est_majeur($_GET['jour'], $_GET['mois'], $_GET['annee']);

include('vues/header.php');
include('vues/reponse.php');
include('vues/footer.php');