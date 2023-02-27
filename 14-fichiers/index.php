<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichiers</title>
</head>
<body>
    <?php
        // Pour ouvrir un fichier
        $file = fopen('log.txt', 'a+');

        // Pour écrire dans le fichier
        // fwrite($file, "Salut Fiorella\n");
        fclose($file);

        // Ecrire dans le fichier avec un formulaire
        if (!empty($_POST)) {
            $message = $_POST['message'];
            $date = date('Y-m-d H:i:s');
            file_put_contents('log.txt', "[$date] $message \n", FILE_APPEND);
        }

        // Pour lire le fichier
        $file = fopen('log.txt', 'r');
        if (filesize('log.txt') > 0) {
            $content = fread($file, filesize('log.txt'));
        }
        fclose($file);

        // Raccourci
        $content = file_get_contents('log.txt');

        // Récupère chaque ligne dans un tableau sauf les lignes vides
        $lines = array_filter(explode("\n", $content));
    ?>

    <form action="" method="post">
        <input type="text" name="message">
        <button>Log</button>
    </form>

    <h2>Le fichier de log a été modifié le <?= date('d/m/Y à H:i:s', filemtime('log.txt')); ?></h2>

    <ul>
        <?php foreach ($lines as $line) { ?>
            <li><?= $line; ?></li>
        <?php } ?>
    </ul>
</body>
</html>
