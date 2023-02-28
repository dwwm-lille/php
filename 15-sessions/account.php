<?php

session_start();

// Si la session a expiré, on peut se servir du cookie pour reconnecter la personne.
if (isset($_COOKIE['remember'])) {
    $_SESSION['nickname'] = $_COOKIE['remember'];
}

// On va chercher la personne connectée
$currentNickname = $_SESSION['nickname'] ?? null;

// Déconnexion
if (isset($_GET['logout'])) {
    unset($_SESSION['nickname']);
    setcookie('remember'); // Supprime le cookie
    header('Location: index.php');
}

// Si l'utilisateur n'est pas connecté, on le redirige vers index.php
if (! $currentNickname) {
    header('Location: index.php');
}

require __DIR__.'/partials/header.php'; ?>

<h1>Bonjour <?= $currentNickname; ?></h1>
<a href="account.php?logout=1">Déconnexion</a>

<?php require __DIR__.'/partials/footer.php'; ?>
