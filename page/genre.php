<?php
require("../inc/fonctions.php");

$departement = isset($_POST['departement']) ? $_POST['departement'] : '';
$statistics = Details($departement);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques par genre | RH</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="h4 mb-0"><i class="bi bi-bar-chart-line me-2"></i>Statistiques par genre</h2>
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th><i class="bi bi-gender-ambiguous me-1"></i>Genre</th>
                            <th><i class="bi bi-people me-1"></i>Nombre d'employés</th>
                            <th><i class="bi bi-cash me-1"></i>Salaire moyen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statistics as $stat): ?>
                            <tr>
                                <td><?= htmlspecialchars($stat['gender']) ?></td>
                                <td><?= htmlspecialchars($stat['total_employees']) ?></td>
                                <td><?= number_format($stat['average_salary'], 2) ?> €</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>