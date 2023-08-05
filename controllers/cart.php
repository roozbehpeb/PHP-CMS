<?php

    class cart extends Controller
    {

        function __construct()
        {

        }

        function QuantityBasket()
        {
            $basketCount = $this->model->QuantityBasket();
            echo json_encode($basketCount);
        }

        /*function HeaderBasket(){
            $GetBasket = $this->model->GetBasket();
            echo json_encode($GetBasket);
        }*/


        function index()
        {

            $GetBasket = $this->model->GetBasket();
            $BasketHeader = $this->model->GetBasketHeader();
            $data = ['GetBasket' => $GetBasket[0], 'GetBasket_finalPrice' => $GetBasket[1], 'BasketHeader' => $BasketHeader[0], 'BasketHeader_finalPrice' => $BasketHeader[1]];

            $this->view('cart/index', $data);
        }


        function deleteBasket($basketId)
        {
            $this->model->deleteBasket($basketId);
            $GetBasket = $this->model->GetBasket();
            echo json_encode($GetBasket);

        }


        function UpdataBasket()
        {
            $this->model->UpdataBasket($_POST);
            $GetBasket = $this->model->GetBasket();
            echo json_encode($GetBasket);
        }

    }