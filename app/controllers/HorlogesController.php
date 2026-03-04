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
}