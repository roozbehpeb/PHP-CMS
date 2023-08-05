<?php

    class login extends Controller
    {

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            $this->view('login/index');
        }


        function Check_User()
        {
            $User_send = $_POST;

            $this->model->Check_User($User_send);
            Model::SessionInit();
            echo $check = Model::SessionGet('UserId');

            if ($check == TRUE) {

                $ProductExist = $this->model->ProductExist();
                if ($ProductExist == 100) {
                    header('location:' . URL . 'cart3');
                } else if ($ProductExist == 0) {
                    header('location:' . URL . 'panel');
                }
                //code update by roozbeh
                // header('location:'.URL.'cart3');
            } else {
                header('location:' . URL . 'login');

            }

        }

    }