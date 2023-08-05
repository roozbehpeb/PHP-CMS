<?php

    class model_index extends Model
    {
        function __construct()
        {

            parent::__construct();
        }

        function get_slider1()
        {
            $sql = "select * from tbl_slider1";
            $result = $this->do_select($sql);

            return $result;
        }

        /**
         * @return array
         */
        function get_slider2()
        {
            $sql = "select * from tbl_product WHERE special_offer=1";

            $result = $this->do_select($sql);
            /* $stm =  self::$conn->prepare($sql);
             $stm->execute();
             $result = $stm ->fetchAll();*/


            foreach ($result as $key => $row) {
                $discount = $row['discount'];
                $price = $row['price'];
                $price_total = ((100 - $discount) * $price) / 100;
                $result[$key]['price_total'] = $price_total;
            }
            @$first_row = $result[0];
            @$time_special = $first_row['time_special'];

            // note : video 110 - one note 110
            $option = self::getoption();
            $duration_special = $option['special_time'];

            /*$sql = 'select * from tbl_option where setting = "special_time"';
            $stm =  self::$conn->prepare($sql);
            $stm->execute();
            $result2 = $stm ->fetch();
            $duration_special = $result2['value'];*/


            $time_end = $time_special + $duration_special;
            date_default_timezone_set('Asia/tehran');

            //$data = date('F d ,Y H:i:s',$time_end);
            $data = date('m/d/y H:i:s', $time_end);

            return [$result, $data];
        }

        function onlyalloweb()
        {
            $sql = "select * from tbl_product where onlyalloweb = 1";
            $result = $this->do_select($sql);

            return $result;
        }


        function mostviewed()
        {

            $sql = "select * from tbl_option where setting = 'limit_slider' ";
            $result = $this->do_select($sql, [], 1);
            $limit = $result['value'];

            $sql = "select * from tbl_product ORDER by viewed DESC limit " . $limit . " ";
            $result = $this->do_select($sql);

            return $result;

        }


        function lastproducts()
        {

            $option = self::getoption();
            $limit = $option['limit_slider'];
            /*$sql = "select * from tbl_option where setting = 'limit_slider' ";
            $stm=self::$conn->prepare($sql);
            $stm->execute();
            $result=$stm->fetch();
            $limit = $result['value'];*/

            $sql = "select * from tbl_product ORDER by id_product DESC limit " . $limit . " ";
            $stm = self::$conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

            return $result;
        }


    }