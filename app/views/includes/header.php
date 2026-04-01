<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC Basics</title>
    <!-- Modern Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap and Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= URLROOT; ?>/public/css/style.css">
    <link rel="shortcut icon" href="<?= URLROOT; ?>/public/img/favicon.ico" type="image/x-icon">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?= URLROOT; ?>/homepages/index">
          <i class="bi bi-code-square"></i> MVC Basics
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/SmartphoneController/index">Smartphones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/SneakersController/index">Sneakers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/HorlogesController/index">Horloges</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/ZangeressenController/index">Zangeressen</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="wrapper">