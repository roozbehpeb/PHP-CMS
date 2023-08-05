<?php

    class cart5 extends Controller
    {

        function __construct()
        {
            parent::__construct();
        }


        function check_discount_code()
        {
            $data = $_POST['discount_code'];
            //$data=$_POST;
            $result = $this->model->check_discount_code($data);
            $finalPrice = $this->model->calculatepriceBasket($_POST['discount_code']);
            $array = [$result, $finalPrice];
            echo json_encode($array);

        }

        function calculatepriceBasket()
        {
            $finalPrice = $this->model->calculatepriceBasket($_POST['discount_code']);
            echo number_format($finalPrice);
        }


        /*show price in php way
         *  function index()
         {
             $finalPrice=$this->model->calculatefinalpay();
             $data = ['finalprice'=>$finalPrice];
             $this->view('cart5/index', $data);
         }*/

        function SaveOrder()
        {

            // $this->model->SaveOrder($_POST['Final_price']);
            $this->model->SaveOrder($_POST['discount_code']);
            $this->model->deleteUserBasket();
            header('location:' . URL . 'panel');

        }

        function index()
        {


            $ProductExist = $this->model->ProductExist();
            if ($ProductExist == 1) {
                // header('location:' . URL . 'cart4');
            } else if ($ProductExist == 0) {
                header('location:' . URL . 'cart');

            }

            /*$PostPrice=$this->model->PostPrice();
            $PostType=Model::SessionGet('post_type_Id');
            $PostType=$this->model->GetPostTypeReview($PostType);

            $data=['PostPrice'=>$PostPrice,'post_type'=>$PostType];
            $this->view('cart5/index',$data);*/
            $this->view('cart5/index');
        }


    }