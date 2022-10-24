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

La page d'acceuil est `index.php`. On y lit:
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
