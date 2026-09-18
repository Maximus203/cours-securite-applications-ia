<?php
// Connexion PDO SQLite. La base est recreee a partir de schema.sql si elle
// n'existe pas encore -- pratique pour repartir de zero pendant l'exercice.

function connexionBD(): PDO {
    $cheminBD = __DIR__ . '/../senmarket.sqlite';
    $premiereCreation = !file_exists($cheminBD);

    $pdo = new PDO('sqlite:' . $cheminBD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($premiereCreation) {
        $sql = file_get_contents(__DIR__ . '/../schema.sql');
        $pdo->exec($sql);
    }

    return $pdo;
}
