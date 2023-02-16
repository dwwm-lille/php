<?php

/**
 * Ici, on va pouvoir définir des variables ou des fonctions que l'on
 * peut réutiliser sur toutes nos pages.
 */

/**
 * Permet de récupèrer le nom de la page actuelle.
 */
function pageName() {
    $uri = $_SERVER['REQUEST_URI']; // 09-includes/index.php
    $name = strrchr($uri, '/');
    $name = substr($name, 1, -4); // /index.php devient index
    $name = empty($name) ? 'index' : $name;

    return $name;
}
