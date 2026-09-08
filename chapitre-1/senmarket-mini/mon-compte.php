<?php
session_start();
require __DIR__ . '/includes/db.php';

if (!isset($_SESSION['utilisateur_id'])) {
    header('Location: login.php');
    exit;
}

$pdo = connexionBD();
$stmt = $pdo->prepare('SELECT * FROM commandes WHERE utilisateur_id = ?');
$stmt->execute([$_SESSION['utilisateur_id']]);
$commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="utf-8"><title>SenMarket -- Mon compte</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Bonjour <?= htmlspecialchars($_SESSION['nom']) ?></h1>
<p><a href="logout.php">Se deconnecter</a></p>
<h2>Mes commandes</h2>
<ul>
<?php foreach ($commandes as $c): ?>
  <li>
    Commande n°<?= (int)$c['id'] ?> --
    <a href="commande.php?id=<?= (int)$c['id'] ?>"><?= htmlspecialchars($c['produit']) ?></a>
  </li>
<?php endforeach; ?>
</ul>
<p><a href="avis.php">Voir les avis produits</a></p>
</body>
</html>
