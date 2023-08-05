<?php

    class category extends Controller
    {

        function __construct()
        {
        }

        function index($categoryId)
        {
            $Get_product_cat = $this->model->Get_product_cat($categoryId);
            $Attribute = $this->model->getAttribute($categoryId);
            //   $RightSideAttr = $this->model->RightSideAttr($categoryId);
            $getcolor = $this->model->getcolor();
            $data = ['Attribute' => $Attribute, 'GetColor' => $getcolor, 'Get_product_cat' => $Get_product_cat[0], 'Get_product_count' => $Get_product_cat[1]];
            $this->view('category/index', $data);
        }


        function dosearch()
        {
            $result = $this->model->dosearch($_POST);
            echo json_encode($result, JSON_UNESCAPED_UNICODE);


            // $databack = json_encode($result);
            // return $databack;
            //echo json_encode($result,JSON_UNESCAPED_UNICODE);
            //header('location:'.URL.'category/index/75');
            // header("Location: http://digitalocean.tv/category/index/75");

        }


    }