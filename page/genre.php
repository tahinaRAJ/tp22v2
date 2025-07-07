<?php
require("../inc/fonctions.php");

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 20;
$offset = ($page - 1) * $limit;

$departement = isset($_POST['departement']) ? $_POST['departement'] : '';
$departements = Details($departement, $limit, $offset);

$total = count_employees_by_department($departement);
$totalPages = ceil($total / $limit);

$previousPage = get_previous_page($page);
$nextPage = get_next_page($page, $totalPages);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats par département | RH</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h4 mb-0"><i class="bi bi-search me-2"></i>Résultats par département</h2>
                    <span class="badge bg-light text-dark fs-6">
                        <?= count($departements) ?> résultat(s) trouvé(s)
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th><i class="bi bi-person me-1"></i>Prénom</th>
                                <th><i class="bi bi-person-vcard me-1"></i>Nom</th>
                                <th><i class="bi bi-cash me-1"></i>Salaire</th>
                                <th><i class="bi bi-gender-ambiguous me-1"></i>Genre</th>
                                <th><i class="bi bi-building me-1"></i>Département</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($departements as $emp): ?>
                                <tr>
                                    <td><?= htmlspecialchars($emp['first_name']) ?></td>
                                    <td><?= htmlspecialchars($emp['last_name']) ?></td>
                                    <td><?= htmlspecialchars($emp['salary']) ?></td>
                                    <td><?= htmlspecialchars($emp['gender']) ?></td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            <?= htmlspecialchars($emp['dept_name']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <nav aria-label="Navigation des résultats">
                    <ul class="pagination justify-content-center mt-4">
                        <?php if ($previousPage): ?>
                            <li class="page-item">
                                <form method="post" action="?page=<?= $previousPage ?>" class="page-link-form">
                                    <input type="hidden" name="departement" value="<?= htmlspecialchars($departement) ?>">
                                    <button type="submit" class="page-link">
                                        <i class="bi bi-chevron-left"></i> Précédent
                                    </button>
                                </form>
                            </li>
                        <?php endif; ?>

                        <li class="page-item active">
                            <span class="page-link">Page <?= $page ?> sur <?= $totalPages ?></span>
                        </li>

                        <?php if ($nextPage): ?>
                            <li class="page-item">
                                <form method="post" action="?page=<?= $nextPage ?>" class="page-link-form">
                                    <input type="hidden" name="departement" value="<?= htmlspecialchars($departement) ?>">
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
                <a href="search.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Nouvelle recherche
                </a>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>