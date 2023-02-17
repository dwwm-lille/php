<?php require __DIR__.'/partials/header.php';

$videos = [
    'Origami Phoenix' => 'hKQHJEZF6YQ',
    'Origami Hercule' => 'F-zQOAwSuHg',
    'Origami Diamond' => 'LqS88aVasA4',
    'Origami Reindeer' => '-vmdSULzPbM',
];

?>

    <div class="max-w-5xl mx-auto py-8">
        <h1 class="text-3xl text-center">Nos vidéos</h1>

        <div class="flex justify-between">
            <?php foreach ($videos as $name => $id) { ?>
            <a class="bg-blue-500 px-3 py-2 text-white" href="video.php?id=<?= $id; ?>"><?= $name; ?></a>
            <?php } ?>
        </div>
    </div>

<?php require __DIR__.'/partials/footer.php'; ?>
