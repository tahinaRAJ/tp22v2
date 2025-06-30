<?php
require("../inc/fonctions.php");

if (!isset($_GET['dept_no'])) {
    echo "Département non spécifié.";
    exit;
}

$dept_no = $_GET['dept_no'];
$employes = afficher_employes_par_departement($dept_no);
?>

<!DOCTYPE html>s
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employés du département | RH</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h4 mb-0">
                        <i class="bi bi-people-fill me-2"></i>
                        Employés du département :
                        <?= isset($departement_info['dept_name']) ? htmlspecialchars($departement_info['dept_name']) : htmlspecialchars($dept_no) ?>
                    </h2>
                    <a href="javascript:history.back()" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left me-1"></i>Retour
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="alert alert-info mb-4">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    <?= count($employes) ?> employé(s) trouvé(s) dans ce département.
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="w-15">ID</th>
                                <th class="w-30">Nom</th>
                                <th class="w-30">Prénom</th>
                                <th class="w-25">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employes as $emp): ?>
                                <tr>
                                    <td class="fw-semibold"><?= htmlspecialchars($emp['emp_no']) ?></td>
                                    <td>
                                        <a href="fiche.php?code=<?= urlencode($emp['emp_no']) ?>"
                                            class="text-decoration-none">
                                            <?= htmlspecialchars($emp['last_name']) ?>
                                        </a>
                                    </td>
                                    <td><?= htmlspecialchars($emp['first_name']) ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="fiche.php?code=<?= urlencode($emp['emp_no']) ?>"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-file-earmark-person me-1"></i>Fiche
                                            </a>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-envelope me-1"></i>Contacter
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-transparent d-flex justify-content-between">
                <small class="text-muted">
                    <i class="bi bi-database me-1"></i>Département : <?= htmlspecialchars($dept_no) ?>
                </small>
                <small class="text-muted">
                    <i class="bi bi-clock-history me-1"></i>Mis à jour : <?= date('d/m/Y H:i') ?>
                </small>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>