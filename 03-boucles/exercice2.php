<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice Boucles</title>
</head>
<body>
    <h1>Les sushis</h1>
    <?php
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10 - $i; $j++) {
                echo '🍣 ';
            }

            echo '<br />';
        }
    ?>
</body>
</html>
