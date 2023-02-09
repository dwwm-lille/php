<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonctions exercices</title>
</head>
<body>
    <?php
        function square(int $number): int {
            return $number * $number;
        }

        function areaRectangle($width, $height) {
            return $width * $height;
        }

        function areaCircle($radius) {
            // M_PI === pi()
            return round(pi() * square($radius), 2);
        }

        function price($amount, $rate = 20, $withTaxes = true) {
            if (!$withTaxes) {
                return $amount / (1 + $rate / 100); // Prix HT
            }

            return $amount * (1 + $rate / 100); // Prix TTC
        }
    ?>

    <p>Le carré de 5 est <?= square(5); ?></p>
    <p>Le carré de 15 est <?= square(15); ?></p>
    <p>L'aire d'un rectangle 5 / 10 est <?= areaRectangle(5, 10); ?></p>
    <p>L'aire d'un cercle de rayon 5 est <?= areaCircle(5); ?></p>
    <p>10 ht vaut <?= price(10); ?> ttc</p>
    <p>12 ttc vaut <?= price(12, 20, false); ?> ht</p>
</body>
</html>
