<?php

    class Product extends Controller
    {


        function __construct()
        {

        }

//        function index($id_product, $Acivetabe = '')
//        {
//
//            $getproduct = $this->model->getproduct($id_product);
//            $onlyalloweb = $this->model->onlyalloweb();
//            $get_gallery = $this->model->get_gallery($id_product);
//            $product_main_image = $this->model->product_main_image($id_product);
//
//            //$data=[$getproduct];
//            $data = ['product_info' => $getproduct, 'onlyalloweb' => $onlyalloweb, 'get_gallery' => $get_gallery, 'product_main_image' => $product_main_image, 'Acivetabe' => $Acivetabe];
//            //$product_tab=['product_tab1'=>$naghd];
//            // var_dump($getproduct);
//            $this->view('product/index', $data);
//
//        }


        function index($id_product, $Acivetabe = '')
        {

            $getproduct = $this->model->getproduct($id_product);
            $Product_info_page = $this->model->Product_info_page($id_product);
            $onlyalloweb = $this->model->onlyalloweb();
            $get_gallery = $this->model->get_gallery($id_product);
            $product_main_image = $this->model->product_main_image($id_product);

            //echo json_encode($Product_price);

            //$data=[$getproduct];
            $data = ['product_info' => $getproduct, 'Product_info_page' => $Product_info_page, 'onlyalloweb' => $onlyalloweb, 'get_gallery' => $get_gallery, 'product_main_image' => $product_main_image, 'Acivetabe' => $Acivetabe];
            //$product_tab=['product_tab1'=>$naghd];
            // var_dump($getproduct);
            $this->view('product/index', $data);

        }


//        function Product_price($id_color, $id_product)
//        {
//                $Product_price = $this->model->Product_price($id_color, $id_product);
//                echo json_encode($Product_price);
//        }


        function Product_price() {
            $id_color=$_POST['id_color'];
            $id_product=$_POST['id_product'];
            $Product_price = $this->model->Product_price($id_color, $id_product);
            echo json_encode($Product_price);
        }



        function tab($id_product, $id_category)
        {

            $number = $_POST['number'];
            if ($number == 0) {

                $tab1 = $this->model->naghd($id_product);

                $tab_info = ['tab_info' => $tab1];

                $this->view('product/tab1', $tab_info, 1, 1);

            }

            if ($number == 1) {
                $tab2 = $this->model->fani($id_product, $id_category);
                $get_product_attribute2 = $this->model->get_product_attribute2($id_product);
                $tab_description = ['tab_description' => $tab2, 'get_product_attribute2' => $get_product_attribute2];

                $this->view('product/tab2', $tab_description, 1, 1);
            }


            if ($number == 2) {
                $tab3_rate = $this->model->comment_rate($id_category, $id_product);
                $tab3_data = $this->model->get_comment($id_product);
                $tab_comment = ['comment_rate' => $tab3_rate[0], 'comment_rate_average' => $tab3_rate[1], 'get_comment' => $tab3_data];
                //var_dump($tab_comment['comment_rate_average']);
                $this->view('product/tab3', $tab_comment, 1, 1);

            }
            if ($number == 3) {
                $tab4 = $this->model->question($id_product);
                $tab_question = ['get_question' => $tab4[0], 'get_answer' => $tab4[1]];
                $this->view('product/tab4', $tab_question, 1, 1);
                //var_dump($tab_question['tab_question']);
            }
        }


        function addtobasket($id_product, $color, $guarantee)
        {
            //echo $id_product . 'secret road o canada !';
            $result = $this->model->addtobasket($id_product, $color, $guarantee);
            // $data=[$BasketHeader,$result,$GetBasket];
            //$this->view('product/index', $data);
            header('Location: http://digitalocean.tv/cart');
            // header('Location: http://digitalocean.tv/product/index/'.$id_product);
            echo json_encode($result);

        }

        function addtobasket2()
        {
            $this->model->addtobasket2($_POST);
            // header('Location: http://digitalocean.tv/cart');

        }

        /*    function UpdataBasket()
                {
                    $this->model->UpdataBasket($_POST);
                    $GetBasket = $this->model->GetBasket();
                    echo json_encode($GetBasket);
                }*/


        /*       function UpdataBasketPageProduct()
           {
               $this->model->UpdataBasketPageProduct($_POST);
               header('Location: http://digitalocean.tv/cart');
               //$GetBasket = $this->model->GetBasket();
               // echo json_encode($GetBasket);
           }*/

        /*  function UpdataBasketPageProduct($mycount,$id_product,$color,$guarantee)
          {
              $this->model->UpdataBasketPageProduct($mycount,$id_product,$color,$guarantee);
              header('Location: http://digitalocean.tv/cart');
              //$GetBasket = $this->model->GetBasket();
              // echo json_encode($GetBasket);
          }*/


        function refreshcount()
        {
            $result = $this->model->refreshcount($_POST);
            echo json_encode($result);

        }


        function buttonorInput()
        {
            $data = $_POST;
            $result = $this->model->buttonorInput($data);
            echo json_encode($result);
        }


        function Ajax_count()
        {
            $result = $this->model->Ajax_count($_POST);
            echo json_encode($result);

        }


    }


?>