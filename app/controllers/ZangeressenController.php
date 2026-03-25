<?php

class ZangeressenController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('zangeressen');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->zangeresModel->getAllZangeressen();

        $data = [
            'title'   => 'Top Zangeressen',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        $this->view('zangeressen/index', $data);
    }

    public function delete($Id)
    {
        $this->zangeresModel->delete($Id);
        header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');
        $this->index('flex', 'Zangeres is verwijderd uit de lijst');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe zangeres toevoegen',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $errors = [];

            if (empty(trim($_POST['naam']))) {
                $errors['naam'] = 'Voer een naam in';
            } elseif (strlen($_POST['naam']) > 50) {
                $errors['naam'] = 'Max 50 tekens';
            }

            if (empty($_POST['waarde'])) {
                $errors['waarde'] = 'Voer een waarde in';
            } elseif (!is_numeric($_POST['waarde']) || $_POST['waarde'] <= 0) {
                $errors['waarde'] = 'Voer een positieve getalwaarde in';
            }

            if (empty(trim($_POST['land']))) {
                $errors['land'] = 'Voer een land in';
            } elseif (strlen($_POST['land']) > 50) {
                $errors['land'] = 'Max 50 tekens';
            }

            if (empty($_POST['leeftijd'])) {
                $errors['leeftijd'] = 'Voer een leeftijd in';
            } elseif (!is_numeric($_POST['leeftijd']) || $_POST['leeftijd'] <= 0 || $_POST['leeftijd'] > 120) {
                $errors['leeftijd'] = 'Voer een geldige leeftijd in';
            }

            if (empty(trim($_POST['nummer']))) {
                $errors['nummer'] = 'Voer een nummer in';
            } elseif (strlen($_POST['nummer']) > 100) {
                $errors['nummer'] = 'Max 100 tekens';
            }

            if (empty($_POST['jaar'])) {
                $errors['jaar'] = 'Voer een debuutjaar in';
            } elseif (!is_numeric($_POST['jaar']) || $_POST['jaar'] < 1900 || $_POST['jaar'] > date('Y')) {
                $errors['jaar'] = 'Voer een geldig jaartal in';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $this->zangeresModel->create($_POST);
                $data['display'] = 'flex';
                $data['message'] = 'De zangeres is succesvol toegevoegd';
                $data['color'] = 'success';
                header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');
            }
        }
        $this->view('zangeressen/create', $data);
    }

    public function update($id = NULL)
    {
        $id = $id ?? $_POST['id'] ?? NULL;

        $data = [
            'title'    => 'Wijzig zangeres',
            'display'  => 'none',
            'message'  => '',
            'errors'   => [],
            'zangeres' => $this->zangeresModel->getZangeresById($id)
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $errors = [];

            if (empty(trim($_POST['naam']))) {
                $errors['naam'] = 'Voer een naam in';
            } elseif (strlen($_POST['naam']) > 50) {
                $errors['naam'] = 'Max 50 tekens';
            }

            if (empty($_POST['waarde'])) {
                $errors['waarde'] = 'Voer een waarde in';
            } elseif (!is_numeric($_POST['waarde']) || $_POST['waarde'] <= 0) {
                $errors['waarde'] = 'Voer een positieve getalwaarde in';
            }

            if (empty(trim($_POST['land']))) {
                $errors['land'] = 'Voer een land in';
            } elseif (strlen($_POST['land']) > 50) {
                $errors['land'] = 'Max 50 tekens';
            }

            if (empty($_POST['leeftijd'])) {
                $errors['leeftijd'] = 'Voer een leeftijd in';
            } elseif (!is_numeric($_POST['leeftijd']) || $_POST['leeftijd'] <= 0 || $_POST['leeftijd'] > 120) {
                $errors['leeftijd'] = 'Voer een geldige leeftijd in';
            }

            if (empty(trim($_POST['nummer']))) {
                $errors['nummer'] = 'Voer een nummer in';
            } elseif (strlen($_POST['nummer']) > 100) {
                $errors['nummer'] = 'Max 100 tekens';
            }

            if (empty($_POST['jaar'])) {
                $errors['jaar'] = 'Voer een debuutjaar in';
            } elseif (!is_numeric($_POST['jaar']) || $_POST['jaar'] < 1900 || $_POST['jaar'] > date('Y')) {
                $errors['jaar'] = 'Voer een geldig jaartal in';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $this->zangeresModel->updateZangeres($_POST);
                header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn gewijzigd';
                $data['color'] = 'success';
                
                $data['zangeres'] = $this->zangeresModel->getZangeresById($id);
            }
        }

        $this->view('zangeressen/update', $data);
    }
}