<?php

require __DIR__.'/partials/header.php'; 

// Redirige vers l'accueil si on n'est pas connecté
if (!user()) {
    header('Location: index.php');
}

?>

<div class="max-w-3xl mx-auto mt-16">
    <h1 class="text-3xl">Bonjour <?= user(); ?>, comment allez-vous ?</h1>
</div>

<?php require __DIR__.'/partials/footer.php'; ?>
