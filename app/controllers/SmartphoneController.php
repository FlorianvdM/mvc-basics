<?php

class SmartphoneController extends BaseController
{
    private $smartphoneModel;

    public function __construct()
    {
        $this->smartphoneModel = $this->model('smartphone');
    }

    public function index($display = 'none', $message = '')
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->smartphoneModel->getAllSmartphones();

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'   => 'Overzicht Smartphones',
            'display' => $display, 
            'message' => $message,  
            'result'  => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen
         */
        $this->view('smartphone/index', $data);
    }

    public function delete($Id)
    {
        /**
         * Verwijder het record via het model
         */
        $this->smartphoneModel->delete($Id);

        /**
         * Stuur een header mee om na 3 seconden terug te keren naar de index
         * Let op: URLROOT moet goed gedefinieerd zijn in je config
         */
        header('Refresh:3; url=' . URLROOT . '/SmartphoneController/index');

        /**
         * Roep de index methode direct aan om de bevestiging te tonen
         */
        $this->index('flex', 'De smartphone is verwijderd');
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe Smartphone toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['geheugen']) ||
                empty($_POST['besturingssysteem']) ||
                empty($_POST['schermgrootte']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['megapixels'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';
            } 
            else {
                $data['display'] = 'flex';
                $data['message'] = 'De smartphone is toegevoegd.';

                $this->smartphoneModel->create($_POST);

                header('Refresh:3; url=' . URLROOT . '/SmartphoneController/index');
            }
        }
        $this->view('smartphone/create', $data);
    }

    public function update($Id=NULL)
    {
        $data = [
            'title' => 'Wijzig smartphone',
            'display' => 'none',
            'message' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['geheugen']) ||
                empty($_POST['besturingssysteem']) ||
                empty($_POST['schermgrootte']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['megapixels'])) {

                // laat de <div> tag met terugkoppeling naar de gebruiker zien
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';
                $data['color'] = 'danger';
            }
            else {
                // hier komt de code om de geweijzigde data op te slaan in de database

                $result = $this->smartphoneModel->update($_POST);

                // laat de <div> tag met terugkoppeling naar de gebruiker zien in de view
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn succesvol gewijzigd.';
                $data['color'] = 'success';
                header("Refresh:3; url='/SmartphoneController/index'");
                
            }
        }

        // laat de model de data ophalen uit de database
        $data['smartphone'] = $this->smartphoneModel->getSmartphoneById($Id);

        $this->view('smartphone/update', $data);
    }
}
