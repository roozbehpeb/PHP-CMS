<?php

    class model_product extends Model
    {
        function __construct()
        {
            parent::__construct();
        }

        function getproduct($id_product)
        {
            $sql = "select * from tbl_product where id_product =? ";

            $result = $this->do_select($sql, [$id_product], 1);

            $price = $result['price'];
            $discount = $result['discount'];

            $price_calculate = $this->calculate_discount($price, $discount);

            $result['discount_price'] = $price_calculate[0];
            $result['total_price'] = $price_calculate[1];

            // special offer
            $first_row = $result;
            $time_special = $first_row['time_special'];

            // note : video 110 - one note 110
            $option = self::getoption();
            $duration_special = $option['special_time'];


            $time_end = $time_special + $duration_special;
            date_default_timezone_set('Asia/tehran');

            //$data = date('F d ,Y H:i:s',$time_end);
            $data = date('m/d/y H:i:s', $time_end);
            $result['date_special'] = $data;

            $colors = $result['color'];
            $colors = explode(',', $colors);
            $final_colors = array_filter($colors);

            $all_color = [];
            foreach ($final_colors as $mycolor) {
                $colorInfo = $this->colorInfo($mycolor);
                array_push($all_color, $colorInfo);
            }

            $result['custom_color'] = $all_color;


            $guarantee = $result['guarantee'];
            $guarantees = explode(',', $guarantee);
            $final_guarantee = array_filter($guarantees);

            $all_guarantee = [];
            foreach ($final_guarantee as $myguarantee) {
                $guarantee = $this->guarantee_Info($myguarantee);
                array_push($all_guarantee, $guarantee);
            }

            //print_r($all_guarantee);


            $result['custom_guarantee'] = $all_guarantee;

            return $result;

        }


        function Product_info_page($id_product)
        {
         $sql2 = "SELECT tbl_product.title AS title_product, tbl_product.id_product, tbl_product_sub.*, tbl_color.title AS TitleColor, tbl_color.hex,tbl_color.id_color, tbl_guarantee.title AS TitleGuarantee
         FROM tbl_product
         JOIN tbl_product_sub ON tbl_product.product_number = tbl_product_sub.product_number
         JOIN tbl_color ON tbl_product_sub.color = tbl_color.id_color
         JOIN tbl_guarantee ON tbl_product_sub.guarantee = tbl_guarantee.id_guarantee
         WHERE tbl_product.id_product = ?";
            $param = [$id_product];
            $result = $this->do_select($sql2, $param);
            return $result;
        }


        function Product_price($id_color,$id_product)
        {
            $sql2 = "SELECT tbl_product.title AS title_product, tbl_product.id_product, tbl_product_sub.*, tbl_color.title AS TitleColor,tbl_color.id_color
         FROM tbl_product
         JOIN tbl_product_sub ON tbl_product.product_number = tbl_product_sub.product_number
         JOIN tbl_color ON tbl_product_sub.color = tbl_color.id_color
         WHERE tbl_product.id_product = ? AND tbl_color.id_color = ?";
            $param = [$id_product,$id_color];
            $result = $this->do_select($sql2, $param);
            return $result;
        }


        function colorInfo($id)
        {
            $sql = ' select * from tbl_color where id_color=?';
            $result = $this->do_select($sql, [$id], 1);

            return $result;

        }

        function guarantee_Info($id)
        {
            $sql = ' select * from tbl_guarantee where id_guarantee=?';
            $result = $this->do_select($sql, [$id], 1);

            return $result;

        }

        function onlyalloweb()
        {
            $sql = "select * from tbl_product where onlyalloweb = 1";
            $result = $this->do_select($sql);

            return $result;


            $sql = "select * from tbl_option where setting = 'limit_slider' ";
            $stm = self::$conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetch();
            $limit = $result['value'];

            $sql = "select * from tbl_product ORDER by id_product DESC limit " . $limit . " ";
            $stm = self::$conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

            return $result;

        }

        function naghd($id_product)
        {
            $sql = " select * from tbl_naghd where ID_product=?";
            $result = $this->do_select($sql, [$id_product]);

            return $result;

        }


        function fani($id_product, $id_category)
        {


            $sql = " select * from tbl_attribute where ID_category=? AND ID_parent=0";
            $params = [$id_category];
            //$result = $this->do_select($sql, [$id_category]);
            $result = $this->do_select($sql, $params);

            foreach ($result as $key => $row) {
                //var_dump($row);
                $sql2 = " SELECT tbl_attribute.title,tbl_product_attribute.ID_default_value FROM tbl_attribute LEFT JOIN tbl_product_attribute ON tbl_attribute.id_attribute=tbl_product_attribute.ID_attribute AND tbl_product_attribute.ID_product=? WHERE tbl_attribute.ID_parent=? ";

                $params = [$id_product, $row['id_attribute']];
                //var_dump($row['id_attribute']);

                $result2 = $this->do_select($sql2, $params);
                //print_r($result2);
                $result[$key]['children'] = $result2;
            }
            /// var_dump($sql2);

            //print_r($result);
            return $result;

        }


// root code
        function get_productInfo($id_product)
        {
            $sql = "select * from tbl_product WHERE id_product=?";
            $result = $this->do_select($sql, [$id_product], 1);

            @$colors = $result['color'];
            @$guarantee = $result['guarantee'];
            @$discount = $result['discount'];
            @$remain = $result['remain'];
            @$price = $result['price'];

            $colors = explode(',', $colors);
            $guarantee = explode(',', $guarantee);
            $discount = explode(',', $discount);
            $remain = explode(',', $remain);
            $price = explode(',', $price);

            @$result['colorInfo'] = [];

            @$result['guaranteeInfo'] = [];

            foreach ($colors as $row) {
                $sql = "select * from tbl_color WHERE id_color=?";
                @$colorInfo = $this->do_select($sql, [$row], 1);

                array_push($result['colorInfo'], $colorInfo);
                //var_dump($result['colorInfo']);
            }


            foreach ($guarantee as $row) {
                $sql = "select * from tbl_guarantee WHERE id_guarantee=?";
                @$guaranteeInfo = $this->do_select($sql, [$row], 1);

                array_push($result['guaranteeInfo'], $guaranteeInfo);
                //var_dump($result['guaranteeInfo']);
            }



            return $result;

        }

        function get_default_attribut_value($attrId)
        {
            $sql = "select * from tbl_default_attribut_value WHERE id_default_value = ?";
            $param = [$attrId];
            $result = $this->do_select($sql, $param, 1);

            return $result;
        }

        /*  function get_product_attribute($id_product)
          {
              $get_productInfo = $this->get_productInfo($id_product);

              $ID_category = $get_productInfo['ID_category'];

              $sql = "select tbl_attribute.* , tbl_product_attribute.ID_default_value FROM tbl_attribute CROSS JOIN tbl_product_attribute ON tbl_attribute.id_attribute = tbl_product_attribute.ID_attribute AND tbl_product_attribute.ID_product=?  WHERE  ID_category=? AND  ID_parent!=0";

              // $sql="select * from tbl_attribute WHERE ID_category=? AND  ID_parent!=0 ";
              $result = $this->do_select($sql, [$id_product, $ID_category]);
              var_dump($result);

              foreach ($result as $key => $row) {

                  $get_values = $this->get_default_attribut_value($row['ID_default_value']);
                  $result[$key]['values'] = $get_values;
                  // var_dump($get_values);
              }

              // var_dump($result['values']);

              return $result;
          }*/


        function get_product_attribute2($id_product)
        {

            $sql = 'select * from tbl_product_attribute where ID_product=?';
            $param = [$id_product];
            $result = $this->do_select($sql, $param);
            //var_dump($result);

            foreach ($result as $key => $row) {
                $get_values = $this->get_default_attribut_value($row['ID_default_value']);
                $result[$key]['values'] = $get_values;
            }

            // var_dump($result);

            return $result;
        }

        // root code


        function comment_rate($id_category, $id_product)
        {
            $sql = " select * from tbl_comment_rate where ID_category=?";
            $params = [$id_category];
            $result = $this->do_select($sql, $params);

            $sql = " select * from tbl_comment WHERE ID_product=?";
            $result2 = $this->do_select($sql, [$id_product]);
            $score_total = [];
            foreach ($result2 as $row) {
                $comment_score = unserialize($row['comment_score']);
                //$comment_score= down array !
                //  $root = [1=>9, 2=>2, 3=>7, 4=>5];
                //  $root = [1=>8, 2=>6, 3=>10, 4=>2];
                // $root = [1=>10, 2=>4, 3=>6, 4=>3];

                foreach ($comment_score as $key => $value) {
                    $id_score = $key;
                    $score = $value;
                    if (!isset($score_total[$id_score])) {
                        $score_total[$id_score] = 0;
                    }
                    $score_total[$id_score] = $score_total[$id_score] + $score;
                }

                //var_dump($score_total);
            }
            // One Note part 121
            $score_count = sizeof($result2);
            foreach ($score_total as $key => $value) {
                $row = $value / $score_count;
                $row = number_format($row, 1);
                $avrage_score[$key] = $row;

            }

            //var_dump($avrage_score);
            return [$result, $avrage_score];
        }

        function get_comment($id_dproduct)
        {
            $sql = " select * from tbl_comment where ID_product=?";
            $params = [$id_dproduct];
            $result = $this->do_select($sql, $params);

            //var_dump($result);
            return $result;

        }

        function question($id_product)
        {
            $sql = "select * from tbl_question where ID_product=? and parent=0";
            $question = $this->do_select($sql, [$id_product]);


            $sql = "select * from tbl_question where  parent!=0";
            $all_answer = $this->do_select($sql);
            //var_dump($all_answer);
            //$all_new_answer = [];

            //var_dump($all_answer);
            // $result=array_push($result,$result2);
            foreach ($all_answer as $answer) {
                $id_question = $answer['parent'];
                $all_new_answer[$id_question] = $answer;
                //var_dump($all_new_answer);
            }

            //var_dump($all_new_answer);
            return [$question, $all_answer];
        }

        function get_gallery($id_product)
        {
            $sql = "select * from tbl_gallery where ID_product=? ORDER by my_D DESC";
            $result = $this->do_select($sql, [$id_product]);

            return $result;

        }

        function product_main_image($id_product)
        {
            $sql = "select * from tbl_gallery where ID_product=? AND main_image=1";
            $result = $this->do_select($sql, [$id_product], 1);

            return $result;

        }

        function delete_product($id_product)
        {
            $sql = "delete from tbl_product where id_product = ?";
            $this->do_select($sql, [$id_product], 1);
        }

        function addtobasket($ID_product, $color, $guarantee)
        {
            $cookie = self::GetBasketCookie();
            //echo $cookie;
            $sql = "select * from tbl_basket where cookie=? and ID_product=? AND color=? AND guarantee=? ";
            $param = [$cookie, $ID_product, $color, $guarantee];
            $result = $this->do_select($sql, $param);
            if (isset($result[0])) {
                $sql = "update tbl_basket set count=count+1 where cookie=? and ID_product=? AND color=? AND guarantee=?";
            } else {
                $sql = "insert into tbl_basket (cookie,ID_product,count,color,guarantee) VALUES (?,?,1,?,?)";
            }
            $param = [$cookie, $ID_product, $color, $guarantee];
            $this->do_query($sql, $param);

        }


        function AddToBasket2($data)
        {
            $cookie = self::GetBasketCookie();
            $count = $data['count'];
            //$Id_basket = $data['id_basket'];
            $ID_product = $data['ID_product'];
            $color = $data['color'];
            $guarantee = $data['guarantee'];


            $sql = "select * from tbl_basket where cookie=? and ID_product=? AND color=? AND guarantee=? ";
            $param = [$cookie, $ID_product, $color, $guarantee];
            $result = $this->do_select($sql, $param);
            if (isset($result[0])) {
                $sql = "update tbl_basket set count=? where cookie=? and ID_product=? AND color=? AND guarantee=?";
            } else {
                $sql = "insert into tbl_basket (cookie,ID_product,count,color,guarantee) VALUES (?,?,?,?,?)";
            }
            $param = [$count, $cookie, $ID_product, $color, $guarantee];
            $this->do_query($sql, $param);
        }


        function refreshcount($data)
        {

            $cookie = self::GetBasketCookie();
            $color = $data['color'];
            $guarantee = $data['guarantee'];
            $Id_Product = $data['ID_product'];

            $sql = "select count from tbl_basket where cookie=?  AND color=? AND guarantee=? AND ID_product=?";
            //$sql = "select count from tbl_basket where cookie=?  AND color=?  AND ID_product=?";
            $param = [$cookie, $color, $guarantee, $Id_Product];
            // $param = [$cookie, $color,$Id_Product];
            $result = $this->do_select($sql, $param, 1);

            //var_dump($result);
            return $result['count'];
            /*if (sizeof($result['count'])>0){
                return $result['count'];
            }else{
                return FALSE;
            }*/

        }

        function Ajax_count($data)
        {

            $cookie = self::GetBasketCookie();
            $color = $data['color'];
            $guarantee = $data['guarantee'];
            $Id_Product = $data['ID_product'];

            $sql = "select * from tbl_basket where cookie=?  AND color=? AND guarantee=? AND ID_product=?";

            $param = [$cookie, $color, $guarantee, $Id_Product];

            $result = $this->do_select($sql, $param, 1);

            return $result;

        }


        function buttonorInput($data)
        {
            $color = $data['color'];
            $Id_Product = $data['ID_product'];
            $guarantee = $data['guarantee'];
            $cookie = self::GetBasketCookie();
            $sql = "select id_basket from tbl_basket where cookie=? AND color=?  AND ID_product=? AND guarantee=? ";
            $param = [$cookie, $color, $Id_Product, $guarantee];
            $result = $this->do_select($sql, $param, 1);
            @$num = (int)($result['id_basket']);
            if (@$num > 0) {

                // return @$result['id_basket'];
                return 100;

            } else {

                return 0;
            }


        }


    }