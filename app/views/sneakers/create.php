<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?php echo $data['display']; ?> justify-content-center">
        <div class="col-6 text-begin text-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/SneakersController/create" method="POST">
                <div class="mb-3">
                    <label for="merk">Merk:</label>
                    <input type="text" class="form-control" id="merk" name="merk" required>
                </div>
                <div class="form-group">
                    <label for="model">Model:</label>
                    <input type="text" class="form-control" id="model" name="model" required>
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" id="type" name="type" required>
                </div>
                <div class="form-group">
                    <label for="prijs">Prijs:</label>
                    <input type="number" class="form-control" id="prijs" name="prijs" required>
                </div>
                <div class="form-group">
                    <label for="materiaal">Materiaal:</label>
                    <input type="text" class="form-control" id="materiaal" name="materiaal" required>
                </div>
                <div class="form-group">
                    <label for="gewicht">Gewicht:</label>
                    <input type="number" class="form-control" id="gewicht" name="gewicht" required>
                </div>
                <div class="form-group">
                    <label for="releasedatum">Releasedatum:</label>
                    <input type="date" class="form-control" id="releasedatum" name="releasedatum" required>
                </div>
                <button type="submit" class="btn btn-primary">Toevoegen</button>
            </form>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>