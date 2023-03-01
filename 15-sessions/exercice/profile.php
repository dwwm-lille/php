<?php

require __DIR__.'/partials/header.php';

if (isset($_COOKIE['remember'])) {
    $query = db()->prepare('SELECT * FROM user WHERE token = :token');
    $query->execute(['token' => $_COOKIE['remember']]);
    $user = $query->fetch();

    if ($user) {
        $_SESSION['user'] = $user['username'];
    } else {
        die('TRÈS ÉTRANGE...');
    }
}

// Redirige vers l'accueil si on n'est pas connecté
if (!user()) {
    header('Location: index.php');
}

?>

<div class="max-w-3xl mx-auto mt-16">
    <h1 class="text-3xl">Bonjour <?= user(); ?>, comment allez-vous ?</h1>

    <a href="logout.php" class="bg-red-500 hover:bg-red-600 px-4 py-2 inline-block text-white rounded mt-8">Déconnexion</a>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>
