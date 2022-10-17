# Boucles en PHP - Correction des exercices

## I) Boucles while et for

### Exercice 1:

> Créer un script qui demande un nombre entier n à l'utilisateur et affiche la table de multiplication de n.

```php
<?php
$nombre = readline('Donne un nombre:');
$i = 0;
while ($i <= 10){
  echo "$nombre x $i = " . $nombre * $i . PHP_EOL;
  $i++;
}
```

### Exercice 2:

> Que représente la valeur affichée à la fin du script ci-dessous?

>```php
><?php
>$i = 0;
>$n = 0;
>while ($i < 100){
>  $i = $i + 2;
>  $n = $n + $i;
>}
>echo $n;
>```

C'est la somme des entiers pairs inférieurs ou égaux 100: n = 0 + 2 + 4 + ... + 96 + 98 + 100

### Exercice 3:

> Que va afficher le script ci-contre?

>```php
><?php
>for ($i=0; $i < 10; $i++){
>  echo $i  + 3;
>}
>```

Le script va afficher `3456789101112`.

### Remarque:

L'ordre des exercices 4 et 5 a été inversé.

### Exercice TP 5:

> Créer un script affichant les 100 premiers nombres impairs à l'aide d'une boucle for.

```php
<?php

for ($i=1; $i < 200;$i = $i + 2){
    echo $i . PHP_EOL;
}
```

### Exercice TP 4:

> Créer un script qui produit l'affichage ci-dessous.
>```
>1
>22
>333
>4444
>55555
>```

```php
<?php
// On fait 5 lignes, pour $i allant de 1 à 5.
for ($i = 1; $i < 6; $i++){
  // Pour chaque ligne, on affiche $i fois le caractère $i.
    for ($n=0; $n < $i; $n++ ){
        echo $i;
    }
    // Fin de ligne.
    echo PHP_EOL;
}
```

### Exercice TP 6:

> Créer un script qui tire 1000 nombres entiers entre 1 et 100 au hasard à l'aide de la fonction rand(). Si un, par hasard, on obtient le nombre 42, le script doit s’arrêter et afficher alors le nombre d'entiers ayant été tirés au sort.

Avec un `for`:

```php
<?php
// On répète 1000 fois le tirage au sort.
for ($i = 0; $i < 1000; $i++){
  // On tire un nombre au hasard entre 1 et 100.
  $nombre = rand(1, 100);
  // Si le nombre est 42, on affiche le nombre de tirages.
  if ($nombre == 42){
    echo 'Le nombre 42 \o/' . PHP_EOL;
    echo "obtenu en $i tirages" . PHP_EOL;
    // On sort de la boucle.
    break;
    }
}
```

Avec un `while`:

```php
<?php
/* On initialise les variables:
* $i: Compteur de tirage. De 0 à 1000.
* $nombre: Entier tiré au hasard entre 1 et 100.
*/
$i = 0;
$nombre = 0;
// On continu les tirages tant que $i est inférieur à 1000
// et que $nombre est différent de 42.
while ($i < 1000 & $nombre != 42){
  // Tire un entier au hasard entre 1 et 100.
  $nombre = rand(1, 100);
  // Incrémente $i.
  $i++;
}

// Si $i est égal à 42, on affiche le message.
if ($nombre == 42){
  echo 'Le nombre 42 \o/' . PHP_EOL;
  echo "obtenu en $i tirages" . PHP_EOL;
}
```

**Remarque:** La version avec `while` est probablement préférée car la sortie de boucle est explicite: `while ($i < 1000 & $nombre != 42)`. Dans la version avec `for`, on peut manquer, en première lecture, que la boucle risque de s’arrêter avant les 1000 itérations.

## II) Boucles foreach

### Exercice TP 7:

>1. Remplir un tableau de 100 nombres entier entre 0 et 200 au hasard à l'aide de la fonction rand().
>2. A l'aide d'une boucle, déterminer le maximum, la moyenne et le minimum de ce tableau.
>3. Préciser dans l'affichage un indice du tableau contenant le minimum et le maximum.
>4. Préciser dans l'affichage tous les indices du tableau contenant le minimum et le maximum.

#### 1. Remplir un tableau de 100 nombres entier entre 0 et 200 au hasard à l'aide de la fonction rand().

PHP

```php
<?php
// On créé un tableau vide.
$tableau = [];

for ($i = 0; $i < 100; $i++){
  // On ajoute un entier au hasard entre 0 et 200 dans le tableau.
  $tableau[] = rand(0, 200);
}
print_r($tableau);
```

Affichage

```
Array
(
    [0] => 186
    [1] => 141
    [2] => 131
    [3] => 193
    [4] => 64
    ...
    ...
    [98] => 21
    [99] => 42
)
```

#### 2\. A l'aide d'une boucle, déterminer le maximum, la moyenne et le minimum de ce tableau.

```php
<?php
// On crée un tableau vide.
$tableau = [];

for ($i = 0; $i < 100; $i++){
  // On ajoute un entier au hasard entre 0 et 200 dans le tableau.
  $tableau[] = rand(0, 200);
}

// On initialise le maximum et le minimum avec la première valeur du tableau.
$tab_min = $tableau[0];
$tab_max = $tableau[0];

// On initialise la somme à 0.
$somme = 0;

// On parcourt le tableau.
foreach($tableau as $val){
  // On ajoute la valeur à la somme.
  $somme = $somme + $val;
  if ($val < $tab_min){
    // Si la valeur est plus petite que la minimum,
    // elle devient le minimum.
    $tab_min = $val;
  }
  elseif ($val > $tab_max){
    // Si la valeur est plus grande que le maximum,
    // elle devient le maximum.
    $tab_max = $val;
  }
}
// $somme est la somme des éléments du tableau.
// Il faut la diviser par 100 pour avoir la moyenne.
$moyenne = $somme / 100;

echo "Le minimum est $tab_min." . PHP_EOL;
echo "Le maximum est $tab_max." . PHP_EOL;
echo "la moyenne est $moyenne." . PHP_EOL;

```

#### 3. Préciser dans l'affichage un indice du tableau contenant le minimum et le maximum.

```php
<?php
// On créé un tableau vide.
$tableau = [];

for ($i = 0; $i < 100; $i++){
  // On ajoute un entier au hasard entre 0 et 200 dans le tableau.
  $tableau[] = rand(0, 200);
}

// On initialise le maximum et le minimum avec la première valeur du tableau.
$tab_min = $tableau[0];
$tab_max = $tableau[0];

// On initialise la somme à 0.
$somme = 0;

// On initialise les clefs correspondants aux min et max à 0.
$clef_min = 0;
$clef_max = 0;

// On parcourt le tableau.
foreach($tableau as $clef => $val){
  // On ajoute la valeur à la somme.
  $somme = $somme + $val;
  if ($val < $tab_min){
    // Si la valeur est plus petite que la minimum,
    // elle devient le minimum.
    $tab_min = $val;
    // $clef_min devient la $clef.
    $clef_min = $clef;
  }
  elseif ($val > $tab_max){
    // Si la valeur est plus grande que le maximum,
    // elle devient le maximum.
    $tab_max = $val;
    // $clef_max devient la $clef.
    $clef_max = $clef;
  }
}
// $somme est la somme des éléments du tableau.
// Il faut la diviser par 100 pour avoir la moyenne.
$moyenne = $somme / 100;

echo "Le minimum est $tab_min obtenu à l'indice $clef_min." . PHP_EOL;
echo "Le maximum est $tab_max obtenu à l'indice $clef_max." . PHP_EOL;
echo "la moyenne est $moyenne." . PHP_EOL;
```

**Remarque:** La fonction `array_search()` permet de récupérer la première clef ayant une valeur donnée dans un tableau. Avec la fin du code de la question précédente, on aurait donc pu faire:

```
$clef_min = array_search($tab_min, $tableau);
$clef_max = array_search($tab_max, $tableau);
```

#### 4. Préciser dans l'affichage tous les indices du tableau contenant le minimum et le maximum.

```php
<?php
// On créé un tableau vide.
$tableau = [];

for ($i = 0; $i < 100; $i++){
  // On ajoute un entier au hasard entre 0 et 200 dans le tableau.
  $tableau[] = rand(0, 200);
}

// On initialise le maximum et le minimum avec la première valeur du tableau.
$tab_min = $tableau[0];
$tab_max = $tableau[0];

// On initialise la somme à 0.
$somme = 0;

// On parcourt le tableau.
foreach($tableau as $clef => $val){
  // On ajoute la valeur à la somme.
  $somme = $somme + $val;
  if ($val < $tab_min){
    // Si la valeur est plus petite que la minimum,
    // elle devient le minimum.
    $tab_min = $val;
  }
  elseif ($val > $tab_max){
    // Si la valeur est plus grande que le maximum,
    // elle devient le maximum.
    $tab_max = $val;
  }
}
// $somme est la somme des éléments du tableau.
// Il faut la diviser par 100 pour avoir la moyenne.
$moyenne = $somme / 100;

echo "Le minimum est $tab_min." . PHP_EOL;
echo "Le maximum est $tab_max." . PHP_EOL;
echo "la moyenne est $moyenne." . PHP_EOL;

// On va stoquer les indices contenant les minimums et maximums
// dans des tableaux.
$clefs_min = [];
$clefs_max = [];

foreach($tableau as $clef => $val){
  // On parcourt le tableau à la recherche des mins et maxs.
    if ($val == $tab_min){
      // On ajoute $clef à $clefs_min.
      $clefs_min[] = $clef;
    }
    if ($val == $tab_max){
      // On ajoute $clef à $clefs_max.
      $clefs_max[] = $clef;
    }
}

// Affichage des indices
echo "Indices contenant le minimum: ";
foreach ($clefs_min as $clef){
  echo "$clef ";
}
echo PHP_EOL;

echo "Indices contenant le maximum: ";
foreach ($clefs_max as $clef){
  echo "$clef ";
}
echo PHP_EOL;

```

**Remarque:** La fonction `array_keys()` retourne toutes les clefs d'un tableau ayant une valeur donnée. On aurait donc pu, à partir du code de la question **2**\:

```
$clefs_mins = array_keys($tableau, $tab_min);
$clefs_max = array_keys($tableau, $tab_max);
```

### Exercice TP 8:

>1. Ouvrir le fichier ex8.php
>2. Pour chaque année, afficher: `2018: France a gagné contre Croatie`
>3. Afficher le(s) pays ayant gagné le plus de coupes du monde.
>4. Afficher le(s) pays ayant été le plus en finale.
>
>```php
><?php
>$champions = array(
>2018 => array('France',  'Croatie'),
>2014 => array('Allemagne', 'Argentine'),
>2010 => array('Espagne', 'Pays-Bas'),
>2006 => array('Italie', 'France'),
>2002 => array('Brésil', 'Allemagne'),
>1998 => array('France', 'Brésil'),
>1994 => array('Brésil', 'Italie'),
>1990 => array('Allemagne', 'Argentine'),
>1986 => array('Argentine', 'RFA'),
>1982 => array('Italie', 'RFA'),
>1978 => array('Argentine', 'Pays-Bas'),
>1974 => array('RFA', 'Pays-Bas'),
>1970 => array('Brésil', 'Italie'),
>1966 => array('Angleterre', 'RFA'),
>1962 => array('Brésil', 'Tchécoslovaquie'),
>1958 => array('Brésil', 'Suède'),
>1954 => array('RFA', 'Hongrie'),
>1950 => array('Uruguay', 'Brésil'),
>1938 => array('Italie', 'Hongrie'),
>1934 => array('Italie', 'Tchécoslovaquie'),
>1930 => array('Uruguay', 'Argentine'),
>);
>```

**Remarque:** Par soucis de lisibilité, on n'inclura la déclaration du tableau `$champions` dans les corrections ci-dessous. Elle est bien entendue nécessaire au fonctionnement des scripts.

#### 2. Pour chaque année, afficher: `2018: France a gagné contre Croatie`

```php
<?php
// Inclure la déclaration du tableau champions.
foreach ($champions as $annee => $finale){
    // $finale est un tableau: ['champion',  'finaliste']
    echo "$annee : $finale[0] a gagné contre $finale[1]" . PHP_EOL;
}
```

#### 3\. Afficher le(s) pays ayant gagné le plus de coupes du monde.

```php
<?php
// Inclure la déclaration du tableau champions.

/* On crée un tableau $victoires qui contient:
* 'Pays1' => nombre de victoires,
* 'Pays2' => nombre de victoires,
* ...
* Au départ, le tableau est vide.
* On va parcourir le tableau $champions et, pour chaque année:
* - Si le champion n'est pas encore dans le tableau $victoires,
*   on l'ajoute avec la valeur 1 (première victoire).
* - Si le champion est déja dans le tableau $victoires,
*   on incrémente sa valeur (une victoire supplémentaire).
*/

$victoires = [];

foreach ($champions as $finale){
    // $final est un tableau: array('champion', 'finaliste')
    $champion = $finale[0];
    // Est-ce-que 'champion' est déja présent dans $victoires?
    if (array_key_exists($champion, $victoires)){
        // Oui: On incrémente le nombre de victoires
        $victoires[$champion]++;
    }
    else {
        // Non: On l'ajoute avec un nombre de victoire: 1
        $victoires[$champion] = 1;
    }
}
print_r($victoires);

// On utilise la fonction max de PHP qui va renvoyer la plus grande valeur.
$max_victoires = max($victoires);
echo 'Le(s) pays ayant gagné le plus de coupe du monde sont: ';
foreach ($victoires as $pays => $n_victoires) {
  // Si le nombre de victoire du $pays est égal au max, on l'affiche.
  if ($n_victoires == $max_victoires){
    echo "$pays ";
  }
}
```

#### 4\. Afficher le(s) pays ayant été le plus en finale.

Cette question est si proche de la précédente que la correction est laissée au lecteur.

### Exercice TP 9:

> 1. A l'aide de la fonction `scandir()`, afficher le contenu du dossier fourni.
>2. Renommer chaque fichier afin d'enlever les caractères spéciaux et de remplacer les espaces par des `_`. On pourra utiliser les fonctions `rename()` et `str_replace()`.
>
>```
>Contenu du dossier:
>📂exercice_9
> ┣ 📂0 Un dossier avec un.point
> ┣ 📜les  $ aussi.txt
> ┗ 📜les espaces c'est mal.txt
>```

#### 1\. A l'aide de la fonction `scandir()`, afficher le contenu du dossier fourni.

PHP

```php
<?php
// Il faut placer le dossier "exercice_9" dans le même répertoire que le fichier PHP.
// Sinon, il faut adapter les chemins.s
$chemin = 'exercice_9';
print_r(scandir($chemin));
```

Affichage

```
Array
(
    [0] => .
    [1] => ..
    [2] => 0 Un dossier avec un.point
    [3] => les  $ aussi.txt
    [4] => les espaces c'est mal.txt
)
```

#### 2. Renommer chaque fichier afin d'enlever les caractères spéciaux et de remplacer les espaces par des `_`. On pourra utiliser les fonctions `rename()` et `str_replace()`.

```php
<?php
// Il faut placer le dossier "exercice_9" dans le même répertoire que le fichier PHP.
// Sinon, il faut adapter les chemins.
$chemin = 'exercice_9';
$dossier = scandir($chemin);

foreach ($dossier as $nom) {
  // $nom est le nom du dossier ou du fichier

  // On commence par exclure les éléments '.' et '..'.
  if ($nom == '.' or $nom == '..'){
    // continue va remonter au début de la boucle et
    // commencer sa prochaine itération.
    continue;
  }

  // On remplace les espaces par des _
  $nouveau_nom = str_replace(' ', '_', $nom);

  // On enlève les $
  $nouveau_nom = str_replace('$', '', $nouveau_nom);

  // On enlève les '
  $nouveau_nom = str_replace('\'', '', $nouveau_nom);

  // Si c'est un dossier, on enlève les points
  // Attention, le fichier ou dossier $nom est dans $chemin!
  if (is_dir("$chemin/$nom")){
    $nouveau_nom = str_replace('.', '_', $nouveau_nom);
  }

  // On affiche la modification
  echo "$nom -> $nouveau_nom" . PHP_EOL;

  // Renomme le fichier ou dossier.
  // Attention, le fichier ou dossier $nom est dans $chemin!
  rename("$chemin/$nom", "$chemin/$nouveau_nom");
}
```
