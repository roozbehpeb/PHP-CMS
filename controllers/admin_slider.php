<?php

    class admin_slider extends Controller
    {

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            if (isset($_POST['title'])) {
                $this->model->addSlider($_POST, $_FILES);
            }

            $result = $this->model->getslider();
            $data = ['slider' => $result];
            $this->view('admin/slider/index', $data);


        }

        function delete()
        {
            $this->model->delete($_POST);
            header('location:' . URL . 'admin_slider/index');
        }

    }