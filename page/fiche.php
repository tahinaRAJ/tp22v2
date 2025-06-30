<?php
require("../inc/fonctions.php");
$fiche = fiche_employe($_GET['code']);
$salaire = salary_history($_GET['code']);
$emplois = afficher_emploi($_GET['code']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header><h1>Fiche de l'employé</h1></header>
        <main>
            <table class="table table-bordered table-striped" id="ficheTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Genre</th>
                        <th>Date d'embauche</th>
                        <th>Département</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= htmlspecialchars($fiche['emp_no']) ?></td>
                        <td><?= htmlspecialchars($fiche['last_name']) ?></td>
                        <td><?= htmlspecialchars($fiche['first_name']) ?></td>
                        <td><?= htmlspecialchars($fiche['birth_date']) ?></td>
                        <td><?= htmlspecialchars($fiche['gender']) ?></td>
                        <td><?= htmlspecialchars($fiche['hire_date']) ?></td>
                        <td><?= htmlspecialchars($fiche['dept_name']) ?></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered table-striped" id="salaryTable">
                <thead>
                    <h1>Historique des salaires</h1>
                    <tr>
                        <th>Salaire</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($salaire as $sal): ?>
                    <tr>
                        <td><?= htmlspecialchars($sal['salary']) ?></td>
                        <td><?= htmlspecialchars($sal['from_date']) ?></td>
                        <td><?= htmlspecialchars($sal['to_date']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                 </table>
            <table class="table table-bordered table-striped" id="emploiTable">
                <thead>
                    <h1>Emploi</h1>
                    <tr>
                        <th>Poste</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($emplois as $empl): ?>
                    <tr>
                        <td><?= htmlspecialchars($empl['title']) ?></td>
                        <td><?= htmlspecialchars($empl['from_date']) ?></td>
                        <td><?= htmlspecialchars($empl['to_date']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </main>
</body>
</html>