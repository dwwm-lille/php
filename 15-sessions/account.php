<?php

session_start();

// On va chercher la personne connectée
$currentNickname = $_SESSION['nickname'] ?? null;

// Déconnexion
if (isset($_GET['logout'])) {
    unset($_SESSION['nickname']);
    header('Location: index.php');
}

require __DIR__.'/partials/header.php'; ?>

<h1>Bonjour <?= $currentNickname; ?></h1>
<a href="account.php?logout=1">Déconnexion</a>

<?php require __DIR__.'/partials/footer.php'; ?>
