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
            <form action="<?= URLROOT; ?>/HorlogesController/update" method="post">
                <input type="hidden" name="id" value="<?= $data['horloge']->Id; ?>">
                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>" id="merk" value="<?= $_POST['merk'] ?? $data['horloge']->Merk; ?>">
                    <?php if (isset($data['errors']['merk'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['merk']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text" class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>" id="model"
                        value="<?= $_POST['model'] ?? $data['horloge']->Model; ?>">
                    <?php if (isset($data['errors']['model'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['model']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number" class="form-control <?= isset($data['errors']['prijs']) ? 'is-invalid' : ''; ?>" id="prijs"
                        value="<?= $_POST['prijs'] ?? $data['horloge']->Prijs; ?>">
                    <?php if (isset($data['errors']['prijs'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['prijs']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="materiaal" class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" class="form-control <?= isset($data['errors']['materiaal']) ? 'is-invalid' : ''; ?>" id="materiaal"
                        value="<?= $_POST['materiaal'] ?? $data['horloge']->Materiaal; ?>">
                    <?php if (isset($data['errors']['materiaal'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['materiaal']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text" class="form-control <?= isset($data['errors']['type']) ? 'is-invalid' : ''; ?>" id="type" value="<?= $_POST['type'] ?? $data['horloge']->Type; ?>">
                    <?php if (isset($data['errors']['type'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['type']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="kenmerk" class="form-label">Uniek Kenmerk</label>
                    <input name="kenmerk" type="text" class="form-control <?= isset($data['errors']['kenmerk']) ? 'is-invalid' : ''; ?>" id="kenmerk"
                        value="<?= $_POST['kenmerk'] ?? $data['horloge']->UniekKenmerk; ?>">
                    <?php if (isset($data['errors']['kenmerk'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['kenmerk']; ?></div>
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