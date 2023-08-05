<?php

    class manage_users extends Controller
    {

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            $get_users = $this->model->get_users();
            $data = ['get_users' => $get_users];
            $this->view('admin/manage_users/index', $data);

        }

        function ToManager()
        {
            $Ids = $_POST['IdUser'];
            $this->model->ToManager($Ids);
            header('location:' . URL . 'manage_users');
        }

        function ToEmployee()
        {
            $Ids = $_POST['IdUser'];
            $this->model->ToEmployee($Ids);
            header('location:' . URL . 'manage_users');
        }

        function ToOrdinary()
        {
            $Ids = $_POST['IdUser'];
            $this->model->ToOrdinary($Ids);
            header('location:' . URL . 'manage_users');
        }

        function delete()
        {
            $Ids = $_POST['IdUser'];
            $this->model->delete($Ids);
            header('location:' . URL . 'manage_users');
        }


    }