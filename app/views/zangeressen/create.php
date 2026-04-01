<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <!-- Terugkoppeling naar de gebruiker (success only) -->
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-<?= $data['color'] ?? 'success'; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/ZangeressenController/create" method="post">
                <div class="mb-3">
                    <label for="naam" class="form-label">Naam</label>
                    <input name="naam" type="text" class="form-control <?= isset($data['errors']['naam']) ? 'is-invalid' : ''; ?>" id="naam" value="<?= $_POST['naam'] ?? ''; ?>">
                    <?php if (isset($data['errors']['naam'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['naam']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="waarde" class="form-label">Netto Waarde (miljoen)</label>
                    <input name="waarde" type="number" class="form-control <?= isset($data['errors']['waarde']) ? 'is-invalid' : ''; ?>" id="waarde" value="<?= $_POST['waarde'] ?? ''; ?>">
                    <?php if (isset($data['errors']['waarde'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['waarde']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="land" class="form-label">Land</label>
                    <input name="land" type="text" class="form-control <?= isset($data['errors']['land']) ? 'is-invalid' : ''; ?>" id="land" value="<?= $_POST['land'] ?? ''; ?>">
                    <?php if (isset($data['errors']['land'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['land']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="leeftijd" class="form-label">Leeftijd</label>
                    <input name="leeftijd" type="number" class="form-control <?= isset($data['errors']['leeftijd']) ? 'is-invalid' : ''; ?>" id="leeftijd" value="<?= $_POST['leeftijd'] ?? ''; ?>">
                    <?php if (isset($data['errors']['leeftijd'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['leeftijd']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="nummer" class="form-label">Bekendste Nummer</label>
                    <input name="nummer" type="text" class="form-control <?= isset($data['errors']['nummer']) ? 'is-invalid' : ''; ?>" id="nummer" value="<?= $_POST['nummer'] ?? ''; ?>">
                    <?php if (isset($data['errors']['nummer'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['nummer']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="jaar" class="form-label">Debuutjaar</label>
                    <input name="jaar" type="number" class="form-control <?= isset($data['errors']['jaar']) ? 'is-invalid' : ''; ?>" id="jaar" value="<?= $_POST['jaar'] ?? ''; ?>">
                    <?php if (isset($data['errors']['jaar'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['jaar']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="d-flex justify-content-between mt-3 mb-5">
                    <button type="submit" class="btn btn-primary">Verstuur</button>
                    <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Terug naar homepage
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>