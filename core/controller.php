<?php

    class Controller
    {
        public $model = '';

        function __construct()
        {

        }

        //function view($viewUrl,$data)
        // => video 114 => $NoIncludeHeader='',$NoIncludeFooter='')
        //function view($viewUrl,$data=[],$product_tab=[],$NoIncludeHeader='',$NoIncludeFooter='')
        function view($viewUrl, $data = [], $NoIncludeHeader = '', $NoIncludeFooter = '')
        {
            if ($NoIncludeHeader == '') {
                require('header.php');
            }
            require('view/' . $viewUrl . '.php');
            if ($NoIncludeFooter == '') {
                require('footer.php');
            }
        }


        function model($modelUrl)
        {
            require('model/model_' . $modelUrl . '.php');
            $classname = 'model_' . $modelUrl;
            //$this->model = new $classname;
            $this->model = new $classname;

        }


    }