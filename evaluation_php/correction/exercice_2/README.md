
# Correction de l'exercice 2

## 1.
> Le fichier fonctions.php contient la fonction `moyenne()` qui calcule la moyenne d'un tableau. Documenter cette fonction.
```php
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

```
## 2.
### a. 
> Ajouter un titre de niveau 2 (`<h2>`) indiquant la moyenne des températures sur l'année 2021

Il faut commencer par calculer la moyenne. On va utiliser la fonction `moyenne` présente dans le fichier `fonctions.php`.
Dans le fichie `index.php` on commence par inclure le fichier `fonctions.php` avant de calculer la moyenne:

```php
<?php
include('data.php');
include('fonctions.php');
// On calcule la moyenne.
$temperature_moyenne = moyenne($temperatures);

include('vues/header.php');
include('vues/footer.php');
```

Dans le fichier `vues/header.php` on va rajouter un titre de niveau 2:
```php
               <div class="content">
                    <h1>Températures à RENNES</h1>
                    <h2>En 2021, la température annuelle était de <?= $temperature_moyenne ?> °C</h2>
```

### b.
> Utiliser la fonction PHP number-format() afin de ne garder qu'une décimale à la moyenne.

Dans le fichier `index.php` on remplace la ligne de calcul de moyenne par:
`$temperature_moyenne = number_format(moyenne($temperatures), 1);`

## 3.
### a.
> Afficher un tableau HTML contenant les températures par mois. On pourra utiliser la vue `tableau.php`.

Le fichier `vues/tableau.php` contient le code d'un tableau html dont il manque le `<body>`.

Une ligne de tableau html est:
```html
<tr>
    <td><-- Mois --></td>
    <td><-- Temperature --></td>
</tr>
```
On va donc faire un boucle php parcourant le tableau `$temperatures`:

```php
    <tbody>
        <?php foreach($temperatures as $index, $temp){
            echo "<tr>
                    <td>$mois[$index]</td>
                    <td>$temp</td>
                  </tr>";
        } ?>
    </tbody>
```
Il faut ensuite inclure le fichier `vues/tableau.php` dans le fichier `index.php` qui devient:
```php
<?php
include('data.php');
include('fonctions.php');
// On calcule la moyenne.
$temperature_moyenne = number_format(moyenne($temperatures), 1);

include('vues/header.php');
include('vues/tableau.php');
include('vues/footer.php');
```

### b.
> Si la température du mois est supérieure à 11.3 °C afficher le texte de la ligne en rouge

On remarque que le framework CSS bulma est chargé dans `vues/header.php`. D'après la [documentation](https://bulma.io/documentation/helpers/color-helpers/#text-color), il suffit donc d'ajouter la classe `has-text-danger` aux lignes dont la températures est supérieure à `11,3`.

```php
    <tbody>
        <?php foreach($temperatures as $index => $temp){
            if ($temp > 11.3){
                echo '<tr class="has-text-danger">';
            }
            else{
                echo '<tr>';
            }
            echo "  <td>$mois[$index]</td>
                    <td>$temp</td>
                  </tr>";
        } ?>
    </tbody>
```

## 4.
> Dans le fichier fonctions.php, écrire une fonction minutes() qui accepte en entré une chaîne de caractère représentant une durée au format 2h32min et renvoie un entier représentant le nombre de minutes. Par exemple `minutes(2h32)` doit renvoyer `152`. On pourra utiliser la fonction PHP `explode()`.

```php
<?php
/**
 * Renvoie les minutes d'une durée formatée en 13h05
 * 
 * @param str $duree La durée formatée en 13h05
 * @return int Le nombre de minute de cette durée
 */
function minutes(str $duree): int
{
    // La fonction explode va renvoyer un tableau [heures, minutes]
    $heure_min = explode('h', $duree);
    // $heure_min[0] est le nombre d'heures.
    // $heure_min[1] est le nombre de minutes.
    $minutes = $heure_min[0] * 60 + $heure_min[1];
    return $minutes
}
```

## 5.
> Inclure le fichier vues/form.php avant le tableau. Dans le fichier index.php, en cas de présence du paramètre GET mois, afficher la durée d'ensoleillement du mois choisi en minutes.

Le fichier `vues/form.php` contient le PHP suivant:
```php
<form action="index.php" method="GET">

<label for="mois">Durée d'ensolleillement du mois de </label>

<select name="mois">
<?php foreach($mois as $m){
    echo "<option value=\"$m\">$m</option>";
} ?>
    
</select>
<button type="submit">Envoyer</button>
</form>
```

Il produit le HTML suivant:
```html
<form action="index.php" method="GET">

<label for="mois">Durée d'ensolleillement du mois de </label>

<select name="mois">
<option value="janvier">janvier</option>
<option value="fevrier">fevrier</option>
<option value="mars">mars</option>
<option value="avril">avril</option>
<option value="mai">mai</option>
<option value="juin">juin</option>
<option value="juillet">juillet</option>
<option value="aout">aout</option>
<option value="septembre">septembre</option>
<option value="octobre">octobre</option>
<option value="novembre">novembre</option>
<option value="decembre">decembre</option>
    
</select>
<button type="submit">Envoyer</button>
</form>
```

Nous sommes face à un formulaire HTML avec un champ de type select. On note que l'attribut `name` de ce champ est `mois`.

On va donc tester si le paramètre GET `mois` est présent dans le fichier `index.php`: `if (isset($_GET['mois']))`.

Dans l'affirmative, on va récupérer la durée d'ensoleillement présente dans le tableau `$data` du fichier `data.php`. Dans ce tableau, les clés sont les noms des mois. On pourra donc acceder directement aux données avec `$data[$_GET['mois']]`:
```php
if (isset($_GET['mois'])){
    $donnees_mois = $data[$_GET['mois']];    
}
```

Pour chaque mois, la valeur du tableau `data` est un tableau:
```
    array (
     'Temp. min' => Température minimum en °C
     'Temp. moy' => Température moyenne en °C
     'Temp. max' => Température maximum en °C
     'Pression moy' => Pression moyenne en hPa
     'Pluie' => Précipitation en mm
     'Ensoleillement' => Durée d'ensoleillement en h et min
    ),
```
On va donc chercher la valeur `$donnees_mois['Ensoleillement']`:

```php
if (isset($_GET['mois'])){
    $donnees_mois = $data[$_GET['mois']];
    $ensoleillement = $donnes_mois['Ensoleillement'];
    // $ensoleillement est sous la forme 67h48min.
}
```
Il faut ensuite convertir cette durée en minutes. On remarque que dans le tableau `$data`, les durée sont formatées comme `67h48min`. Il faut donc enlever `min` de cette chaîne de caractère. Voici deux manières:
- utiliser la fonction `str_replace()` en replaçant la chaîne `'min'` par la chaîne vide `''`: `str_replace('min', '', $ensoleillement)`.
- utiliser la fonction `substr()` qui permet d'enlever les 3 derniers caractères: `substr($ensoleillement, 0, -3)`.

On pourra ensuite utiliser la fonction `minutes()` et afficher un paragraphe.
```php
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
```