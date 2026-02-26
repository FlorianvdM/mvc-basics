<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het boorstrap grid -->
<div class="container">
    <div class="row mt-3 d-flex justify-content-center">

        <div class="col-10">

            <h3><?php echo $data['title']; ?></h3>

        </div>

    </div>

    <div class="row mt-3 d-flex justify-content-center">

        <div class="col-10">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Prijs</th>
                        <th>Geheugen</th>
                        <th>Besturingssysteem</th>
                        <th>Schermgrootte</th>
                        <th>ReleaseDatum</th>
                        <th>Megapixels</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($data['result'] as $smartphone) : ?>

                        <tr>
                            <td><?php echo $smartphone->Merk; ?></td>
                            <td><?php echo $smartphone->Model; ?></td>
                            <td><?php echo $smartphone->Prijs; ?></td>
                            <td><?php echo $smartphone->Geheugen; ?></td>
                            <td><?php echo $smartphone->Besturingssysteem; ?></td>
                            <td><?php echo $smartphone->Schermgrootte; ?></td>
                            <td><?php echo $smartphone->ReleaseDatum; ?></td>
                            <td><?php echo $smartphone->Megapixels; ?></td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>
    </div>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>

        