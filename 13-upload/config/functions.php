<?php

/**
 * Permet de nettoyer les données utilisateurs.
 */
function sanitize($value) {
    // ' <script>toto</script> ' => '&lt;script&gt;toto&lt;/script&gt;'
    return trim(htmlspecialchars($value ?? ''));
}

/**
 * Permet de vérifier si un formulaire est soumis.
 */
function isSubmit() {
    return ! empty($_POST);
}

/**
 * Permet de récupèrer facilement un champ en POST
 */
function post($key) {
    return sanitize($_POST[$key] ?? null);
}

/**
 * Permet de récupèrer facilement un fichier uploadé.
 */
function post_file($key) {
    return $_FILES[$key] ?? null;
}
