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
}