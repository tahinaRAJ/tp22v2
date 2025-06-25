<?php
require("../inc/fonctions.php");
$departement = afficher_departement();
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
    <header>
        <h1>Liste des département<h1>
    </header>
    <main>
        <table class="table table-bordered table-striped" id="departementTable">
            <head>
                <tr>
                    <th>Numéro</th>
                    <th>Nom</th>
                </tr>
            <head>
            <body>
                <?php foreach ($departement as $dept): ?>
                <tr>
                    <td>
                        <a href="employes.php?dept_no=<?= urlencode($dept['dept_no']) ?>">
                            <?= htmlspecialchars($dept['dept_no']) ?>
                        </a>
                    </td>
                    <td>
                        <a href="employes.php?dept_no=<?= urlencode($dept['dept_no']) ?>">
                            <?= htmlspecialchars($dept['dept_name']) ?>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </body>
    </main>
    

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>