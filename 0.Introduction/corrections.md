# Introduction au langage PHP - Correction des exercices
## II)Syntaxe, entrées et sorties
### Exercice 1 :
>Créer un script demandant son année de naissance à l'utilisateur et affichant son age.

```php
<?php
$annee_naissance = readline('Votre année de naissance:');
echo 2022 - $annee_naissance;
```

## III) Structures conditionnelles
### Exercice 2:
>Créer un script qui demande son année de naissance à l'utilisateur et qui affiche s'il est majeur ou non.

```php
<?php
$annee_naissance = readline('Votre année de naissance:');
$age = 2022 - $annee_naissance;
if ($age >= 18){
    echo 'Vous êtes majeur';
}
else {
    echo 'vous êtes mineur';
}
```

### Exercice 3:
>```php
<?php
$a = 42;
if ($a <= 40) { echo "A"; }
elseif ($a > 38) { echo "B"; }
elseif ($a > 41) { echo "C";  }
else { echo "D"; }
```
1. Que va afficher le script ci-dessus?
2. Et si on change la deuxième ligne par `$a = 39` ?
3. Quelle valeur doit-on mettre à $a pour faire afficher `D` ?


1. Le script va afficher `B`.
2. Le script va afficher `A`.
3. C'est impossible. Soit `$a <= 40`, soit `$a > 38`.

### Exercice 4:
>```php
<?php
$var = 1;
switch($var){
    case 1: echo 1;
    case 2: echo 2; break;
    default: echo 3;
}
```
1. Que va afficher le script ci-dessus?
2. Si on change la deuxième ligne par `$var = 2` ?
3. Si on change la deuxième ligne par `$var = 42` ?

1.  **Il va afficher `12`.**
2.  **Il va afficher `2`.**
3.  **Il va afficher `3`.**

### Exercice TP 5:
Le prix d'une place de cinéma est de 10€ pour les plus de 20 ans, 7,5€ pour les personnes entre 5
et 19 ans et gratuit pour les autres. Écrire un algorithme qui demande l'année de naissance et affiche le prix à payer.
```php
<?php
$annee_naissance = readline('Votre année de naissance:');
$age = 2022 - $annee_naissance;
if ($age >= 20){
    echo 'Le prix de votre place est de 10€.';
}
elseif ($age >= 5) {
  // Ici, le elseif nous assure que $age < 20.
    echo 'Le prix de votre place est de 7,5€.';
}
else {
  // Le else nous assure que $age < 5.
    echo 'La place est gratuite.';
}
```

#### Exercice TP 6 :
>Écrire un script qui demande le jour, le mois, et l'année de naissance de l'utilisateur et qui dit s'il est majeur.
Il faudra utiliser la fonction `date()` de PHP pour être précis au jour près!

```php
<?php
// On demande à l'utilisateur ses jour, mois et année de naissance.
$jour_naissance = readline('Jour de naissance:');
$mois_naissance = readline('Mois de naissance:');
$annee_naissance = readline('Année de naissance:');

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
  echo 'Vous êtes majeur.';

}
elseif ($annee - $annee_naissance == 18){
  /* 2. L'utilisateur est né en 2004: Il faut regarder le mois.
  2.1: S'il est né avant le mois en cours, il est majeur.
  2.2: S'il est né dans le mois en cours, il faut regarder les jours.
  2.3: S'il est né après le mois en cours, il est mineur.
  */
  if ($mois_naissance < $mois){
    // 2.1: Il est né avant le mois en cours, il est majeur.
    echo 'Vous êtes majeur.';
  }
  elseif ($mois_naissance == $mois){
    /* 2.2: Il est né dans le mois en cours, il faut regarder les jours.
    2.2.1: S'il est né avant le jour en cours, il est majeur.
    2.2.2: S'il est né le jour en cours, c'est son anniversaire et il est majeur.
    2.2.3: S'il est né après le jour en cours, il est mineur.
    */
    if ($jour_naissance < $jour){
      echo 'Vous êtes majeur.';
    }
    elseif ($jour_naissance == $jour) {
      echo 'Joyeux anniversaire! Vous êtes majeur.';
    }
    else{
      echo 'Vous êtes mineur.';
    }
  }
  else {
    // 2.3: Il est né après le mois en cours, il est mineur.
    echo 'Vous êtes mineur.';
  }
}
else {
  // 3. L'utilisateur est né après 2004: Il est mineur
  echo 'Vous êtes mineur.';
}

```
#### Exercice TP 8:
>1. Ouvrir l'url suivante dans un navigateur. Qu'y voit-on?
https://data.rennesmetropole.fr/api/records/1.0/search/?dataset=prevision-meteo-rennes-arome&rows=1
2. Dans un fichier PHP, utiliser `file_get_contents($url)` pour obtenir les données.
3. Convertir les données en tableau avec `json_decode($string, true)`.
4. Afficher les prévisions météorologiques de Rennes.

1. Cela ressemble à des prévisions météorologiques de la ville de Rennes.

2. Fichier PHP:

```php
<?php

$url = 'https://data.rennesmetropole.fr/api/records/1.0/search/?dataset=prevision-meteo-rennes-arome&rows=1';
$reponse = file_get_contents($url);

var_dump($reponse);
```
Affichage (`$reponse` est une chaîne de caractère):
```
string(956) "{"nhits": 3560, "parameters": {"dataset": ["prevision-meteo-rennes-arome"], "rows": 1, "start": 0, "format": "json", "timezone": "UTC"}, "records": [{"datasetid": "prevision-meteo-rennes-arome", "recordid": "arome_0025_sp1_sp2_sp3_lastgrib2-6129770", "fields": {"10m_wind_speed": 3.308612, "total_precipitation": 0.039062, "2_metre_relative_humidity": 61.648178, "maximum_temperature_at_2_metres": 17.509821000000045, "minimum_temperature_at_2_metres": 16.534387000000038, "2_metre_temperature": 17.512628000000007, "position": [48.225, -1.675], "surface_latent_heat_flux": -2933029.0, "surface_solar_radiation_downwards": 9051419.0, "surface_net_thermal_radiation": -2296722.0, "forecast": "2022-10-07T13:00:00+00:00", "surface_net_solar_radiation": 7358148.0, "timestamp": "2022-10-07T03:00:00+00:00", "surface_sensible_heat_flux": -1619189.0}, "geometry": {"type": "Point", "coordinates": [-1.675, 48.225]}, "record_timestamp": "2022-10-07T03:00:00Z"}]}"
```

3. PHP

```php
<?php

$url = 'https://data.rennesmetropole.fr/api/records/1.0/search/?dataset=prevision-meteo-rennes-arome&rows=1';
// file_get_contents donne une chaîne de caractère
$reponse = file_get_contents($url);
// json_decode(string, true) la convertit en tableau
$tableau = json_decode($reponse, true);
print_r($tableau);
```

Affichage

```
Array
(
    [nhits] => 3560
    [parameters] => Array
        (
            [dataset] => Array
                (
                    [0] => prevision-meteo-rennes-arome
                )

            [rows] => 1
            [start] => 0
            [format] => json
            [timezone] => UTC
        )

    [records] => Array
        (
            [0] => Array
                (
                    [datasetid] => prevision-meteo-rennes-arome
                    [recordid] => arome_0025_sp1_sp2_sp3_lastgrib2-6129770
                    [fields] => Array
                        (
                            [10m_wind_speed] => 3.308612
                            [total_precipitation] => 0.039062
                            [2_metre_relative_humidity] => 61.648178
                            [maximum_temperature_at_2_metres] => 17.509821
                            [minimum_temperature_at_2_metres] => 16.534387
                            [2_metre_temperature] => 17.512628
                            [position] => Array
                                (
                                    [0] => 48.225
                                    [1] => -1.675
                                )

                            [surface_latent_heat_flux] => -2933029
                            [surface_solar_radiation_downwards] => 9051419
                            [surface_net_thermal_radiation] => -2296722
                            [forecast] => 2022-10-07T13:00:00+00:00
                            [surface_net_solar_radiation] => 7358148
                            [timestamp] => 2022-10-07T03:00:00+00:00
                            [surface_sensible_heat_flux] => -1619189
                        )

                    [geometry] => Array
                        (
                            [type] => Point
                            [coordinates] => Array
                                (
                                    [0] => -1.675
                                    [1] => 48.225
                                )

                        )

                    [record_timestamp] => 2022-10-07T03:00:00Z
                )

        )

)
```
4. PHP

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

// On utilise ensuite date_format pour l'affichage
// https://www.php.net/manual/en/datetime.format.php#refsect1-datetime.format-parameters
echo 'Prévisions météorologiques de Rennes pour le ' . date_format($prevision, "d/m/Y à H:i:s") . PHP_EOL;
echo 'Précipitations (mm): ' . $donnees['total_precipitation'] . PHP_EOL;
echo 'Température (°C): ' . $donnees['2_metre_temperature'] . PHP_EOL;
echo 'Humidité (%): ' . $donnees['2_metre_relative_humidity'] . PHP_EOL;
```
Affichage
```
Prévisions météorologiques de Rennes pour le 07/10/2022 à 13:00:00
Précipitations (mm): 0.039062
Température (°C): 17.512628
Humidité (%): 61.648178
```
