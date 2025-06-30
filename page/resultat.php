<?php
require("../inc/fonctions.php");
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 20;
$offset = ($page - 1) * $limit;

$departement = isset($_POST['departement']) ? $_POST['departement'] : '';
$current = isset($_POST['current']) ? $_POST['current'] : '';
$ageMin = isset($_POST['ageMin']) ? $_POST['ageMin'] : '';
$ageMax = isset($_POST['ageMax']) ? $_POST['ageMax'] : '';


$resultats = Formulaire($departement, $current, $ageMin, $ageMax, $limit, $offset);

$total = count_total_employes($departement, $current, $ageMin, $ageMax);
$totalPages = ceil($total / $limit);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de la recherche</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main class="container mt-4">
        <h2>Résultats de la recherche</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Département</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultats as $emp): ?>
                    <tr>
                        <td><?= htmlspecialchars($emp['emp_no']) ?></td>
                        <td><?= htmlspecialchars($emp['last_name']) ?></td>
                        <td><?= htmlspecialchars($emp['first_name']) ?></td>
                        <td><?= htmlspecialchars($emp['dept_name']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <form method="post" action="?page=<?= $page - 1 ?>">
                            <input type="hidden" name="departement" value="<?= htmlspecialchars($departement) ?>">
                            <input type="hidden" name="current" value="<?= htmlspecialchars($current) ?>">
                            <input type="hidden" name="ageMin" value="<?= htmlspecialchars($ageMin) ?>">
                            <input type="hidden" name="ageMax" value="<?= htmlspecialchars($ageMax) ?>">
                            <button type="submit" class="page-link">Précédent</button>
                        </form>
                    </li>
                <?php endif; ?>
                <?php if ($page < $totalPages): ?>
                    <li class="page-item">
                        <form method="post" action="?page=<?= $page + 1 ?>">
                            <input type="hidden" name="departement" value="<?= htmlspecialchars($departement) ?>">
                            <input type="hidden" name="current" value="<?= htmlspecialchars($current) ?>">
                            <input type="hidden" name="ageMin" value="<?= htmlspecialchars($ageMin) ?>">
                            <input type="hidden" name="ageMax" value="<?= htmlspecialchars($ageMax) ?>">
                            <button type="submit" class="page-link">Suivant</button>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </main>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>