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
