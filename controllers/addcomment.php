<?php

    class Addcomment extends Controller
    {

        function __construct()
        {
            parent::__construct();
        }

        function index($productId, $id_comment)
        {
            $param = $this->model->getParam($productId);
            $productInfo = $this->model->productInfo($productId);
            $commentInfo = $this->model->commentInfo($productId, $id_comment);
            $data = ['param' => $param, 'productInfo' => $productInfo, 'commentInfo' => $commentInfo];
            $this->view('addcomment/index', $data);
        }

        function savecomment($IdProduct, $id_comment)
        {
            $this->model->savecomment($_POST, $IdProduct, $id_comment);
        }


    }