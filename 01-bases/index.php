<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le PHP</title>
</head>
<body>
    <h1>Introduction PHP</h1>
    <?php
        // L'instruction echo permet d'afficher du texte
        echo '<p class="toto">Hello PHP</p>';
        echo "J'affiche un texte";
        echo ' avec l\'apostrophe <br />';

        // Les variables
        $age = 31; // Un entier (integer)
        $monkeyEatBanana = true; // Booléen (boolean)
        $price = 2.99; // Réel (float)
        $city = 'Hulluch'; // Chaine (string)

        // Concaténation
        echo 'J\'ai '.$age.' ans et je vais à '.$city.' <br />';

        // Raccourci avec interpolation
        echo "La variable \$price contient $price. On peut aussi faire {$price}. <br />";
    ?>

    <h2><?php echo 'Salut'; ?></h2>
    <a href="hello.php">Hello</a>
</body>
</html>
