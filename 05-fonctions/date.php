<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Pour changer le fuseau horaire
        date_default_timezone_set('Europe/Paris');
        echo 'On est le '.date('d/m/Y');
        echo '. Il est '.date('H \h i \m s \s');
    ?>

    <p>Timestamp: <?= time(); ?></p>
    <p>Date précise: <?= date('d/m/Y', -432000); ?></p>
    <p>Timestamp anniversaire: <?= strtotime('18 november 1991'); ?></p>
    <p>Timestamp de maintenant + un mois: <?= strtotime('+ 1 month'); ?></p>
    <p>Jour d'anniversaire: <?= date('l Y', strtotime('18 november 1991')); ?></p>
</body>
</html>
