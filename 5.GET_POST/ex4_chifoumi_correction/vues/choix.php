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