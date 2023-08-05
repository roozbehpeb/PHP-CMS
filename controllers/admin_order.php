<?php

    class admin_order extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }


        function index()
        {
            $get_orders = $this->model->GetOrder();
            $data = ['GetOrder' => $get_orders];
            $this->view('admin/order/index', $data);
        }

        function order_edit($id_order)
        {
            $order_review = $this->model->order_edit($id_order);
            $data = ['order_edit' => $order_review];
            $this->view('admin/order/order_edit', $data);
        }


        function order_update($id_order)
        {
            $data = $_POST;
            $this->model->order_update($data, $id_order);
            header('location:' . URL . 'admin_order');

        }

        function Sales_Invoice($id_order)
        {
            $Sales_Invoice1 = $this->model->Sales_Invoice1($id_order);
            // var_dump($Sales_Invoice1);
            $Sales_Invoice2 = $this->model->Sales_Invoice2($id_order);
            $data = ['Sales_Invoice1' => $Sales_Invoice1, 'Sales_Invoice2' => $Sales_Invoice2];
            //$data = ['Sales_Invoice1' => $Sales_Invoice1];
            //  var_dump($data);
            $this->view('admin/order/Sales_Invoice', $data, 1, 1);

        }

        function delete_order()
        {
            //$IdOrders=$_POST;
            $this->model->delete_order($_POST);
            header('location:' . URL . 'admin_order');
            //$this->model->delete_order($IdOrders);
        }


    }