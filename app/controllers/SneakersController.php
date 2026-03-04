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
}