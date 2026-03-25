<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php // var_dump($_POST); ?>
<?php // var_dump($data['sneaker']); ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?php echo $data['display']; ?> justify-content-center">
        <div class="col-6 text-begin text-primary">
            <div class="alert alert-<?= $data['color']; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/SneakersController/update" method="POST">
                <div class="mb-3">
                    <label for="merk">Merk:</label>
                    <input name="merk" type="text" class="form-control" id="merk" value="<?= $_POST['merk'] ?? $data['sneaker']->Merk; ?>" >
                </div>
                <div class="form-group">
                    <label for="model">Model:</label>
                    <input name="model" type="text" class="form-control" id="model" value="<?= $_POST['model'] ?? $data['sneaker']->Model; ?>" >
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <input name="type" type="text" class="form-control" id="type" value="<?= $_POST['type'] ?? $data['sneaker']->Type; ?>" >
                </div>
                <div class="form-group">
                    <label for="prijs">Prijs:</label>
                    <input name="prijs" type="number" class="form-control" id="prijs" value="<?= $_POST['prijs'] ?? $data['sneaker']->Prijs; ?>" >
                </div>
                <div class="form-group">
                    <label for="materiaal">Materiaal:</label>
                    <input name="materiaal" type="text" class="form-control" id="materiaal" value="<?= $_POST['materiaal'] ?? $data['sneaker']->Materiaal; ?>" >
                </div>
                <div class="form-group">
                    <label for="gewicht">Gewicht:</label>
                    <input name="gewicht" type="number" class="form-control" id="gewicht" value="<?= $_POST['gewicht'] ?? $data['sneaker']->Gewicht; ?>" >
                </div>
                <div class="form-group">
                    <label for="releasedatum">Releasedatum:</label>
                    <input name="releasedatum" type="date" class="form-control" id="releasedatum" value="<?= $_POST['releasedatum'] ?? $data['sneaker']->Releasedatum; ?>" >
                </div>
                <input type="hidden" name="Id" value="<?= $_POST['Id'] ?? $data['sneaker']->Id; ?>">
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>