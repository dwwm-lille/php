<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <?php
        // On va récupèrer les variables
        $number1 = $_GET['number1'] ?? null; // On prend la clé number1 si elle existe sinon on prend null
        $number2 = $_GET['number2'] ?? null;
        $operator = $_GET['operator'] ?? '+';

        // Faire le calcul si nécessaire
        if ($number1 !== null && $number2 !== null) {
            // On pourrait être tenté d'utiliser la fonction eval() mais à éviter...
            // car un utilisateur mal intentioné pourrait exécuter du PHP sur votre serveur
            // "shell_exec('ls -l');" par exemple
            // $result = eval("echo $number1 $operator $number2;");
            if ($operator === '+') {
                $result = $number1 + $number2;
            } else if ($operator === '-') {
                $result = $number1 - $number2;
            } else if ($operator === '/') {
                // Dans le cas de division, si $number2 est 0, on le passe à 1...
                $number2 = $number2 === '0' ? 1 : $number2;
                echo '<p>Attention, on ne peut pas diviser par 0...</p>';
                $result = $number1 / $number2;
            } else if ($operator === 'x') {
                $result = $number1 * $number2;
            }

            echo "<h1>$number1 $operator $number2 = $result</h1>";
        }
    ?>

    <form method="get" action="">
        <div>
            <label for="number1">Nombre 1</label>
            <input type="text" name="number1" id="number1" value="<?= $number1; ?>">
        </div>
        <div>
            <label for="number2">Nombre 2</label>
            <input type="text" name="number2" id="number2" value="<?= $number2; ?>">
        </div>
        <div>
            <label for="operator">Opérateur</label>
            <!-- Le name c'est la clé du $_GET ($_GET['operator']) -->
            <select name="operator" id="operator">
                <option <?= $operator === '+' ? 'selected' : ''; ?> value="+">Addition (+)</option>
                <option <?= $operator === '-' ? 'selected' : ''; ?> value="-">Soustraction (-)</option>
                <option <?= $operator === '/' ? 'selected' : ''; ?> value="/">Division (/)</option>
                <option <?= $operator === 'x' ? 'selected' : ''; ?> value="x">Multiplication (x)</option>
            </select>
        </div>

        <button>Calculer</button>
    </form>
</body>
</html>
