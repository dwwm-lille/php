<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Bart</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $sentences = [
            'I will not skateboard in the halls.',
            'I will not encourage others to fly.',
            'I will not drive the principal\'s car.',
            'I am not a dentist.',
            'I will finish what I start.',
            'I will not bring sheep to class.',
        ];
        $lineNumber = $_GET['line'] ?? 10;
        $sentence = $sentences[array_rand($sentences)];
    ?>

    <a href="index.php">Copier 10 fois</a>
    <a href="index.php?line=100">Copier 100 fois</a>

    <div class="board">
        <div class="content">
            <div class="bart"></div>
            <?php for ($i = 0; $i < $lineNumber; $i++) { ?>
                <p><?= $sentence; ?></p>
            <?php } ?>
        </div>
    </div>
</body>
</html>
