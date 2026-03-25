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
            'title' => 'Nieuwe Sneaker toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['type']) ||   
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['releasedatum'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';
            } 
            else {
                $data['display'] = 'flex';
                $data['message'] = 'De sneaker is toegevoegd.';

                $this->sneakerModel->create($_POST);

                header('Refresh:3; url=' . URLROOT . '/SneakersController/index');
            }
        }
                

        $this->view('sneakers/create', $data);
    }

    public function update($Id = NULL)
    {
        $data = [
            'title' => 'Wijzig sneaker',
            'display' => 'none',
            'message' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['type']) ||   
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['releasedatum'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';
                $data['color'] = 'danger';
            } 
            else {

                $result = $this->sneakerModel->update($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'De sneaker is gewijzigd.';
                $data['color'] = 'success';                
                header("Refresh:3; url='/SneakersController/index'");
            }
        }

        $data['sneaker'] = $this->sneakerModel->getSneakerById($Id);

        $this->view('sneakers/update', $data);
    }
}