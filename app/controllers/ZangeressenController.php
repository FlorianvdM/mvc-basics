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
}