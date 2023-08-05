<?php

    class admin_dashboard extends Controller
    {

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            $orderStat = $this->model->getStat();
            $data = array('orderStat' => $orderStat);
            $this->view('admin/dashboard/index', $data);
        }


    }


?>