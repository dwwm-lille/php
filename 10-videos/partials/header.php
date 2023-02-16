<?php
    require __DIR__.'/../config/functions.php';
    // La variable peut être définie sur n'importe quelle page sinon on lui
    // donne une valeur par défaut
    $title = $title ?? 'PhpFlix';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;700&display=swap">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>
<body class="font-[figtree]">
    <header class="bg-slate-900 text-white">
        <div class="max-w-4xl mx-auto flex items-center justify-between py-3 px-4">
            <h1 class="font-bold text-2xl">
                <a href="index.php">Php<span class="text-red-400">Flix</span></a>
            </h1>
            <nav class="space-x-8">
                <a href="index.php" class="<?= pageName() === 'index' ? 'text-red-400': ''; ?> hover:text-red-400 duration-500">Accueil</a>
                <a href="contact.php" class="<?= pageName() === 'contact' ? 'text-red-400': ''; ?> hover:text-red-400 duration-500">Contact</a>
                <a href="#" class="<?= pageName() === 'videos' ? 'text-red-400': ''; ?> hover:text-red-400 duration-500">Vidéos</a>
            </nav>
        </div>
    </header>
