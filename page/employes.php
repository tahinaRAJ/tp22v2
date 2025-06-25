<?php
require("../inc/fonctions.php");

if (!isset($_GET['dept_no'])) {
    echo "Département non spécifié.";
    exit;
}

$dept_no = $_GET['dept_no'];
$employes = afficher_employes_par_departement($dept_no);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employés du département</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Liste des employés du département <?= htmlspecialchars($dept_no) ?></h1>
    </header>
    <main>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employes as $emp): ?>
                <tr>
                    <td><?= htmlspecialchars($emp['emp_no']) ?></td>
                    <td><?= htmlspecialchars($emp['last_name']) ?></td>
                    <td><?= htmlspecialchars($emp['first_name']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
