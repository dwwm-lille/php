<?php

require __DIR__.'/db.php';

session_start();

/**
 * Permet de récupèrer facilement un champ en POST
 */
function post($field) {
    return sanitize($_POST[$field] ?? null);
}

/**
 * Permet de nettoyer une valeur
 */
function sanitize($value) {
    return trim(htmlspecialchars($value ?? ''));
}

/**
 * Permet de vérifier si un formulaire est soumis.
 */
function isSubmit() {
    return !empty($_POST);
}

/**
 * Permet de récupèrer l'utilisateur dans la session.
 */
function user() {
    return $_SESSION['user'] ?? null;
}

/**
 * Permet de récupérer un utilisateur dans la BDD.
 */
function selectUser($username) {
    $query = db()->prepare('SELECT * FROM user WHERE username = :username');
    $query->execute(['username' => $username]);

    return $query->fetch();
}
