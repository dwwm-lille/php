<?php require __DIR__.'/partials/header.php'; ?>

<h1>Webflix</h1>

<?php
    // On peut faire une requête SQL en PHP
    $query = db()->query('SELECT * FROM movie');

    // On doit exécuter la requête pour avoir le résultat
    $movies = $query->fetchAll();

    var_dump($movies);
?>

<?php require __DIR__.'/partials/footer.php'; ?>
