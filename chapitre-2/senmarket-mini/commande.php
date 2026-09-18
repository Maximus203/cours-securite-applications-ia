<?php
session_start();
require __DIR__ . '/includes/db.php';

if (!isset($_SESSION['utilisateur_id'])) {
    header('Location: login.php');
    exit;
}

// VULNERABLE : on verifie bien qu'il y a une session (authentification),
// mais jamais que la commande demandee appartient a la personne connectee
// (autorisation). C'est exactement la distinction du chapitre 1.
$id = (int)($_GET['id'] ?? 0);
$pdo = connexionBD();
$stmt = $pdo->prepare('SELECT * FROM commandes WHERE id = ?');
$stmt->execute([$id]);
$commande = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$commande) {
    http_response_code(404);
    echo 'Commande introuvable.';
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="utf-8"><title>SenMarket -- Commande</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Détail de la commande n°<?= (int)$commande['id'] ?></h1>
<p>Produit : <?= htmlspecialchars($commande['produit']) ?></p>
<p>Montant : <?= (int)$commande['montant_fcfa'] ?> FCFA</p>
<p>Adresse de livraison : <?= htmlspecialchars($commande['adresse_livraison']) ?></p>
<p><a href="mon-compte.php">Retour à mon compte</a></p>
</body>
</html>
