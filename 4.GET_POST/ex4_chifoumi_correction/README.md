# Exercice TP 4: Pierre Feuille Ciseaux

## Strucure du dossier
Un dossier incomplet du projet est fourni. On va commencer par l'analyser pour en comprendre la structure.

```
📦ex4_trame
 ┣ 📂vues
 ┃ ┣ 📜choix.php
 ┃ ┣ 📜footer.php
 ┃ ┣ 📜form.php
 ┃ ┣ 📜header.php
 ┃ ┗ 📜reponse.php
 ┣ 📜fonctions.php
 ┣ 📜index.php
 ┗ 📜jouer.php
 ```
Le dossier `vues` contient les fichier ayant pour rôle de générer du HTML.

La page d'accueil est `index.php`. On y lit:
```php
<?php
/**
* Pierre - Feuille - Ciseaux
* Dans tout le script, on va coder les choix des joueurs:
* 0: Pierre
* 1: Feuille
* 2: Ciseaux
*/
include('vues/header.php');
include('vues/form.php');
include('vues/footer.php');
```

Les fichiers `vues/header.php` et `vues/footer.php` sont respectivement l'en-tête et la fermeture des balises HTML.

On va donc regarder le fichier `vues/form.php`:
```php
<h2>Jouer</h2>
<form action="jouer.php">
<fieldset>
    <legend>Faites votre choix</legend>
      <input type="radio"  name="choix" value="0">
      <label for="0">
        Pierre
      </label>
      <input type="radio"  name="choix" value="1">
      <label for="1">
        Feuille
      </label>
      <input type="radio" name="choix" value="2">
      <label for="2">
        Ciseaux
      </label>
</fieldset>

<button type="submit">Envoyer</button>
</form>
```
On y trouve un formulaire avec des `input` de type [radio](https://developer.mozilla.org/fr/docs/Web/HTML/Element/input/radio) appelant le fichier `jouer.php`.
On remarque que le formulaire ne précise pas la méthode. Aucune donnée sensible ne va être envoyé et l'état du serveur ne sera pas modifié. On choisit donc la méthode `GET`.

Le fichier `fonction.php` contient la fonction codée dans [l'exercice 3 de la fiche sur les fonctions](https://github.com/cspaier/cours-php/blob/main/3.fonctions/corrections.md#exercice-tp-3-pierre-feuille-ciseaux):
```php
<?php

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

Le fichier `jouer.php` est vide. On va y traiter la réponse lorsque l'utilisateur à envoyé son choix.

## Traiter les données
On commence par établir un plan de bataille:
1. Récupérer les données envoyées par l'utilisateur: choix entre Pierre Feuille et Ciseaux.
2. Faire jouer la machine.
3. Déterminer le gagnant.
4. formater ces informations en HTML.

### 1. Récupérer les données
Il suffit d'utiliser la superglobale `$_GET`: `$choix_utilisateur = $_GET['choix'];`

### 2. Faire jouer la machine
La machine choisit au hasard: `$choix_machine = rand(0,2);`

### 3. Déterminer le gagnant
Il suffit d'utiliser la fonction `gagnant()` après avoir inclus le fichier `fonctions.php`.


### 4. formater ces informations en HTML
On va utiliser le fichier `vues/reponse.php`.

A ce moment, le fichier `jouer.php` donne donc:
```php
<?php
/**
* Pierre - Feuille - Ciseaux
* Dans tout le script, on va coder les choix des joueurs:
* 0: Pierre
* 1: Feuille
* 2: Ciseaux
*/

// Les inclusions de bibliothèques de fonctions sont placées en début de fichier
include('fonctions.php');

// On récupère le choix de l'utilisateur
$choix_utilisateur = $_GET['choix'];
// La machine joue au hasard
$choix_machine = rand(0,2);
// On détermine le gagnant
$gagnant = gagnant($choix_utilisateur, $choix_machine);

// On génère le HTML
include('vues/reponse.php')
```
