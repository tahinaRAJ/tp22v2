<?php
require("../inc/fonctions.php");
$fiche = fiche_employe($_GET['code']);
$salaire = salary_history($_GET['code']);
$emplois = afficher_emploi($_GET['code']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Employé | RH</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h4 mb-0"><i class="bi bi-file-earmark-person me-2"></i>Fiche Employé</h2>
                    <a href="javascript:history.back()" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left me-1"></i>Retour
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                <!-- Section Informations Personnelles -->
                <div class="row mb-5">
                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <div class="bg-secondary bg-opacity-10 p-4 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 150px; height: 150px;">
                            <i class="bi bi-person-badge fs-1 text-primary"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h3 class="mb-3"><?= htmlspecialchars($fiche['first_name']) ?> <?= htmlspecialchars($fiche['last_name']) ?></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mb-2"><strong><i class="bi bi-person-vcard me-2"></i>ID :</strong> <?= htmlspecialchars($fiche['emp_no']) ?></p>
                                <p class="mb-2"><strong><i class="bi bi-calendar-event me-2"></i>Date de naissance :</strong> <?= htmlspecialchars($fiche['birth_date']) ?></p>
                                <p class="mb-2"><strong><i class="bi bi-gender-<?= strtolower($fiche['gender']) == 'm' ? 'male' : 'female' ?> me-2"></i>Genre :</strong> <?= htmlspecialchars($fiche['gender']) ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2"><strong><i class="bi bi-briefcase me-2"></i>Date d'embauche :</strong> <?= htmlspecialchars($fiche['hire_date']) ?></p>
                                <p class="mb-2"><strong><i class="bi bi-building me-2"></i>Département :</strong> <?= htmlspecialchars($fiche['dept_name']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Historique des Salaires -->
                <div class="mb-5">
                    <h4 class="border-bottom pb-2 mb-3"><i class="bi bi-cash-stack me-2"></i>Historique des Salaires</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th><i class="bi bi-currency-dollar me-1"></i>Salaire</th>
                                    <th><i class="bi bi-calendar-check me-1"></i>Date début</th>
                                    <th><i class="bi bi-calendar-x me-1"></i>Date fin</th>
                                    <th><i class="bi bi-graph-up me-1"></i>Évolution</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($salaire as $index => $sal): ?>
                                <tr>
                                    <td class="fw-semibold"><?= number_format($sal['salary'], 2, ',', ' ') ?> €</td>
                                    <td><?= htmlspecialchars($sal['from_date']) ?></td>
                                    <td><?= htmlspecialchars($sal['to_date']) ?></td>
                                    <td>
                                        <?php if ($index > 0): ?>
                                            <?php $evolution = (($sal['salary'] - $salaire[$index-1]['salary']) / $salaire[$index-1]['salary'] * 100); ?>
                                            <span class="badge <?= $evolution >= 0 ? 'bg-success' : 'bg-danger' ?>">
                                                <?= number_format($evolution, 2) ?>%
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Premier salaire</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Section Historique des Postes -->
                <div class="mb-3">
                    <h4 class="border-bottom pb-2 mb-3"><i class="bi bi-briefcase me-2"></i>Historique des Postes</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th><i class="bi bi-person-workspace me-1"></i>Poste</th>
                                    <th><i class="bi bi-calendar-check me-1"></i>Date début</th>
                                    <th><i class="bi bi-calendar-x me-1"></i>Date fin</th>
                                    <th><i class="bi bi-clock-history me-1"></i>Durée</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($emplois as $empl): ?>
                                <tr>
                                    <td class="fw-semibold"><?= htmlspecialchars($empl['title']) ?></td>
                                    <td><?= htmlspecialchars($empl['from_date']) ?></td>
                                    <td><?= htmlspecialchars($empl['to_date']) ?></td>
                                    <td>
                                        <?php
                                        $start = new DateTime($empl['from_date']);
                                        $end = new DateTime($empl['to_date']);
                                        $interval = $start->diff($end);
                                        echo $interval->y > 0 ? $interval->y . ' an(s) ' : '';
                                        echo $interval->m > 0 ? $interval->m . ' mois' : '';
                                        ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="card-footer bg-transparent d-flex justify-content-between">
                <a href="javascript:history.back()" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Retour
                </a>
                <div>
                    <button class="btn btn-outline-primary me-2">
                        <i class="bi bi-printer me-1"></i>Imprimer
                    </button>
                    <button class="btn btn-primary">
                        <i class="bi bi-pencil-square me-1"></i>Modifier
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>