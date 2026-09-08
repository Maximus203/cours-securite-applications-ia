<?php
session_start();
require __DIR__ . '/includes/db.php';

$pdo = connexionBD();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['utilisateur_id'])) {
    $produit = $_POST['produit'] ?? '';
    $texte = $_POST['texte'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO avis (produit, auteur, texte) VALUES (?, ?, ?)');
    $stmt->execute([$produit, $_SESSION['nom'], $texte]);
}

$avis = $pdo->query('SELECT * FROM avis ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="utf-8"><title>SenMarket -- Avis produits</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Avis produits</h1>

<?php if (isset($_SESSION['utilisateur_id'])): ?>
<form method="post">
  <label>Produit <input type="text" name="produit"></label>
  <label>Ton avis <textarea name="texte"></textarea></label>
  <button type="submit">Publier</button>
</form>
<?php else: ?>
<p><a href="login.php">Connecte-toi</a> pour laisser un avis.</p>
<?php endif; ?>

<ul>
<?php foreach ($avis as $a): ?>
  <li>
    <strong><?= htmlspecialchars($a['produit']) ?></strong>
    par <?= htmlspecialchars($a['auteur']) ?> :
    <!-- VULNERABLE : le texte de l'avis est affiche tel quel, sans
         htmlspecialchars(). Un avis contenant une balise <script> s'execute
         dans le navigateur de quiconque consulte cette page. -->
    <?= $a['texte'] ?>
  </li>
<?php endforeach; ?>
</ul>
<p><a href="mon-compte.php">Retour à mon compte</a></p>
</body>
</html>
