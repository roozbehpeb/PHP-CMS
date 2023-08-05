<?php

    class cart4 extends Controller
    {

        function __construct()
        {
            parent::__construct();
        }


        function index()
        {
            $ProductExist = $this->model->ProductExist();
            if ($ProductExist == 1) {
                // header('location:' . URL . 'cart4');
            } else if ($ProductExist == 0) {
                header('location:' . URL . 'cart');

            }

            $GetBasketInfo = $this->model->GetBasketReview();
            $PostPrice = $this->model->PostPrice();
            Model::SessionInit();
            $addressInfo = Model::SessionGet('addressId');
            $addressInfo = unserialize($addressInfo);

            $PostType = Model::SessionGet('post_type_Id');
            $PostType = $this->model->GetPostTypeReview($PostType);
            //$GetPostTypePrice=$this->model->GetBasketReview();
            $data = ['GetBasketInfo' => $GetBasketInfo, 'PostPrice' => $PostPrice, 'addressInfo' => $addressInfo, 'post_type' => $PostType];
            $this->view('cart4/index', $data);
        }


    }