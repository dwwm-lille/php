<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice tableaux 2</title>
</head>
<body>
    <?php
        $students = [
            0 => [
                'nom' => 'Matthieu',
                'notes' => [10, 8, 16, 20, 17, 16, 15, 2]
            ],
            1 => [
                'nom' => 'Thomas',
                'notes' => [4, 18, 12, 15, 13, 7]
            ],
            2 => [
                'nom' => 'Jean',
                'notes' => [17, 14, 6, 2, 16, 18, 9]
            ],
            3 => [
                'nom' => 'Enzo',
                'notes' => [1, 20, 6, 2, 1, 8, 9]
            ]
        ];
    ?>

    <h2>Afficher la liste de tous les éléves avec leurs notes.</h2>

    <?php foreach ($students as $student) { ?>
        <h1>
            <?= $student['nom']; ?> a eu

            <?php foreach ($student['notes'] as $index => $note) {
                echo $note;

                // Afficher la , sur tout sauf l'avant dernier et le dernier élément
                if ($index < count($student['notes']) - 2) {
                    echo ', ';
                } else if ($index === count($student['notes']) - 2) { // Seulement sur l'avant dernier élément
                    echo ' et ';
                }
            } ?>
        </h1>
    <?php } ?>

    <h2>Calculer la moyenne de Jean. On part de $students[2]["notes"]</h2>

    <?php $average = array_sum($students[2]['notes']) / count($students[2]['notes']); ?>

    <h1>La moyenne de Jean est <?= round($average, 2); ?></h1>

    <h2>Combien d'élèves ont la moyenne ?</h2>

    <?php
        $numberAverage = 0;
        foreach ($students as $student) {
            $average = array_sum($student['notes']) / count($student['notes']);
    ?>
        <p>
            <?= $student['nom']; ?>

            <?php if ($average >= 10) {
                $numberAverage++;
                echo 'a la moyenne';
            } else {
                echo 'n\'a pas la moyenne';
            } ?>
        </p>
    <?php } ?>

    <p>Nombre d'élèves avec la moyenne: <?= $numberAverage; ?></p>

    <h2>Quel(s) éléve(s) a(ont) la meilleure note ?</h2>

    <?php
        $bestNote = 0;

        // Trouver la meilleure note
        foreach ($students as $student) {
            foreach ($student['notes'] as $note) {
                if ($note > $bestNote) {
                    $bestNote = $note;
                }
            }
        }

        // Trouver qui a cette meilleure note
        foreach ($students as $student) {
            // in_array est une fonction qui permet de savoir si une valeur est dans un tableau
            if (in_array($bestNote, $student['notes'])) {
                echo "<p>{$student['nom']} a la meilleure note : $bestNote</p>";
            }
        }
    ?>

    <h2>Qui a eu au moins un 20 ?</h2>

    <?php
        $hasTwenty = false;

        // On cherche parmi toutes les notes au moins un 20
        foreach ($students as $student) {
            foreach ($student['notes'] as $note) {
                if ($note === 20) {
                    $hasTwenty = true;
                    break 2; // On arrête le foreach des notes ET le foreach des élèves dès qu'on tombe sur 20
                }
                var_dump($note);
            }
            var_dump($student);
        }

        if ($hasTwenty) {
            echo '<p>Quelqu\'un a eu 20</p>';
        } else {
            echo '<p>Personne n\'a eu 20</p>';
        }
    ?>
</body>
</html>
