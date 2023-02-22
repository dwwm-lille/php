<?php

/**
 * Ici, on va préparer la connexion à la base de données
 * grâce à PDO.
 */

// Les paramètres de la BDD (sous forme de constantes)
define('DB_HOST', 'localhost');
define('DB_NAME', 'webflix');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// La connexion à la base
try { // Essaye le code ou va dans le catch
    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, [
        // On veut un tableau associatif pour les résultats
        // Le :: = Opérateur de résolution de portée (Pamayim Nekudotayim)
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Exception $exception) {
    echo '<p>'.$exception->getMessage().'</p>';
    echo '<a href="https://www.google.fr/search?q='.$exception->getMessage().'" target="_blank">Go Google</a>';
    echo '<img src="img/travolta.gif" width="100" />';
    die(); // On arrête le code car la BDD ne fonctionne pas
}

/**
 * On range la connexion à la BDD dans une fonction.
 */
function db() {
    global $db; // Permet d'accèder à la variable $db

    return $db;
}

/**
 * Permet de faire un fetchAll rapidement avec PDO.
 */
function select($sql, $params = []) {
    $query = db()->prepare($sql);
    $query->execute($params);

    return $query->fetchAll();
}
