<?php

    class model_category extends Model
    {
        function __construct()
        {
            parent::__construct();

            Model::SessionInit();

        }

        function Get_product_cat($ID_category)
        {
            $sql = "select * from tbl_product where ID_category=?";
            $param = [$ID_category];
            $result = $this->do_select($sql, $param);
            $product_count = sizeof($result);
            $product_count = ceil($product_count);

            return [$result, $product_count];
        }

        function getAttribute($categoryId)
        {

            $sql = "select * from tbl_attribute where ID_category=? and filter=1";
            $result = $this->do_select($sql, array($categoryId));
            foreach ($result as $key => $row) {

                $sql = "select * from tbl_default_attribut_value where id_attribut=?";
                $res = $this->do_select($sql, array($row['id_attribute']));
                $result[$key]['values'] = $res;

            }

            return $result;

        }

        function Get_product($exist, $keyword, $orderType1, $orderType2, $id_category)
        {
            //   $string = ' where 1=1 and ID_category=? ';
            $string = ' where ID_category=' . $id_category . ' ';
            $order = 'order by';

            if ($exist == 1) {
                $string = $string . 'and remain>0';
            }

            if ($keyword != ' ') {
                $string = $string . ' and title  like "%' . $keyword . '%" ';
                //  $string =$string. 'and title LIKE  '%".$keyword."%'';

                //       $string = $string . ' and title  like "%' . $keyword . '%" ';
                //select * from tbl_product WHERE title LIKE '%mo%'
            }

            if ($orderType1 == 1) {
                $order2 = $order . ' price ';
            }
            if ($orderType1 == 2) {
                $order2 = $order . ' viewed ';
            }
            if ($orderType1 == 3) {
                $order2 = $order . ' id_product ';
            }
            if ($orderType2 == 1) {
                $order3 = ' asc';
            }
            if ($orderType2 == 2) {
                $order3 = ' desc';
            }


            $sql = "select * from tbl_product   " . $string . "   " . $order2 . "   " . $order3 . "  ";
            // $sql = " select * from tbl_product";
            //var_dump($sql);
            $param = [$id_category];
            $result = $this->do_select($sql, $param);

            return $result;

        }


        function ProductAttrVale()
        {
            $sql = 'select * from tbl_product_attribute';
            $result = $this->do_select($sql);
            $productAttrVal = [];
            foreach ($result as $row) {
                $productId = $row['ID_product'];
                $attrId = $row['ID_attribute'];
                $attrValId = $row['ID_default_value'];
                if (!isset($productAttrVal[$productId])) {
                    $productAttrVal[$productId] = [];
                }
                $productAttrVal[$productId][$attrId] = $attrValId;
            }

            return $productAttrVal;
        }

        function dosearch($data)
        {
            //var_dump($data);
            $exist = @$data['exist'];
            $keyword = @$data['keyword'];
            $UserColorSend = @$data['colorSelected'];
            $orderType1 = @$data['OrderType1'];
            $orderType2 = @$data['OrderType2'];
            $id_category = @$data['Id_category'];
            $page_reset = @$data['page_reset'];

            $products = $this->Get_product($exist, $keyword, $orderType1, $orderType2, $id_category);
            $ProductAttrVale = $this->ProductAttrVale();
            //  var_dump($ProductAttrVale);

            $productTotal = [];
            foreach ($products as $productkey => $product) {
                foreach ($data as $key => $ArrayIdval) {

                    $attr = explode('-', $key);

                    @$attrId = $attr[1];

                    $productId = $product['id_product'];

                    $productval = @$ProductAttrVale[$productId][$attrId];

                    // print_r($ArrayIdval);
                    //  print_r($productval);
                    //var_dump($productval);
                    if (isset($productval)) {
                        /*if (!in_array($productval, $ArrayIdval)) {
                            // this code not work!
                             unset($products[$productkey]);
                        }*/
                        if (in_array($productval, $ArrayIdval)) {
                            if (!in_array($products[$productkey], $productTotal, TRUE)) {
                                array_push($productTotal, $products[$productkey]);
                            }
                            //  unset($products[$productkey]);

                        }
                    }


                }


                if (isset($UserColorSend)) {
                    $productscolor = $product['color'];
                    //var_dump($productscolor);
                    $productscolors = explode(',', $productscolor);

                    $colorseleced = array_intersect($UserColorSend, $productscolors);

                    if (sizeof($colorseleced) != 0) {

                        if (!in_array($products[$productkey], $productTotal, TRUE)) {
                            //  unset($products[$productkey]);
                            array_push($productTotal, $products[$productkey]);
                        }
                    }
                }
                if (isset($keyword)) {
                    if (@sizeof($keyword) != 0 && !empty($keyword)) {
                        if (!in_array($products[$productkey], $productTotal, TRUE)) {
                            array_push($productTotal, $products[$productkey]);
                            // var_dump($keyword);
                        }
                    }
                }


                /*for load product at frist time as soon as refresh page or when  delete filter */
                if (!isset($UserColorSend)) {
                    if ($page_reset == 0) {
                        if (!in_array($products[$productkey], $productTotal, TRUE)) {
                            array_push($productTotal, $products[$productkey]);
                        }
                        //  unset($products[$productkey]);
                    }
                }

            }


            ///  $productTotal = array_filter($productTotal);

            $limit_page = $data['limit_page'];

            $page_number = sizeof($productTotal) / $limit_page;
            $page_number = ceil($page_number);


            $current_page = $data['curent_page'];
            @$offset = ($current_page - 1) * $limit_page;
            $productTotal = array_slice($productTotal, $offset, $limit_page);


            return [$productTotal, $page_number];

            //echo json_encode($productTotal);

        }


        /* function dosearch2($data2)
         {
             $exist = @$data2['exist'];
             $keyword = @$data2['keyword'];
             $orderType1 = @$data2['OrderType1'];
             $orderType2 = @$data2['OrderType2'];
             $id_category = @$data2['Id_category'];
             $reset_page = @$data2['reset_page'];
 
             $products = $this->Get_product($exist, $keyword, $orderType1, $orderType2, $id_category);
             //  var_dump($ProductAttrVale);
 
             $productTotal = [];
             foreach ($products as $productkey => $product) {
 
                 if (isset($reset_page)){
                     if (!in_array($products[$productkey], $productTotal, TRUE)) {
                         array_push($productTotal, $products[$productkey]);
                     }
                 }
 
 
 
             }
 
 
 
 
 
             $page_number=1;
 
             return [$productTotal, $page_number];
 
             //echo json_encode($productTotal);
 
         }*/


        function getcolor()
        {
            $sql = "select *from tbl_color";
            $result = $this->do_select($sql);

            return $result;
        }
    }

?>