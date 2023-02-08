<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les boucles</title>
</head>
<body>
    <h2>La boucle for</h2>
    <!-- Le for est composé d'une initialisation, une condition d'exécution et
        un code à exécuter à chaque itération. -->
    <ul>
        <?php for ($i = 0; $i < 10; $i++) {
            echo '<li>'.$i.'</li>';
        } ?>
    </ul>

    <h2>La boucle foreach</h2>
    <?php
        // $letters = array('A', 'B', 'C'); // Syntaxe 2000
        $firstnames = ['Fiorella', 'Marina', 'Matthieu'];

        var_dump($firstnames); // Debug du tableau

        // On peut parcourir un tableau et récupérer index et valeur
        foreach ($firstnames as $index => $value) {
            echo "<h3>$value ($index)</h3>";
        }
    ?>

    <h2>La boucle while</h2>

    <?php
        $i = rand(0, 10); // Nombre aléatoire entre 0 et 10
        while ($i < 10) {
            echo $i++;
        }
    ?>

    <h2>La boucle do while (exécuté au moins une fois)</h2>
    <?php
        $i = rand(0, 10); // Nombre aléatoire entre 0 et 10
        do {
            echo $i++;
        } while ($i < 10);
    ?>
</body>
</html>
