<?php require __DIR__.'/partials/header.php';

// Récupère les valeurs du formulaire
$firstname = post('firstname');
$cv = post_file('cv');
$mimeTypes = ['application/pdf', 'application/msword'];
$errors = [];

// Vérifier qu'on a soumis le formulaire
if (isSubmit()) {
    if (empty($firstname)) {
        $errors['firstname'] = 'Le prénom est invalide.';
    }

    var_dump($cv);

    if ($cv['error'] !== 0) { // Permet de savoir si aucun fichier n'a été uploadé
        $errors['cv'] = 'Le CV est obligatoire.';
    } else if (!empty($cv['tmp_name'])) { // Un fichier a été uploadé correctement
        $mime = mime_content_type($cv['tmp_name']);

        if (!in_array($mime, $mimeTypes)) {
            $errors['cv'] = 'Le CV n\'est pas un PDF.';
        }

        if ($cv['size'] > 5 * 1024 * 1024) {
            $errors['cv'] = 'Le fichier est trop lourd (5 Mo).';
        }
    }

    if (empty($errors)) {
        $folder = __DIR__.'/cvs';

        if (!is_dir($folder)) { // Si le dossier n'existe pas, on le créé
            mkdir($folder);
        }

        // Fiorella-1234 devient 91ca106ff0e1537a4c266ca1626c71ba
        $name = md5($firstname.'-'.uniqid());
        $extension = substr(strrchr($cv['name'], '.'), 1); // pdf
        // 91ca106ff0e1537a4c266ca1626c71ba.pdf
        $filename = $name.'.'.$extension;

        // Upload du fichier
        move_uploaded_file($cv['tmp_name'], $folder.'/'.$filename);
    }
}

?>
    <div class="max-w-5xl mx-auto">
        <h1 class="text-3xl text-center">Postuler</h1>

        <?php if (!empty($errors)) { ?>
            <div class="bg-red-300 p-5 rounded border border-red-800 text-red-800 my-4">
                <?php foreach ($errors as $error) { ?>
                    <p><?= $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if (isSubmit() && empty($errors)) { ?>
            <h2 class="text-green-500 text-center my-4">Merci pour votre CV <?= $firstname; ?>.</h2>
        <?php } ?>

        <form action="" method="post" enctype="multipart/form-data" class="w-1/2 mx-auto">
            <div class="mb-3">
                <label for="firstname" class="block">Prénom</label>
                <input class="w-full" type="text" name="firstname" id="firstname">
            </div>
            <div class="mb-3">
                <label for="cv" class="block">Votre CV</label>
                <input class="w-full text-slate-500 file:border-0 file:my-4 file:mr-4 focus:outline-0 file:py-2 file:px-4 file:rounded-full file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 file:cursor-pointer" type="file" name="cv" id="cv">
            </div>

            <button class="w-full bg-blue-400 hover:bg-blue-600 px-4 py-2 text-white rounded-lg shadow">Postuler</button>
        </form>
    </div>
<?php require __DIR__.'/partials/footer.php'; ?>
