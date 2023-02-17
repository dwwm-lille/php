<?php require __DIR__.'/partials/header.php';

$id = $_GET['id'] ?? null;
$theme = $_GET['theme'] ?? '#fff';
?>
    <?php if ($id) { ?>
        <div style="background-color: <?= $theme; ?>">
            <div class="max-w-5xl mx-auto py-8">
                <h1 class="text-3xl text-center">Vidéo <?= $id; ?></h1>
                <a class="bg-blue-500 px-3 py-2 text-white my-6 inline-block" href="videos.php">Retour</a>

                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $id; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                <form action="" method="get" class="mt-4">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="color" name="theme" value="<?= $theme; ?>">
                    <button>Changer le thème</button>
                </form>
            </div>
        </div>
    <?php } else {
        require '404.php';
    } ?>

<?php require __DIR__.'/partials/footer.php'; ?>
