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
            'title' => 'Nieuwe Zangeres toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['naam']) || 
                empty($_POST['genre']) || 
                empty($_POST['land']) || 
                empty($_POST['leeftijd'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';
            }
            else {
                $data['display'] = 'flex';
                $data['message'] = 'Zangeres is toegevoegd.';

                $this->zangeresModel->create($_POST);

                    header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');
            }
        }

        $this->view('zangeressen/create', $data);
    }
}