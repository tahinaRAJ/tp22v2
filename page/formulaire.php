<?php
require("../inc/fonctions.php");
$departement = afficher_departement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Recherche</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header> Rechercher un employé</header>
        <main>
            <form method="POST" action="resultat.php">
                <div class="mb-3">
                    <label for="departement" class="form-label">Département</label>
                    <select name="departement" id="departement" class="form-select">
                        <?php foreach ($departement as $dept): ?>
                            <option value="<?= htmlspecialchars($dept['dept_no']) ?>"><?= htmlspecialchars($dept['dept_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="current" class="form-label">Nom</label>
                    <input type="text" name="current" id="current" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="ageMin" class="form-label">Âge minimum</label>
                    <input type="number" name="ageMin" id="ageMin" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="ageMax" class="form-label">Âge maximum</label>
                    <input type="number" name="ageMax" id="ageMax" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </main>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>