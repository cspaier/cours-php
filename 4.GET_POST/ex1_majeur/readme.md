# Exercice TP 1: Etes-vous majeur?

## Organisation des fichiers
Nous allons séparer les fichiers générant du php et les placer dans le dossier [vues](vues).
On commence par créer un fichier [vues/header.php](vues/header.php) qui contient l'en-tête HTML et un fichier [vues/footer.php](vues/footer.php) qui ferme les balises.



Ainsi il nous suffira d'inclure le contenu du `<body>` entre ces deux fichiers.



## Page d'acceuil, formulaire
La page d'acceuil est le fichier [index.php](index.php). On y inclu les fichiers [vues/header.php](vues/header.php) et [vues/footer.php](vues/footer.php). Entre les deux, on insère un formulaire `GET` qui demande la date de naissance à l'utilisateur. Ce dernier est présent dans le fichier [vues/form.php](vues/form.php).

Le formulaire appel un fichier [majeur.php](majeur.php).

## Traitement des données

Nous allons séparer le traitement des données dans une fonction que nous placerons dans le fichier [fonctions.php](fonctions.php).
On reprend le code de l'[exercice 6 de la fiche d'introduction sur PHP](/0.Introduction/corrections.md#exercice-tp-6-) et on l'adapte pour en faire une fonction qui renvoie un booléen: Vrai si l'utilisateur est majeur, Faux s'il est mineur.

Dans le fichier [majeur.php](majeur.php) appellé par le [formulaire](vues/form.php), il nous suffit donc d'appeller cette fonction `est_majeur()` puis de générer du HTML. Encore une fois, le HTML sera généré dans une vue nommée [vues/reponse.php](vue/reponse.php).

