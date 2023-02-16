<?php

/**
 * Ici, on va pouvoir définir des variables ou des fonctions que l'on
 * peut réutiliser sur toutes nos pages.
 */

/**
 * Permet de récupèrer le nom de la page actuelle.
 */
function pageName() {
    $uri = $_SERVER['REQUEST_URI']; // 10-videos/index.php
    $name = strrchr($uri, '/');
    $name = substr($name, 1, -4); // /index.php devient index
    $name = empty($name) ? 'index' : $name;

    return $name;
}

/**
 * Permet de récupérer les données dans $_POST
 */
function post($key, $default = null) {
    return $_POST[$key] ?? $default;
}

/**
 * Permet de savoir si un formulaire a été soumis ou non
 */
function isSubmit() {
    return !empty($_POST);
}
