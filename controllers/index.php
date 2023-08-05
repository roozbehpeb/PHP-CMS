<?php

    class Index extends Controller
    {

        function __construct()
        {

        }


        function index()
        {
            $slider1 = $this->model->get_slider1();

            $slider2 = $this->model->get_slider2();
            $slider2_item = $slider2[0];
            $slider2_data_end = $slider2[1];

            $onlyalloweb = $this->model->onlyalloweb();

            $mostviewed = $this->model->mostviewed();
            $lastproducts = $this->model->lastproducts();

            $data = [$slider1, $slider2_item, $slider2_data_end, $onlyalloweb, $mostviewed, $lastproducts];
            $this->view('index/index', $data);

        }


    }

?>