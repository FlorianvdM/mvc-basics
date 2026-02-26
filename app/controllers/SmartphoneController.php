<?php

class SmartphoneController extends BaseController
{
    private $SmartphoneModel;
    public function __construct()
    {
        $this->SmartphoneModel = $this->model('Smartphone');
    }


    public function index()
    {
        /**
         * Haal de resultaten van het model binnen
         */
        $result = $this->SmartphoneModel->getAllSmartphones();

        //var_dump($result);

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title' => 'Overzicht smartphones',
            'result' => $result
        ];


        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen met de informatie uit het $data-array
         */
        $this->view('smartphones/index', $data);
    }
}