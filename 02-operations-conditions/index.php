<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP opérations et conditions</title>
</head>
<body>
    <h2>Opérations en PHP</h2>

    <?php
        $number1 = 3;
        $number2 = 4;
        $number3 = 5;

        $result1 = $number1 + $number2;
    ?>

    <p>3 + 4 = <?php echo $result1; ?></p>
    <p>4 x 5 = <?php echo $number2 * $number3; ?></p>
    <?php // round permet d'arrondir un nombre à 2 chiffres après la virgule ?>
    <p>5 / 3 = <?= round($number3 / $number1, 2); ?></p>
    <p>5 % 3 = <?= $number3 % $number1; ?></p>
    <p>2 <sup>3</sup> = <?= pow(2, $number1); ?> ou <?= 2 ** $number1; ?></p>

    <h2>Opérateurs d'incrémentations</h2>
    <p>result1 + 3 = <?= $result1 += 3; ?></p>
    <?php // $result1++ incrémente la valeur de 1 mais renvoie l'ancienne valeur (10) ?>
    <?php // ++$result1 incrémente la valeur de 1 et renvoie la valeur actuelle (12) ?>
    <p>result1 + 1 = <?= $result1++; ?></p>
    <p><?php echo $result1; ?></p>

    <p>
        <?php
            $sentence = 'Hello';
            $sentence .= ' Fiorella';
            echo $sentence; // Hello Fiorella
        ?>
    </p>

    <h2>Comparaisons en PHP</h2>
    <p>Est-ce que number1 est strictement égal à 3 ? <?php var_dump($number1 === 3); ?></p>
    <p>Est-ce que number1 est égal à '3' ? <?php var_dump($number1 == '3'); ?></p>
    <p>Est-ce que ++result1 est égal à 12 ? <?php var_dump(++$result1 === 12); ?></p>

    <h2>Conditions en PHP</h2>
    <?php
        $date = 6;
        $numberOfStudents = 16;

        // Si la date + 1 vaut 7 alors on a Coaching
        if ($date + 1 === 7) {
            echo 'On a coaching';
        } else { // Sinon on peut faire du PHP
            echo 'On a PHP';
        }

        echo '<br />';
        // Bien sûr, on peut faire des ternaires
        echo ($date + 1 === 7) ? 'On a coaching en ternaire' : 'On a PHP en ternaire';
    ?>

    <?php if ($date + 1 === 7 && $numberOfStudents >= 3) { ?>
        <h3>On a coaching</h3>
    <?php } else { ?>
        <h1>On a PHP</h1>
    <?php } ?>

    <h2>Les erreurs en PHP</h2>
    <?php
        // die('Stop'); // Arrête le script
        echo $a; // WARNING (N'arrête pas le script mais à corriger)
        // Attention, on ne peut pas diviser par zéro...
        // echo 10 / 0; // FATAL ERROR (Arrête le script, erreur 500)
        echo 'toto';
    ?>

    <a href="major.php">Exercice Majeur</a>
    <a href="operation.php">Exercice Opération</a>

    <h2>Le switch</h2>
    <?php
        $age = 0;

        switch ($age) {
            case 0:
            case $age < 18: // Cas où $age == $age < 18 ?
                echo 'Tu n\'es pas majeur';
            break;
            case 18: // Cas où $age == 18 ?
            case 19: // Cas où $age == 19 ?
                echo 'Tu es majeur';
            break;
        }
    ?>
</body>
</html>
