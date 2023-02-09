<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonctions</title>
</head>
<body>
    <?php
        $name = 'Toto'; // Cette variable n'a rien à voir avec le paramètre $name de la fonction

        function hello($name, $age = null) {
            $output = 'Bonjour '.$name;

            if ($age) {
                // On ajoute ", tu as..." à la variable $output
                $output .= ', tu as '.$age.' ans';
            }

            return $output;
        }

        // Le typage en PHP, c'est juste de la décoration
        // int, float, array, string, mixed, bool
        // PHP va essayer de transformer (caster) les paramètres dans le type donné
        // exemple : addition('1', 2) => '1' (string) va devenir 1 (int)
        // (int) '1'
        $name = 'Toto'; // variable globale
        function addition(int $n1, int $n2): int {
            global $name; // On peut accéder à une variable "globale" c'est à dire hors de la fonction
            // $n1 est une variable "locale"
            echo $name;
            return $n1 + $n2;
        }
    ?>

    <h1><?= hello('Fiorella', 3); ?></h1>
    <h2><?= strtoupper(hello('Toto')); ?></h2>

    <p>1 + 2 = <?= addition(1, 2); ?></p>
    <p>1 + 2 + 4 + 5 = <?= addition(1, 2) + addition(4, 5); ?></p>
    <p>1 + 2 + 4 + 5 = <?= addition(addition(1, 2), addition(4, 5)); ?></p>
</body>
</html>
