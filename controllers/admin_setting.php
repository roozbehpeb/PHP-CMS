<?php

    class admin_setting extends Controller
    {

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {

            if (isset($_POST['limit_slider'])) {
                $this->model->saveSetting($_POST);
                header('location:' . URL . 'admin_setting');
            }

            $this->view('admin/setting/index');
        }

        /* function saveSetting()
         {
             $this->model->saveSetting();
             header('location:' . URL . 'admin_setting');
         }*/


    }