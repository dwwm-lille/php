<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice acronyme et conjugaison</title>
</head>
<body>
    <?php
        // Exo 1
        function acronym(string $words): string {
            // Transformer la phrase en tableau
            $words = explode(' ', $words);
            $acronym = '';

            // Parcourir chaque mot et garder la première lettre
            foreach ($words as $word) {
                $acronym .= substr($word, 0, 1); // $word[0]
            }

            return strtoupper($acronym);
        }

        $words = $_POST['words'] ?? null;

        if ($words) { // On vérifie que words est bien dans $_POST
            echo acronym($words);
        }

        // Exo 2
        function conjugate($verb) {
            if (!$verb) {
                return; // On arrête le code si le verbe est une chaine vide
            }

            $radical = substr($verb, 0, -2); // cherch

            // Tableau avec les pronoms et les terminaisons
            $subjects = [
                'Je' => 'e',
                'Tu' => 'es',
                'Il / Elle / On' => 'e',
                'Nous' => 'ons',
                'Vous' => 'ez',
                'Ils / Elles' => 'ent',
            ];

            $output = '';

            // Conjuguer
            foreach ($subjects as $subject => $ending) {
                $output .= $subject.' '.$radical.$ending.'<br />'; // Je cherche
            }

            return $output;
        }

        $verb = $_POST['verb'] ?? 'chercher';
        echo conjugate($verb);
    ?>

    <form method="post" action="">
        <input type="text" name="words" value="<?= $words; ?>">

        <button>Acronymiser</button>
    </form>

    <form method="post" action="">
        <input type="text" name="verb" value="<?= $verb; ?>">

        <button>Conjuguer</button>
    </form>
</body>
</html>
