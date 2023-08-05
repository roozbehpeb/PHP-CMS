<?php

    class cart2 extends Controller
    {

        function __construct()
        {
            Model::SessionInit();
            $check = Model::SessionGet('UserId');
            if ($check != FALSE) {
                header('location:' . URL . 'cart3');
            }


        }


        function index()
        {

            /*$ProductExist = $this->model->ProductExist();
            if ($ProductExist == 1) {
                header('location:' . URL . 'cart3');
            } else if ($ProductExist == 0) {
                header('location:' . URL . 'cart');

            }*/

            $data = [];
            $this->view('cart2/index', $data);
        }


    }