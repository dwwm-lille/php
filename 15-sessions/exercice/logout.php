<?php

require __DIR__.'/config/functions.php';

// On déconnecte
unset($_SESSION['user']);

// On redirige
header('Location: index.php');
