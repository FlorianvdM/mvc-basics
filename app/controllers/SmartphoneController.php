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
        $this->index('flex', 'Record is verwijderd');
    }
}