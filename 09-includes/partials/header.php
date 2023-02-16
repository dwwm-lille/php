<?php
    require __DIR__.'/../config/functions.php';
    // La variable peut être définie sur n'importe quelle page sinon on lui
    // donne une valeur par défaut
    $title = $title ?? 'Gameshop';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>
<body>
    <header class="bg-slate-300">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between py-3">
                <h1>Gameshop</h1>

                <nav class="space-x-8">
                    <a href="index.php" class="border-slate-800 <?= pageName() === 'index' ? 'border-b-4' : '' ?>">Accueil</a>
                    <a href="contact.php" class="border-slate-800 <?= pageName() === 'contact' ? 'border-b-4' : '' ?>">Contact</a>
                </nav>
            </div>
        </div>
    </header>
