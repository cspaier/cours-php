# Exercice TP 1: Etes-vous majeur?

## Organisation des fichiers
Nous allons séparer les fichiers générant du HTML et les placer dans le dossier [vues](vues).
On commence par créer un fichier [vues/header.php](vues/header.php) qui contient l'en-tête HTML et un fichier [vues/footer.php](vues/footer.php) qui ferme les balises.

https://github.com/cspaier/cours-php/blob/04726da660449ef7875d7097efe64653872762cf/4.GET_POST/ex1_majeur/vues/header.php#L1-L6

https://github.com/cspaier/cours-php/blob/04726da660449ef7875d7097efe64653872762cf/4.GET_POST/ex1_majeur/vues/footer.php#L1-L2

Ainsi il nous suffira d'inclure le contenu du `<body>` entre ces deux fichiers.


## Page d'acceuil, formulaire
La page d'acceuil est le fichier [index.php](index.php). On y inclu les fichiers [vues/header.php](vues/header.php) et [vues/footer.php](vues/footer.php). 

https://github.com/cspaier/cours-php/blob/04726da660449ef7875d7097efe64653872762cf/4.GET_POST/ex1_majeur/index.php#L1-L4

Entre les deux, on insère un formulaire `GET` qui demande la date de naissance à l'utilisateur. Ce dernier est présent dans le fichier [vues/form.php](vues/form.php).

https://github.com/cspaier/cours-php/blob/04726da660449ef7875d7097efe64653872762cf/4.GET_POST/ex1_majeur/vues/form.php#L1-L7

Le formulaire appel un fichier [majeur.php](majeur.php).

## Traitement des données

Nous allons séparer le traitement des données dans une fonction que nous placerons dans le fichier [fonctions.php](fonctions.php).
On reprend le code de l'[exercice 6 de la fiche d'introduction sur PHP](/0.Introduction/corrections.md#exercice-tp-6-) et on l'adapte pour en faire une fonction qui renvoie un booléen: Vrai si l'utilisateur est majeur, Faux s'il est mineur.

https://github.com/cspaier/cours-php/blob/04726da660449ef7875d7097efe64653872762cf/4.GET_POST/ex1_majeur/fonctions.php#L1-L68

Dans le fichier [majeur.php](majeur.php) appellé par le [formulaire](vues/form.php), il nous suffit donc d'appeller cette fonction `est_majeur()` puis de générer du HTML. Encore une fois, le HTML sera généré dans une vue nommée [vues/reponse.php](vue/reponse.php).

https://github.com/cspaier/cours-php/blob/04726da660449ef7875d7097efe64653872762cf/4.GET_POST/ex1_majeur/majeur.php#L1-L9

https://github.com/cspaier/cours-php/blob/04726da660449ef7875d7097efe64653872762cf/4.GET_POST/ex1_majeur/vues/reponse.php#L1-L7
