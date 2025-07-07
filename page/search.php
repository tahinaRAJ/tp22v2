<?php
require("../inc/fonctions.php");
$departement = afficher_departement();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche par département | RH</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-primary bg-gradient text-white py-4 text-center">
                        <h2 class="fw-bold mb-1"><i class="bi bi-building me-2"></i>Recherche par département</h2>
                        <p class="mb-0 opacity-75"><i class="bi bi-gear-fill me-1"></i>Système de gestion RH</p>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="genre.php">
                            <div class="mb-4">
                                <label for="departement" class="form-label fw-semibold">
                                    <i class="bi bi-building me-2"></i>Département
                                </label>
                                <select name="departement" id="departement" class="form-select form-select-lg">
                                    <option value="" selected disabled>Choisir un département</option>
                                    <?php foreach ($departement as $dept): ?>
                                        <option value="<?= htmlspecialchars($dept['dept_name']) ?>">
                                            <?= htmlspecialchars($dept['dept_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="d-grid gap-3 mt-5">
                                <button type="submit" class="btn btn-primary btn-lg py-3 fw-semibold">
                                    <i class="bi bi-search me-2"></i>Lancer la recherche
                                </button>
                                <a href="page1.php" class="btn btn-outline-secondary btn-lg py-3">
                                    <i class="bi bi-list-ul me-2"></i>Voir tous les départements
                                </a>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer bg-transparent text-center py-3 text-muted">
                        <div class="d-flex justify-content-center gap-3 mb-2">
                            <a href="#" class="text-decoration-none"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-decoration-none"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-decoration-none"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-decoration-none"><i class="bi bi-envelope"></i></a>
                        </div>
                        <small class="d-block">
                            <i class="bi bi-c-circle me-1"></i><?= date('Y') ?> Système RH. Tous droits réservés.
                        </small>
                        <small class="d-block mt-1">
                            <i class="bi bi-info-circle me-1"></i>Version 1.0.0
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>