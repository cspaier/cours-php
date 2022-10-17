# Fonctions PHP

## I) Fonctions, paramètres, renvoi

### Exercice 1:
>Écrire une fonction `volume_cube($c)` qui accepte un paramètre le côté d'un cube $c et renvoie son volume.

```php
<?php
function volume_cube($c)
{
    return $c * $c * $c;
}
```


### Exercice TP 2: Différence de brins d'ADN
>Des généticiens ont besoin de calculer les différences entre deux brins d'ADN
représentés par exemple ci-dessous.
> ```
> GAGCCTACTAACGGGAT
> CATCGTAATGACGGCCT
> ^ ^ ^  ^ ^    ^^
> ```
> 1. Écrire une fonction qui accepte deux chaînes de caractères en arguments et renvoie le nombre de brins différents.
> 2. Tirer 100 fois de suite deux brins d'ADN de longueurs 18 et évaluer le nombre moyen de différences

#### 1.
```php
<?php
/**
* Un brin d'ADN est une chaîne de caractère contenant
* les caractères A, C, G et T.
*/

/**
 * Renvoie le nombre de différences entre deux brins d'ADN.
 * Renvoie -1 si les brins n'ont pas la même longueur.
 *
 * @param string $brin_1 premier brin d'ADN.
 * @param string $brin_2 deuxième brin d'ADN.
 * @return int nombre de différences entre $brin_1 et $brin_2.
 */
function diff_brins(string $brin_1, string $brin_2): int
{

    $longueur_1 = strlen($brin_1);
    $longueur_2 = strlen($brin_2);

    // Si les longueurs des brins sont différents, on renvoie -1.
    if ($longueur_1 != $longueur_2) {
        return -1;
    }

    // Ici, $brin_1 et $brin_2 ont la même longueur
    // car sinon le return précédent serait sortit de la fonction.

    // $diff est le nombre de différences
    $diff = 0;
    // On parcourt les brins
    for ($i = 0 ; $i < $longueur_1; $i++){
        // Si les brins n'ont pas le même caractère à l'emplacement $i,
        // on incrément $diff.
        if ($brin_1[$i] != $brin_2[$i]){
            $diff++;
        }
    }
    return $diff;
}
```


#### 2.

On commence par faire un fonction qui crée des brins au hasard:
```php
<?php
/**
 * Renvoi un brin au hasard de longueur donnée
 *
 * @param int $longueur Longueur du brin.
 * @return string Un brin d'ADN de longueur $longueur
 */
function brin_hasard(int $longueur): string
{
    // Les caractères utilisés dans les brins d'ADN.
    $caracteres = ['A', 'C', 'G', 'T'];
    // On initialise le brin avec une chaîne de caractère vide.
    $brin = '';

    for ($i=0; $i < $longueur; $i++){
        // Choisi un caractère au hasard.
        $car = $caracteres[rand(0,3)];
        // Concatène le caractère au brin.
        $brin = $brin . $car;
    }
    return $brin;
}
```

Ensuite, On va 100 fois de suite:
1. Créer deux brins au hasard à l'aide de la fonction `brin_hasard()`.
2. Calculer leur différence à l'aide de `diff_brins()`.
3. Sommer ces différences.

Il restera à diviser la somme par 100 pour avoir la moyenne.

```php
<?php
// On initialise la somme à 0.
$somme = 0;

// On boucle 100 fois.
for ($i = 0; $i < 100; $i++){
    // On crée deux brins au hasard à l'aide de la fonction brin_hasard().
    $brin_1 = brin_hasard(18);
    $brin_2 = brin_hasard(18);
    // On calcule leur différence à l'aide de la fonction diff_brins().
    $diff = diff_brins($brin_1, $brin_2);
    // Un affichage optionnel:
    echo "$diff différences entre $brin_1 et $brin_2" . PHP_EOL;

    // Ajoute la différence à la somme.
    $somme += $diff;
}
// Calcul de la moyenne
$moyenne = $somme /100;
echo "Différence moyenne: $moyenne" . PHP_EOL;

```
### Exercice TP 3: pierre-feuille-ciseaux
> 1. Écrire une fonction qui accepte deux paramètres représentant les choix de deux joueurs et qui renvoie un entier représentant le gagnant: 0 pour l'égalité, 1 pour le joueur 1, 2 pour le joueur 2.
> 2. Faire un jeu ou l'utilisateur joue contre la machine.
> 3. Implémenter un compteur de score.
> 4. Le premier qui a 3 points a gagné!

#### 1.
```php
<?php
/**
* Pierre - Feuille - Ciseaux
* Dans tout le script, on va coder les choix des joueurs:
* 0: Pierre
* 1: Feuille
* 2: Ciseaux
*/

/**
* Fonction retournant le gagnant d'une manche.
* Le gagnant est codé comme suit:
* 0: égalité
* 1: Joueur_1 a gagné
* 2: Joueur_2 a gagné
*
* @param int $joueur_1 Choix du joueur 1
* @param int $joueur_2 Choix du joueur 2
* @return int Gagnant (voir ci-dessus)
*/

function gagnant (int $joueur_1, int $joueur_2): int
{
    if ($joueur_1 == 0){
        // Joueur 1 a joué Pierre
        switch($joueur_2){
            case 0: return 0; // Pierre - Pierre
            case 1: return 2; // Pierre - Feuille
            case 2: return 1; // Pierre - Ciseaux
        }
    }
    if ($joueur_1 == 1){
        // Joueur 1 a joué Feuille
        switch($joueur_2){
            case 0: return 1; // Feuille - Pierre
            case 1: return 0; // Feuille - Feuille
            case 2: return 2; // Feuille - Ciseaux
        }
    }
    if ($joueur_1 == 2){
        // Joueur 1 a joué Ciseaux
        switch($joueur_2){
            case 0: return 2; // Ciseaux - Pierre
            case 1: return 1; // Ciseaux - Feuille
            case 2: return 0; // Ciseaux - Ciseaux
        }
    }
}
```

#### 2.
On commence par écrire une fonction qui demande à l'utilisateur son choix:
```php
<?php
/**
 * Demande à l'utilisateur son choix: Pierre Feuille Ciseaux
 *
 * @return int Choix de l'utilisateur
 */
function choix_utilisateur():int
{
    echo '0: Pierre'. PHP_EOL;
    echo '1: Feuille'. PHP_EOL;
    echo '2: Ciseaux'. PHP_EOL;
    return readline('Que voulez-vous jouer:');
}
```
Ensuite, on écrit une fonction qui affiche les résultats
```php
<?php
/**
 * Affiche le résultat d'une manche
 * La machine est le joueur 1
 *
 * @param int $choix_machine choix de la machine
 * @param int $choix_utilisateur choix de l'utilisateur
 */
function affichage_resultat(int $choix_machine, int $choix_utilisateur){
    // Le tableau ci-dessous sera utilisé pour traduire 0 -> 'Pierre', 1 -> 'Feuille', 2 -> 'Ciseaux'
    $choix = ['Pierre', 'Feuille', 'Ciseaux'];

    echo 'Machine Vs Joueur' . PHP_EOL;
    echo "$choix[$choix_machine] Vs $choix[$choix_utilisateur]". PHP_EOL;

    // On détermine le gagnant à l'aide de la fonction gagnant()
    $gagnant = gagnant($choix_machine, $choix_utilisateur);
    switch($gagnant){
        case 0: echo 'Egalité' . PHP_EOL; break;
        case 1: echo 'Perdu' . PHP_EOL; break;
        case 2: echo 'Gagné' . PHP_EOL; break;

    }
}
```
Enfin, on peut jouer:
```php
$choix_utilisateur = choix_utilisateur();
$choix_machine = rand(0,2);
affichage_resultat($choix_machine, $choix_utilisateur);
```

#### 3.
```php
// On initialise les scores
$score_machine = 0;
$score_utilisateur = 0;
// On joue tant qu'un joueur n'a pas trois points
while ($score_utilisateur < 3 && $score_utilisateur <3){
    $choix_utilisateur = choix_utilisateur();
    $choix_machine = rand(0,2);

    // On détermine le gagnant
    $gagnant = gagnant($choix_machine, $choix_utilisateur);
    // On incrémente le score du gagnant
    switch($gagnant){
        case 1: $score_machine++; break;
        case 2: $score_utilisateur++; break;
    }

    affichage_resultat($choix_machine, $choix_utilisateur);

    // On affiche les scores
    echo "$score_machine - $score_utilisateur" . PHP_EOL;
}

// La partie est terminée
if ($score_machine == 3){
    echo 'Vous avez perdu!';
}
else {
    echo 'Bravo!'
}
```
