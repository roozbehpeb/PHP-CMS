<?php

    class Admin_product extends Controller
    {
        function __construct()
        {
            parent::__construct();

            $level = Model::GetUserLevel();
            if ($level != 1) {
                header('location:' . URL . 'login');
            }
        }

        function index()
        {

            $get_product = $this->model->get_product();
            $get_product2 = $this->model->get_product2();
            $data = ['get_product' => $get_product, 'get_product2' => $get_product2];
            $this->view('admin/product/index', $data);

        }

        function list()
        {
            $get_category = $this->model->get_category();
            $get_color = $this->model->get_color();
            $get_guarantee = $this->model->get_guarantee();
            $get_productInfo = $this->model->get_productInfo($id_product);
            $get_product_attribute = $this->model->get_product_attribute($id_product);
            $data = ['get_category' => $get_category, 'get_color' => $get_color, 'get_guarantee' => $get_guarantee, 'get_productInfo' => $get_productInfo, 'get_product_attribute' => $get_product_attribute, 'show_product_attribute' => $show_product_attribute];

            return $data;
        }


        function add_product($id_product = '')
        {
            if (isset($_POST['product_title'])) {
                $this->model->add_product($_POST, $id_product, $_FILES['upload']);
                // var_dump($_POST);
                //header('location:' . URL . 'admin_product/index/');
            }

           $data=$this->list();
            $this->view('admin/product/add_product', $data);

            //var_dump($data['get_productInfo']);
        }


        function add_product_field()
        {
            $data=$this->list();
            $this->view('admin/product/add_product_field', $data,1,1);

        }


        function get_select_tag($id_product = '', $id_category = '')
        {

            $get_category = $this->model->get_category();
            $get_color = $this->model->get_color();
            $get_guarantee = $this->model->get_guarantee();
            $get_productInfo = $this->model->get_productInfo($id_product);
            $get_product_attribute = $this->model->get_product_attribute($id_product);
            $show_product_attribute = $this->model->show_product_attribute(76);
            $data = ['get_category' => $get_category, 'get_color' => $get_color, 'get_guarantee' => $get_guarantee, 'get_productInfo' => $get_productInfo, 'get_product_attribute' => $get_product_attribute, 'show_product_attribute' => $show_product_attribute];
            $this->view('admin/product/get_select_tag', $data, 1, 1);

            //var_dump($data['get_productInfo']);
        }

        function attr_of_category($id_category)
        {
            $attr_of_category = $this->model->attr_of_category($id_category);
            echo json_encode($attr_of_category);
        }

        function attr_of_category2($id_attribute)
        {
            $attr_of_category2 = $this->model->attr_of_category2($id_attribute);
            echo json_encode($attr_of_category2);
        }

        function AddNewSelectTag($id_product = '')
        {
            $get_category = $this->model->get_category();
            $get_productInfo = $this->model->get_productInfo($id_product);
            $data = ['get_category' => $get_category, 'get_productInfo' => $get_productInfo];
            $this->view('admin/product/AddNewSelectTag', $data);

            //var_dump($data['get_productInfo']);
        }

        function add_product_sub($id_product = '')
        {

            if (isset($_POST['get_color'])) {
                $this->model->add_product_sub($_POST, $id_product);
            }

            $get_category = $this->model->get_category();
            $get_color = $this->model->get_color();
            $get_guarantee = $this->model->get_guarantee();
            $get_productInfo = $this->model->get_productInfo($id_product);
            $data = ['get_category' => $get_category, 'get_color' => $get_color, 'get_guarantee' => $get_guarantee, 'get_productInfo' => $get_productInfo];
            $this->view('admin/product/add_product', $data);
        }

        /*function delete_product($id_product){
            if (isset($_POST['product_select'])){
            $this->model->delete_product($id_product);
            //header('location:' . URL . 'admin_product/index/' );
            }
    }*/


        function get_product_Specialist($id_product, $id_naghd = '')
        {
            $get_product_Specialist = $this->model->get_product_Specialist($id_product);
            $get_productInfo = $this->model->get_productInfo($id_product);
            $Specialist_Info = $this->model->Specialist_Info($id_naghd);

            $data = ['get_product_Specialist' => $get_product_Specialist, 'get_productInfo' => @$get_productInfo, 'all_Specialist' => $Specialist_Info];
            $this->view('admin/product/get_Specialist', $data);
        }

        function add_product_Specialist($id_product, $id_naghd = '')
        {
            if (isset($_POST['title'])) {
                $add_product_Specialist = $this->model->add_product_Specialist($id_product, $_POST, $id_naghd);
                header('location:' . URL . 'admin_product/get_product_Specialist/' . $id_product);
            }
            $get_productInfo = $this->model->get_productInfo($id_product);
            $Specialist_Info = $this->model->Specialist_Info($id_naghd);


            $data = ['get_productInfo' => @$get_productInfo, 'add_product_Specialist' => @$add_product_Specialist, 'Specialist_Info' => $Specialist_Info];
            $this->view('admin/product/add_Specialist', $data);

        }

        function delete_Specialist($id_product)
        {
            $this->model->delete_Specialist($_POST['id_naghd']);
            header('location:' . URL . 'admin_product/get_product_Specialist/' . $id_product);
        }

        function delete_product()
        {
            $this->model->delete_product($_POST['id_product']);
            header('location:' . URL . 'admin_product/index/');
        }


        function attribute($id_product)
        {
            if (isset($_POST['submited'])) {
                $this->model->Add_Attribute($_POST, $id_product);
                // header('location:' . URL . '/admin_product/attribute/' . $id_product);
            }

            $attribute = $this->model->get_product_attribute($id_product);
            $get_productInfo = $this->model->get_productInfo($id_product);
            $Get_product_attribute2 = $this->model->Get_product_attribute2($id_product);

            $data = ['attribute' => $attribute, 'get_productInfo' => $get_productInfo, 'Get_product_attribute2' => $Get_product_attribute2];
            $this->view('admin/product/attribute', $data);

        }


        function gallery_product($id_product)
        {

            if (isset($_FILES['add_gallery'])) {
                $this->model->add_gallery($id_product, $_FILES['add_gallery']);
            }

            $gallery = $this->model->get_gallery($id_product);
            $get_productInfo = $this->model->get_productInfo($id_product);
            $data = ['gallery' => $gallery, 'get_productInfo' => $get_productInfo];
            $this->view('admin/product/gallery', $data);
        }


        function delete_gallery($id_product)
        {
            $this->model->delete_gallery($_POST['id_gallery'], $id_product);
            header('location:' . URL . '/admin_product/gallery_product/' . $id_product);
        }


    }