<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php // var_dump($_POST); ?>
<?php // var_dump($data['horloge']); ?>

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
            <form action="<?= URLROOT; ?>/HorlogesController/update" method="POST">
                <div class="form-group">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control" id="merk" value="<?= $_POST['merk'] ?? $data['horloge']->Merk; ?>" >
                </div>
                <div class="form-group">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text" class="form-control" id="model" value="<?= $_POST['model'] ?? $data['horloge']->Model; ?>" >
                </div>
                <div class="form-group">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number" class="form-control" id="prijs" step="0.01" value="<?= $_POST['prijs'] ?? $data['horloge']->Prijs; ?>" >
                </div>
                <div class="form-group">
                    <label for="materiaal" class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" class="form-control" id="materiaal" value="<?= $_POST['materiaal'] ?? $data['horloge']->Materiaal; ?>" >
                </div>
                <div class="form-group">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" id="type" value="<?= $_POST['type'] ?? $data['horloge']->Type; ?>" >
                </div>
                <div class="form-group">
                    <label for="uniek_kenmerk" class="form-label">Uniek Kenmerk</label>
                    <input name="uniek_kenmerk" type="text" class="form-control" id="uniek_kenmerk" value="<?= $_POST['uniek_kenmerk'] ?? $data['horloge']->UniekKenmerk; ?>" >
                </div>
                <input type="hidden" name="Id" value="<?= $_POST['Id'] ?? $data['horloge']->Id ?>">
                <button type="submit" class="btn btn-primary">verstuur</button>
            </form>

            <a href="<?= URLROOT; ?>/Homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>