<?php

class HorlogesController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('horloges');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->horlogeModel->getAllHorloges();

        $data = [
            'title'   => 'Overzicht Horloges',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        $this->view('horloges/index', $data);
    }

    public function delete($Id)
    {
        $this->horlogeModel->delete($Id);
        header('Refresh:3; url=' . URLROOT . '/HorlogesController/index');
        $this->index('flex', 'Het horloge is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuw horloge toevoegen',
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

            if (empty(trim($_POST['type']))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 50) {
                $errors['type'] = 'Max 50 tekens';
            }

            if (empty(trim($_POST['kenmerk']))) {
                $errors['kenmerk'] = 'Voer een kenmerk in';
            } elseif (strlen($_POST['kenmerk']) > 100) {
                $errors['kenmerk'] = 'Max 100 tekens';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $this->horlogeModel->create($_POST);
                $data['display'] = 'flex';
                $data['message'] = 'Het horloge is opgeslagen';
                $data['color'] = 'success';
                header('Refresh:3; url=' . URLROOT . '/HorlogesController/index');
            }
        }
        $this->view('horloges/create', $data);
    }

    public function update($id = NULL)
    {
        $id = $id ?? $_POST['id'] ?? NULL;

        $data = [
            'title'   => 'Wijzig horloge',
            'display' => 'none',
            'message' => '',
            'errors'  => [],
            'horloge' => $this->horlogeModel->getHorlogeById($id)
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

            if (empty(trim($_POST['type']))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 50) {
                $errors['type'] = 'Max 50 tekens';
            }

            if (empty(trim($_POST['kenmerk']))) {
                $errors['kenmerk'] = 'Voer een kenmerk in';
            } elseif (strlen($_POST['kenmerk']) > 100) {
                $errors['kenmerk'] = 'Max 100 tekens';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $this->horlogeModel->updateHorloge($_POST);
                header('Refresh:3; url=' . URLROOT . '/HorlogesController/index');
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn gewijzigd';
                $data['color'] = 'success';
                
                $data['horloge'] = $this->horlogeModel->getHorlogeById($id);
            }
        }

        $this->view('horloges/update', $data);
    }
}