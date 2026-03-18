<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?= $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?php echo $data['display']; ?> justify-content-center">
        <div class="col-10 text-begin text-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/ZangeressenController/create" method="POST">
                <div class="form-group">
                    <label for="naam">Naam:</label>
                    <input type="text" class="form-control" id="naam" name="naam" required>
                </div>
                <div class="form-group">
                    <label for="nettoWaarde">Netto Waarde:</label>
                    <input type="number" class="form-control" id="nettoWaarde" name="nettoWaarde" required>
                </div>
                <div class="form-group">
                    <label for="land">Land:</label>
                    <input type="text" class="form-control" id="land" name="land" required>
                </div>
                <div class="form-group">
                    <label for="leeftijd">Leeftijd:</label>
                    <input type="number" class="form-control" id="leeftijd" name="leeftijd" required>
                </div>
                <div class="form-group">
                    <label for="bekendsteNummer">Bekendste Nummer:</label>
                    <input type="text" class="form-control" id="bekendsteNummer" name="bekendsteNummer" required>
                </div>
                <div class="form-group">
                    <label for="debuut">Debuut:</label>
                    <input type="date" class="form-control" id="debuut" name="debuut" required>
                </div>
                <button type="submit" class="btn btn-primary">Toevoegen</button>
            </form>

            <a href="<?= URLROOT; ?>/Homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>