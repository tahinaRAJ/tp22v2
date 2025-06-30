<?php
require("../inc/fonctions.php");
$departement = afficher_departement();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'employés | RH</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-primary bg-gradient text-white py-4 text-center">
                        <h2 class="fw-bold mb-1"><i class="bi bi-people-fill me-2"></i>Recherche d'employés</h2>
                        <p class="mb-0 opacity-75"><i class="bi bi-building-gear me-1"></i>Système de gestion RH</p>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="resultat.php">
                            <div class="mb-4">
                                <label for="departement" class="form-label fw-semibold">
                                    <i class="bi bi-building me-2"></i>Département
                                </label>
                                <select name="departement" id="departement" class="form-select form-select-lg">
                                    <option value="" selected disabled><i class="bi bi-list-ul me-2"></i>Choisir un département</option>
                                    <?php foreach ($departement as $dept): ?>
                                        <option value="<?= htmlspecialchars($dept['dept_no']) ?>">
                                            <i class="bi bi-building me-2"></i><?= htmlspecialchars($dept['dept_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="current" class="form-label fw-semibold">
                                    <i class="bi bi-person-vcard me-2"></i>Nom de l'employé
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="current" id="current" class="form-control form-control-lg" placeholder="Entrez le nom complet">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="ageMin" class="form-label fw-semibold">
                                        <i class="bi bi-arrow-down-circle me-2"></i>Âge minimum
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar-minus"></i></span>
                                        <input type="number" name="ageMin" id="ageMin" class="form-control form-control-lg" placeholder="18" min="18">
                                        <span class="input-group-text bg-light">ans</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="ageMax" class="form-label fw-semibold">
                                        <i class="bi bi-arrow-up-circle me-2"></i>Âge maximum
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar-plus"></i></span>
                                        <input type="number" name="ageMax" id="ageMax" class="form-control form-control-lg" placeholder="65" max="65">
                                        <span class="input-group-text bg-light">ans</span>
                                    </div>
                                </div>
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