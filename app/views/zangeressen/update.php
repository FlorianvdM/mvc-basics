<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php // var_dump($_POST); ?>
<?php // var_dump($data['zangeres']); ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?= $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?php echo $data['display']; ?> justify-content-center">
        <div class="col-10 text-begin text-primary">
            <div class="alert alert-<?= $data['color']; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/ZangeressenController/update" method="POST">
                <div class="form-group">
                    <label for="naam">Naam:</label>
                    <input name="naam" type="text" class="form-control" id="naam" value="<?= $_POST['naam'] ?? $data['zangeres']->Naam; ?>" >
                </div>
                <div class="form-group">
                    <label for="nettoWaarde">Netto Waarde:</label>
                    <input name="nettoWaarde" type="number" class="form-control" id="nettoWaarde" value="<?= $_POST['nettoWaarde'] ?? $data['zangeres']->NettoWaarde; ?>" >
                </div>
                <div class="form-group">
                    <label for="land">Land:</label>
                    <input name="land" type="text" class="form-control" id="land" value="<?= $_POST['land'] ?? $data['zangeres']->Land; ?>" >
                </div>
                <div class="form-group">
                    <label for="leeftijd">Leeftijd:</label>
                    <input name="leeftijd" type="number" class="form-control" id="leeftijd" value="<?= $_POST['leeftijd'] ?? $data['zangeres']->Leeftijd; ?>" >
                </div>
                <div class="form-group">
                    <label for="bekendsteNummer">Bekendste Nummer:</label>
                    <input name="bekendsteNummer" type="text" class="form-control" id="bekendsteNummer" value="<?= $_POST['bekendsteNummer'] ?? $data['zangeres']->BekendsteNummer; ?>" >
                </div>
                <div class="form-group">
                    <label for="debuut">Debuut:</label>
                    <input name="debuut" type="date" class="form-control" id="debuut" value="<?= $_POST['debuut'] ?? $data['zangeres']->Debuut; ?>" >
                </div>
                <input type="hidden" name="Id" value="<?= $_POST['Id'] ?? $data['zangeres']->Id; ?>">
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>

            <a href="<?= URLROOT; ?>/Homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>