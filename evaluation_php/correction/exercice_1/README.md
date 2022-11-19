# Correction de l'exercice 1
## 1.
> Modifier le fichier `exercice1.php` pour qu'il demande un nombre à l'utilisateur et qu'il affiche
"Essaye encore"si le nombre n'est pas compris entre 1 et 12.
```php
<?php
// On demande à l'utilisateur un nombre entre 1 et 12

$nombre = readline('Donne un nombre entre 1 et 12:');

if (($nombre < 1) || ($nombre > 12)){
    echo 'Essaye encore.';
}
```
## 2.
> Si l'utilisateur entre un nombre entre 1 et 12, le script doit afficher la température au mois correspondant

Il faut faire attention au décalage d'indice: Le mois de janvier correspond au `$nombre` `1` mais à l'indide `0` du tableau `$temperatures`. La température est donc `$temperatures[$nombre - 1]`.
``` php
<?php
if (($nombre < 1) || ($nombre > 12)){
    echo 'Essaye encore.';
}
else {
    echo "En $nombre/2021, la température moyenne à Rennes était de $temperatures[$nombre - 1] °C." . PHP_EOL;
}
```


## 3.
> Changer l'affichage pour: `En mars 2021, la température moyenne à Rennes était de 6.2 °C`

Il suffit de récupérer le nom du mois dans le tableau `$mois`. La remarque sur le décalage d'indice est la même: `$mois[$nombre -1 ]`.

```php
<?php
echo "En {$mois[$nombre -1 ]} 2021, la température moyenne à Rennes était de $temperatures[$nombre] °C." . PHP_EOL;
```

## 4. 
> Afficher ensuite la température pour chaque **autre** mois de l'année, un mois par ligne.

On va parcourir le tableau `$temperatures` en 

```php
<?php
foreach($temperatures as $index => $temp){
    // Attention au décalage d'incide!
    if ($index != $nombre -1){
        echo "En $mois[$index] 2021, la température moyenne à Rennes était de $temp °C." . PHP_EOL;
    }
}
```