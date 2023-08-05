<?php

    class admin_statistics extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            $this->view('admin/statistics/index');
        }

        function statistics()
        {
            $date = $_POST;
            $statistics = $this->model->statistics($date);
            $data = ['statistics' => $statistics];
            $this->view('admin/statistics/statistics', $data);
        }


    }
