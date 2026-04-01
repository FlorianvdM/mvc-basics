<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container py-5">
    <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4 fw-bold mb-3"><?php echo $data['title']; ?></h1>
            <p class="lead text-muted">Welkom bij MVC Basics. Selecteer een categorie in de navbar of hieronder om de CRUD functionaliteit te bekijken.</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Smartphones -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 homepage-card">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <i class="bi bi-phone"></i> Smartphones
                    </h5>
                    <p class="card-text text-muted small flex-grow-1">Beheer een overzicht van smartphones met merk, model, prijs en specificaties.</p>
                    <a href="<?= URLROOT; ?>/SmartphoneController/index" class="btn btn-primary mt-3 w-100">Bekijk Smartphones</a>
                </div>
            </div>
        </div>

        <!-- Sneakers -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 homepage-card">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <i class="bi bi-shop"></i> Sneakers
                    </h5>
                    <p class="card-text text-muted small flex-grow-1">Beheer een overzicht van sneakers met merk, model en type.</p>
                    <a href="<?= URLROOT; ?>/SneakersController/index" class="btn btn-primary mt-3 w-100">Bekijk Sneakers</a>
                </div>
            </div>
        </div>

        <!-- Horloges -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 homepage-card">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <i class="bi bi-watch"></i> Horloges
                    </h5>
                    <p class="card-text text-muted small flex-grow-1">Beheer een overzicht van luxe horloges met merk, model, prijs en materiaal.</p>
                    <a href="<?= URLROOT; ?>/HorlogesController/index" class="btn btn-primary mt-3 w-100">Bekijk Horloges</a>
                </div>
            </div>
        </div>

        <!-- Zangeressen -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 homepage-card">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <i class="bi bi-music-note-beamed"></i> Zangeressen
                    </h5>
                    <p class="card-text text-muted small flex-grow-1">Beheer een overzicht van de rijkste zangeressen ter wereld.</p>
                    <a href="<?= URLROOT; ?>/ZangeressenController/index" class="btn btn-primary mt-3 w-100">Bekijk Zangeressen</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>