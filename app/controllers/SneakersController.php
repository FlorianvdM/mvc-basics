<?php

class SneakersController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('sneakers');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->sneakerModel->getAllSneakers();

        $data = [
            'title'   => 'Overzicht Sneakers',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        $this->view('sneakers/index', $data);
    }

    public function delete($Id)
    {
        $this->sneakerModel->delete($Id);
        header('Refresh:3; url=' . URLROOT . '/SneakersController/index');
        $this->index('flex', 'De sneaker is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe sneaker toevoegen',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $errors = [];

            if (empty(trim($_POST['merk']))) {
                $errors['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 50) {
                $errors['merk'] = 'Max 50 tekens';
            }

            if (empty(trim($_POST['model']))) {
                $errors['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 50) {
                $errors['model'] = 'Max 50 tekens';
            }

            if (empty(trim($_POST['type']))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 50) {
                $errors['type'] = 'Max 50 tekens';
            }

            if (empty($_POST['prijs'])) {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] <= 0) {
                $errors['prijs'] = 'Voer een geldige prijs in groter dan 0';
            }

            if (empty(trim($_POST['materiaal']))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) > 50) {
                $errors['materiaal'] = 'Max 50 tekens';
            }

            if (empty($_POST['gewicht'])) {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] <= 0) {
                $errors['gewicht'] = 'Voer een geldig gewicht in groter dan 0';
            }

            if (empty($_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $this->sneakerModel->create($_POST);
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';
                $data['color'] = 'success';
                header('Refresh:3; url=' . URLROOT . '/SneakersController/index');
            }
        }
        $this->view('sneakers/create', $data);
    }

    public function update($id = NULL)
    {
        $id = $id ?? $_POST['id'] ?? NULL;

        $data = [
            'title'   => 'Wijzig sneaker',
            'display' => 'none',
            'message' => '',
            'errors'  => [],
            'sneaker' => $this->sneakerModel->getSneakerById($id)
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $errors = [];

            if (empty(trim($_POST['merk']))) {
                $errors['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 50) {
                $errors['merk'] = 'Max 50 tekens';
            }

            if (empty(trim($_POST['model']))) {
                $errors['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 50) {
                $errors['model'] = 'Max 50 tekens';
            }

            if (empty(trim($_POST['type']))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 50) {
                $errors['type'] = 'Max 50 tekens';
            }

            if (empty($_POST['prijs'])) {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] <= 0) {
                $errors['prijs'] = 'Voer een geldige prijs in groter dan 0';
            }

            if (empty(trim($_POST['materiaal']))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) > 50) {
                $errors['materiaal'] = 'Max 50 tekens';
            }

            if (empty($_POST['gewicht'])) {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] <= 0) {
                $errors['gewicht'] = 'Voer een geldig gewicht in groter dan 0';
            }

            if (empty($_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
            }


            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $this->sneakerModel->updateSneaker($_POST);
                header('Refresh:3; url=' . URLROOT . '/SneakersController/index');
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn gewijzigd';
                $data['color'] = 'success';
                
                $data['sneaker'] = $this->sneakerModel->getSneakerById($id);
            }
        }

        $this->view('sneakers/update', $data);
    }
}