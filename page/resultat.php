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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche | RH</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h4 mb-0"><i class="bi bi-search me-2"></i>Résultats de la recherche</h2>
                    <span class="badge bg-light text-dark fs-6">
                        <?= count($resultats) ?> résultat(s) trouvé(s)
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th><i class="bi bi-person-badge me-1"></i>ID</th>
                                <th><i class="bi bi-person me-1"></i>Nom</th>
                                <th><i class="bi bi-person-vcard me-1"></i>Prénom</th>
                                <th><i class="bi bi-building me-1"></i>Département</th>
                                <th><i class="bi bi-actions me-1"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultats as $emp): ?>
                                <tr>
                                    <td class="fw-semibold"><?= htmlspecialchars($emp['emp_no']) ?></td>
                                    <td><?= htmlspecialchars($emp['last_name']) ?></td>
                                    <td><?= htmlspecialchars($emp['first_name']) ?></td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            <?= htmlspecialchars($emp['dept_name']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="fiche.php?code=<?= urlencode($emp['emp_no']) ?>"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i>Voir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <nav aria-label="Navigation des résultats">
                    <ul class="pagination justify-content-center mt-4">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <form method="post" action="?page=<?= $page - 1 ?>" class="page-link-form">
                                    <input type="hidden" name="departement" value="<?= htmlspecialchars($departement) ?>">
                                    <input type="hidden" name="current" value="<?= htmlspecialchars($current) ?>">
                                    <input type="hidden" name="ageMin" value="<?= htmlspecialchars($ageMin) ?>">
                                    <input type="hidden" name="ageMax" value="<?= htmlspecialchars($ageMax) ?>">
                                    <button type="submit" class="page-link">
                                        <i class="bi bi-chevron-left"></i> Précédent
                                    </button>
                                </form>
                            </li>
                        <?php endif; ?>

                        <li class="page-item active">
                            <span class="page-link">Page <?= $page ?> sur <?= $totalPages ?></span>
                        </li>

                        <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                                <form method="post" action="?page=<?= $page + 1 ?>" class="page-link-form">
                                    <input type="hidden" name="departement" value="<?= htmlspecialchars($departement) ?>">
                                    <input type="hidden" name="current" value="<?= htmlspecialchars($current) ?>">
                                    <input type="hidden" name="ageMin" value="<?= htmlspecialchars($ageMin) ?>">
                                    <input type="hidden" name="ageMax" value="<?= htmlspecialchars($ageMax) ?>">
                                    <button type="submit" class="page-link">
                                        Suivant <i class="bi bi-chevron-right"></i>
                                    </button>
                                </form>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>

            <div class="card-footer bg-transparent">
                <a href="formulaire.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Nouvelle recherche
                </a>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>