# Corrections PHP-HTML
## Exercice TP 1:
>Écrire une page web qui affiche la date et l'heure.
```php
<?php
$annee = date('Y');
$mois = date('m');
$jour = date('d');
$heure = date('H:i:s');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Date et heure</title>
  </head>
  <body>
    <p> Nous sommes le <?= $jour ?>/<?= $mois ?> de l'année <?= $annee?> et il est <?= $heure ?></p>
  </body>
</html>
```

## Exercice TP 2:
>Reprendre l'exercice TP 8 de la fiche *Introduction au langage PHP* et faire un page web qui indique la météo.



```php
<?php

$url = 'https://data.rennesmetropole.fr/api/records/1.0/search/?dataset=prevision-meteo-rennes-arome&rows=1';
// file_get_contents donne une chaîne de caractère
$reponse = file_get_contents($url);
// json_decode(string, true) la convertit en tableau
$tableau = json_decode($reponse, true);

// On utilisera les données de $tableau['records'][0]['fields']
$donnees = $tableau['records'][0]['fields'];

// forecast semble être la date/heure de la prévision.
// En anglais 'forecast' veut dire 'prévision'.
// [forecast] => 2022-10-07T13:00:00+00:00
// On utiliser date_create pour le convertir en date PHP
// https://www.php.net/manual/en/function.date-create.php

$prevision = date_create($donnees['forecast']);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Météo Rennes</title>
  </head>
  <body>
    <h1>Prévisions météorologiques de Rennes pour le <?= date_format($prevision, "d/m/Y à H:i:s") ?>
    <p>Précipitations (mm): <?= $donnees['total_precipitation'] ?></p>
    <p>Température (°C): <?= $donnees['2_metre_temperature'] ?></p>
    <p>Humidité (%): <?= $donnees['2_metre_relative_humidity'] ?></p>
  </body>
</html>

```

## Exercice TP 3:
>Reprendre l'exercice TP 8 de la fiche *Boucles PHP* et faire une page web qui affiche les résultats des coupes du monde dans un tableau HTML.

```php
<?php
$champions = array(
  2018 =>	array('France',  'Croatie'),
  2014 =>	array('Allemagne', 'Argentine'),
  2010 =>	array('Espagne', 'Pays-Bas'),
  2006 =>	array('Italie', 'France'),
  2002 =>	array('Brésil', 'Allemagne'),
  1998 => array('France', 'Brésil'),
  1994 => array('Brésil', 'Italie'),
  1990 => array('Allemagne', 'Argentine'),
  1986 => array('Argentine', 'RFA'),
  1982 => array('Italie', 'RFA'),
  1978 => array('Argentine', 'Pays-Bas'),
  1974 => array('RFA', 'Pays-Bas'),
  1970 => array('Brésil', 'Italie'),
  1966 => array('Angleterre', 'RFA'),
  1962 => array('Brésil', 'Tchécoslovaquie'),
  1958 => array('Brésil', 'Suède'),
  1954 => array('RFA', 'Hongrie'),
  1950 => array('Uruguay', 'Brésil'),
  1938 => array('Italie', 'Hongrie'),
  1934 => array('Italie', 'Tchécoslovaquie'),
  1930 => array('Uruguay', 'Argentine'),
);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Coupes du monde</title>
  </head>
  <body>
    <h1>Historique des coupes du monde</h1>
    <table>
      <thead>
        <tr>
          <th>Année</th>
          <th>Champion</th>
          <th>Finaliste</th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($champions as $annee => $finale){
          echo "
          <tr>
            <td>$annee</td>
            <td>$finale[0]</td>
            <td>$finale[1]</td>
          </tr>";
        }
      ?>
      </tbody>
    </table>
  </body>
</html>
```
