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

    <p>Exo 1 : <?= date('l d F Y, \i\l \e\s\t H\hi \e\t s \s\e\c\o\n\d\e\s'); ?></p>
    <p>Exo 1 bis : <?= date('l d F Y,').' il est '.date('H\hi').' et '.date('s').' secondes'; ?></p>

    <p>Exo 2 : <?= date('l d', strtotime('+ 10 days')); ?></p>

    <?php
        $christmas = strtotime('25 december'); // 1703458800
        $now = time(); // 1645008798
        $days = ($christmas - $now) / (60 * 60 * 24); // 30 000 000 / 60s * 60m * 24h
        // echo date('z', $christmas - $now); // Solution plus rapide
    ?>
    <p>Exo 3 : Noël est dans <?= ceil($days); ?> jours</p>
</body>
</html>
