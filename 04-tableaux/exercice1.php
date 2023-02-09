<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice tableaux 1</title>
</head>
<body>
    <h2>Les capitales</h2>

    <?php
        $capitals = [
            'France' => 'Paris',
            'Espagne' => 'Madrid',
            'Italie' => 'Rome',
        ];

        foreach ($capitals as $country => $city) {
            echo "<p>La capitale de $country est $city.</p>";
        }
    ?>

    <h2>Population avec 20M</h2>

    <?php
        $population = [
            'France' => 67_595_000,
            'Suede' => 9998000,
            'Suisse' => 8417000,
            'Kosovo' => 1820631,
            'Malte' => 434403,
            'Mexique' => 122273500,
            'Allemagne' => 82800000,
        ];

        $sum = 0;
    ?>

    <ul>
    <?php foreach ($population as $country => $pop) {
        if ($pop >= 20_000_000) { ?>
        <li><?= $country; ?></li>
    <?php } // fin du if
        if ($country != 'Mexique') {
            $sum += $pop;
        }
    } ?>
    </ul>

    <p>Population Europe: <?= $sum; ?></p>

    <ul>
    <?php foreach ($population as $country => $pop) { ?>
        <?= ($pop >= 20_000_000) ? "<li>$country</li>" : '' ?>
    <?php } ?>
    </ul>
</body>
</html>
