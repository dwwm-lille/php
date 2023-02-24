<?php

/**
 * Ici, on va préparer la connexion à la base de données
 * grâce à PDO.
 */

// Les paramètres de la BDD (sous forme de constantes)
define('DB_HOST', 'localhost');
define('DB_NAME', 'exercice-pdo-1');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// La connexion à la base
try {
    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Exception $exception) {
    echo '<p>'.$exception->getMessage().'</p>';
    die();
}

/**
 * On range la connexion à la BDD dans une fonction.
 */
function db() {
    global $db;

    return $db;
}
