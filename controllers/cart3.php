<?php

    class cart3 extends Controller
    {

        function __construct()
        {
            parent::__construct();
        }


        function index()
        {

            $ProductExist = $this->model->ProductExist();
            if ($ProductExist == 1) {
                header('location:' . URL . 'cart4');
            } else if ($ProductExist == 0) {
                header('location:' . URL . 'cart');

            }


            $get_UserId = Model::SessionGet('UserId');
            $this->model->UpdataBasketUserId($get_UserId);

            $address = $this->model->GetAddress();
            $PostType = $this->model->GetPostType();
            $data = ['address' => $address, 'PostType' => $PostType];
            $this->view('cart3/index', $data);
        }


        function add_address($UpdateAddress = '')
        {
            $this->model->add_address($_POST, $UpdateAddress);
        }


        function GetAddress()
        {
            $this->model->GetAddress();

        }


        function EditAddress($id_user_address)
        {
            $GetAddressInfo = $this->model->GetAddressInfo($id_user_address);
            echo json_encode($GetAddressInfo);
            /*$data = ['GetAddressInfo'=>$GetAddressInfo];
            $this->view('cart3/index', $data);*/
        }

        function GetPostPrice()
        {
            $data = $_POST;
            $this->model->GetPostPrice($data);
        }

        function SessionPostType()
        {
            $data = $_POST;
            $this->model->SessionPostType($data);

        }

        function deleteUserAddress()
        {
            $data = $_POST['UserAddressId'];
            $this->model->deleteUserAddress($data);

        }

    }