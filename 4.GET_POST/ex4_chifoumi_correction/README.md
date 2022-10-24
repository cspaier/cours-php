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
## formatage de la réponse
On regarde donc le contenu du fichier `vues/reponse.php`:
```php
<?php include('vues/header.php'); ?>

<h2>
<!-- Gagné? Perdu? -->
</h2>
<table>
<thead>
    <tr>
        <th>Vous</th>
        <th> Vs </th>
        <th> Machine </th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>
        <!-- L'utilisateur à joué quoi? -->
        </td>
        <td> Vs </td>
        <td>
        <!-- La machine à joué quoi? -->
        </td>
    </tr>
</tbody>
</table>

<?php include('vues/form.php');?>

<?php include('vues/footer.php');?>
```
On y voit un tableau HTML avec des commentaires indiquant où placer les informations.
Dans ce fichier, les variables `$choix_utilisateur`, `$choix_machine` et `$gagnant` contiennent les informations dont nous avons besoins. Il va falloir les traduire:

On commence par traiter le titre en remplaçant
```php
<h2>
<!-- Gagné? Perdu? -->
</h2>
```
par
```php
<h2>
  <?php
    switch($gagnant){
      case 0: echo 'Egalité'; break;
      case 1: echo 'Bravo!'; break;
      case 2: echo 'Perdu'; break;
    }
  ?>
</h2>
```

Il faudra ensuite reproduire cette logique de pour les choix pierres-feuille-ciseaux:
```php
<?php
switch($choix){
  case 0: echo 'Pierre'; break;
  case 1: echo 'Feuille'; break;
  case 2: echo 'Ciseaux'; break;
}
```
Le principe [Don't Repeat Yoursefl](https://fr.wikipedia.org/wiki/Ne_vous_r%C3%A9p%C3%A9tez_pas) nous invite à n'écrire cela qu'une seule fois.

C'est le moment où on découvre l'existence du fichier `vues/choix.php` qui contient très précisément cette logique:
```php
<?php
/**
* Insère une image en fonction de la variable $choix
* 0: Pierre
* 1: Feuille
* 2: Ciseaux
*/
switch($choix){
    case 0:
        echo '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Basalt_-_amygdaloidal_structure.jpg/320px-Basalt_-_amygdaloidal_structure.jpg" alt="pierre">';
        break;
    case 1:
        echo '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Leaf_1_web.jpg/320px-Leaf_1_web.jpg" alt="feuille">';
        break;
    case 2:
        echo '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Pair_of_scissors_with_black_handle%2C_2015-06-07.jpg/288px-Pair_of_scissors_with_black_handle%2C_2015-06-07.jpg" alt="ciseaux">';
        break;
}
```

On remarque qu'au lieux d'écrire les choix en Français, ce fichier va insérer une image représentant le choix.
On va donc inclure ce fichier deux fois dans `vues/reponse.php`:

```php
<?php include('vues/header.php'); ?>

<h2>
  <?php
    switch($gagnant){
      case 0: echo 'Egalité'; break;
      case 1: echo 'Bravo!'; break;
      case 2: echo 'Perdu'; break;
    }
  ?>
</h2>
<table>
  <thead>
      <tr>
          <th>Vous</th>
          <th> Vs </th>
          <th> Machine </th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td>
            <?php
              $choix = choix_utilisateur;
              include(`vues/choix.php`);
            ?>
          </td>
          <td> Vs </td>
          <td>
            <?php
              $choix = choix_machine;
              include(`vues/choix.php`);
            ?>
          </td>
      </tr>
  </tbody>
</table>

<?php include('vues/form.php');?>

<?php include('vues/footer.php');?>
```

On peut également inclure ce fichier `vues/choix.php` dans le formulaire afin d'y afficher des images. Le fichier `vues/form.php` devient donc:

```php

<h2>Jouer</h2>
<form action="jouer.php" method="GET">
<fieldset>
    <legend>Faites votre choix</legend>
      <input type="radio"  name="choix" value="0">
      <label for="0">
        <?php
          $choix = 0;
          include('vues/choix.php')
        ?>
      </label>
      <input type="radio"  name="choix" value="1">
      <label for="1">
        <?php
          $choix = 1;
          include('vues/choix.php')
        ?>
      </label>
      <input type="radio" name="choix" value="2">
      <label for="2">
        <?php
          $choix = 2;
          include('vues/choix.php')
        ?>
      </label>
</fieldset>

<button type="submit">Envoyer</button>
</form>
```
