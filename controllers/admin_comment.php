<?php

    class admin_comment extends Controller
    {

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            $Getcomment = $this->model->getcomment();
            $data = ['Getcomment' => $Getcomment];
            $this->view('admin/comment/index', $data);
        }

        function confirm()
        {
            //$ids = $_POST['Id_Comment'];
            $this->model->confirm($_POST);

            header('location:' . URL . 'admin_comment');
        }

        function unconfirm()
        {

            //$ids = $_POST['Id_Comment'];
            $this->model->unconfirm($_POST);
            header('location:' . URL . 'admin_comment');
        }

        function delete()
        {

            //$ids = $_POST['Id_Comment'];
            $this->model->delete($_POST);
            header('location:' . URL . 'admin_comment');
        }


    }


?>