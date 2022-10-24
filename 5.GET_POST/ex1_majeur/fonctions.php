<?php

/**
 * Renvoie un booléen qui est vrai si l'utilisateur est majeur
 * 
 * @param int $jour_naissance jour de naissance
 * @param int $mois_naissance moi de naissance
 * @param int $annee_naissance annee de naissance
 * @return bool vrai si l'utilisateur est majeur
 * 
 */
function est_majeur(int $jour_naissance, int $mois_naissance, int $annee_naissance): bool
{
    // On récupère les jour, mois et année d'aujourd'hui
    // Exemples d'utilisation de date: https://www.php.net/manual/en/function.date.php#refsect1-function.date-examples
    // Format des dates PHP https://www.php.net/manual/fr/datetime.format.php#refsect1-datetime.format-parameters
    $annee = date('Y');
    $mois = date('m');
    $jour = date('d');

    /* Si nous sommes, par exemple en 2022, on distingue 3 cas:
    1. L'utilisateur est né avant 2004: Il est majeur.
    2. L'utilisateur est né en 2004: Il faut regarder le mois.
    3. L'utilisateur est né après 2004: Il est mineur
    */

    if ($annee - $annee_naissance > 18){
    // 1. L'utilisateur est né avant 2004: Il est majeur.
    return true;

    }
    elseif ($annee - $annee_naissance == 18){
    /* 2. L'utilisateur est né en 2004: Il faut regarder le mois.
    2.1: S'il est né avant le mois en cours, il est majeur.
    2.2: S'il est né dans le mois en cours, il faut regarder les jours.
    2.3: S'il est né après le mois en cours, il est mineur.
    */
    if ($mois_naissance < $mois){
        // 2.1: Il est né avant le mois en cours, il est majeur.
        return true;
    }
    elseif ($mois_naissance == $mois){
        /* 2.2: Il est né dans le mois en cours, il faut regarder les jours.
        2.2.1: S'il est né avant le jour en cours, il est majeur.
        2.2.2: S'il est né le jour en cours, c'est son anniversaire et il est majeur.
        2.2.3: S'il est né après le jour en cours, il est mineur.
        */
        if ($jour_naissance < $jour){
        return true;
        }
        elseif ($jour_naissance == $jour) {
        return true;
        }
        else{
        return false;
        }
    }
    else {
        // 2.3: Il est né après le mois en cours, il est mineur.
        return false;
    }
    }
    else {
    // 3. L'utilisateur est né après 2004: Il est mineur
    return false;
    }

}