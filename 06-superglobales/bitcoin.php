<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitcoin vers euro</title>
</head>
<body>
    <?php
        $amount = (float) ($_POST['amount'] ?? null); // On force le amount à être un nombre
        $currency = $_POST['currency'] ?? 'euro';

        if (!empty($_POST)) { // On vérifie que le formulaire a été envoyé
            $rate = 20295;

            if ($currency === 'euro') { // Si la devise de départ est l'euro
                $decimals = ($amount / $rate <= 1) ? 4 : 2; // 0,0004 ou 1 234,45
                $result = number_format($amount / $rate, $decimals, ',', ' ');
                echo "<h1>$amount euros valent $result bitcoins</h1>";
            } else {
                $result = number_format($amount * $rate, 2, ',', ' ');
                echo "<h1>$amount bitcoins valent $result euros</h1>";
            }
        }
    ?>

    <form method="post" action="">
        <div>
            <label for="amount">Montant</label>
            <input name="amount" id="amount" value="<?= $amount; ?>">
        </div>

        <div>
            <label>Devise</label>
            <input type="radio" name="currency" id="currency-euro" value="euro" <?= $currency === 'euro' ? 'checked' : ''; ?>>
            <label for="currency-euro">Euros vers bitcoins</label>
            <input type="radio" name="currency" id="currency-btc" value="btc" <?= $currency === 'btc' ? 'checked' : ''; ?>>
            <label for="currency-btc">Bitcoins vers euros</label>
        </div>

        <button>Convertir</button>
    </form>
</body>
</html>
