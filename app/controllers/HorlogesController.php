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
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->horlogeModel->getAllHorloges();

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'   => 'Overzicht Horloges',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen
         */
        $this->view('horloges/index', $data);
    }

    public function delete($Id)
    {
        /**
         * Roep de delete-methode aan van het model
         */
        $this->horlogeModel->delete($Id);

        /**
         * Stuur een header mee om na 3 seconden terug te keren naar de index
         * Let op: URLROOT moet goed gedefinieerd zijn in je config
         */
        header('Refresh:3; url=' . URLROOT . '/HorlogesController/index');

        /**
         * Roep de index methode direct aan om de bevestiging te tonen
         */
        $this->index('flex', 'Het horloge is verwijderd');
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuw Horloge toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['merk']) || 
                empty($_POST['model']) || 
                empty($_POST['prijs']) || 
                empty($_POST['materiaal']) || 
                empty($_POST['type']) || 
                empty($_POST['uniek_kenmerk'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';
            }
            else {
                $data['display'] = 'flex';
                $data['message'] = 'Horloge is toegevoegd.';

                $this->horlogeModel->create($_POST);

                    header('Refresh:3; url=' . URLROOT . '/HorlogesController/index');
            }
        }
        $this->view('horloges/create', $data);
    }

    public function update($Id = NULL)
    {
        $data = [
            'title' => 'Wijzig Horloge',
            'display' => 'none',
            'message' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['merk']) || 
                empty($_POST['model']) || 
                empty($_POST['prijs']) || 
                empty($_POST['materiaal']) || 
                empty($_POST['type']) || 
                empty($_POST['uniek_kenmerk'])) {

                // laat de <div> tag met terugkoppeling naar de gebruiker zien
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';
                $data['color'] = 'danger';
            }
            else {
                // hier komt de code om de geweijzigde data op te slaan in de database

                $result = $this->horlogeModel->update($_POST);

                // laat de <div> tag met terugkoppeling naar de gebruiker zien in de view
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn succesvol gewijzigd.';
                $data['color'] = 'success';
                header("Refresh:3; url='/HorlogesController/index'");

            }
        }
        
        // laat de model de data ophalen uit de database
        $data['horloge'] = $this->horlogeModel->getHorlogeById($Id);

        $this->view('horloges/update', $data);
    }
}