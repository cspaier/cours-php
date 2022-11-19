<?php
include('data.php');
include('fonctions.php');
// On calcule la moyenne.
$temperature_moyenne = number_format(moyenne($temperatures), 1);

include('vues/header.php');

if (isset($_GET['mois'])){
    $donnees_mois = $data[$_GET['mois']];
    $ensoleillement = $donnees_mois['Ensoleillement'];
    // $ensoleillement est sous la forme 67h48min. On enlève les caractères `min`.
    $ensoleillement = str_replace('min', '', $ensoleillement);
    // On utilise la fonction minutes pour convertir cette durée en minutes.
    $minutes = minutes($ensoleillement);
    // On affiche un paragraphe.
    echo "<p>La durée d'ensoleillement au mois de {$_GET['mois']} était de $minutes minutes.</p>";
}
include('vues/form.php');
include('vues/tableau.php');
include('vues/footer.php');
