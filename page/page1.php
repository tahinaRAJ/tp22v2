<?php
require("../inc/fonctions.php");
$departement = afficher_departement();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Départements | RH</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h4 mb-0"><i class="bi bi-building me-2"></i>Liste des départements</h2>
                    <a href="formulaire.php" class="btn btn-light btn-sm">
                        <i class="bi bi-search me-1"></i>Rechercher
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="w-40"><i class="bi bi-building me-1"></i>Nom du département</th>
                                <th class="w-35"><i class="bi bi-person-badge me-1"></i>Manager actuel</th>
                                <th class="w-25"><i class="bi bi-gear me-1"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($departement as $dept): ?>
                            <tr>
                                <td>
                                    <a href="employes.php?dept_no=<?= urlencode($dept['dept_no']) ?>" 
                                       class="text-decoration-none fw-semibold">
                                        <i class="bi bi-folder2-open me-2 text-primary"></i>
                                        <?= htmlspecialchars($dept['dept_name']) ?>
                                    </a>
                                </td>
                                <td>
                                    <?php 
                                    $managers = afficher_current_manager($dept['dept_no']);
                                    if (!empty($managers)) {
                                        foreach ($managers as $manager) {
                                            echo '<span class="badge bg-info text-dark me-1">';
                                            echo '<i class="bi bi-person-fill-gear me-1"></i>';
                                            echo htmlspecialchars($manager['first_name']) . ' ' . htmlspecialchars($manager['last_name']);
                                            echo '</span>';
                                        }
                                    } else {
                                        echo '<span class="badge bg-secondary">';
                                        echo '<i class="bi bi-person-x me-1"></i>Aucun manager';
                                        echo '</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="employes.php?dept_no=<?= urlencode($dept['dept_no']) ?>" 
                                           class="btn btn-sm btn-outline-primary flex-grow-1">
                                            <i class="bi bi-people-fill me-1"></i>Employés
                                        </a>
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
                    <i class="bi bi-database me-1"></i>Total : <?= count($departement) ?> départements
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