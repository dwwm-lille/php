<?php

require __DIR__.'/config/db.php';

// On va récupèrer l'id dans l'url
$id = $_GET['id'] ?? null;

// On peut maintenant supprimer le message grâce à
// son id
$query = db()->prepare('DELETE FROM contacts WHERE id = :id');
$query->execute(['id' => $id]);

// On va rediriger l'utilisateur sur la page d'origine
header('Location: index.php');
