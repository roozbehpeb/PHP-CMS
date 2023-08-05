<?php

    class model_cart5 extends Model
    {
        public $CheckLogin = '';

        function __construct()
        {
            parent::__construct();
            Model::SessionInit();
            $this->CheckLogin = Model::SessionGet('UserId');

            if ($this->CheckLogin == FALSE) {
                header('location:' . URL . 'login');
            }
        }

        function check_discount_code($data)
        {
            $sql = "SELECT * FROM tbl_discount_code WHERE discount_code=? AND discount_used=0";
            $param = [$data];
            //$param = [$data['discount_code']];
            $result = $this->do_select($sql, $param);
            if (sizeof($result) > 0) {
                // echo 'valid';
                // return TRUE;
                return $result[0]['discount_percent'];
            } else {
                //return FALSE;
                return 0;
            }
        }

        /* function discountByCode($discount_code)
         {
             $BasketInfo = $this->GetBasket();
             $basketprice = $BasketInfo[1];
             $basketdiscount = $BasketInfo[2];

             //$basketdiscount: is a discount whitch manager define in website for all user

             self::SessionInit();
             $addressInfo = self::SessionGet('post_type_Id');
             $postId = $addressInfo;
             $posttype = $this->GetPostTypePrice($postId);
             $postprice = $posttype['price'];


             $Check = $this->check_discount_code($discount_code);
             $discount_code = 0;
             if ($Check != 0) {
                 $discount_code = ($Check * $basketprice) / 100;
             }

             $finalprice = $basketprice +  - $basketdiscount - $discount_code;
             $finalprice = $finalprice + $postprice ;

             return $discount_code;
         }*/

        function calculatepriceBasket($discount_code)
        {
            $BasketInfo = $this->GetBasket();
            $basketprice = $BasketInfo[1];
            $basketdiscount = $BasketInfo[2];

            //$basketdiscount: is a discount whitch manager define in website for all user

            self::SessionInit();
            $addressInfo = self::SessionGet('post_type_Id');
            $postId = $addressInfo;
            $posttype = $this->GetPostTypePrice($postId);
            $postprice = $posttype['price'];


            $Check = $this->check_discount_code($discount_code);
            $discount_code = 0;
            if ($Check != 0) {
                $discount_code = ($Check * $basketprice) / 100;
            }

            $finalprice = $basketprice + $postprice - $basketdiscount - $discount_code;

            return $finalprice;
        }

        function PostPrice()
        {
            self::SessionInit();
            $postID = self::SessionGet('post_type_Id');
            $result = $this->GetPostTypePrice($postID);

            return $result;
        }

        function GetPostTypeReview($PostId)
        {
            $sql = "select * from tbl_post_type WHERE id_post=? ";
            $param = [$PostId];
            $result = $this->do_select($sql, $param, 1);

            return $result;
        }


        function SaveOrder($discount_code)
        {
            // var_dump($myprice);
            self::SessionInit();
            $addressInfo2 = self::SessionGet('addressId');
            $addressInfo = unserialize($addressInfo2);
            //var_dump($addressInfo);

            $state = $addressInfo['state'];
            $city = $addressInfo['city'];
            $tel = $addressInfo['tel'];
            $family = $addressInfo['family'];
            $mobile = $addressInfo['mobile'];
            $email = $addressInfo['email'];
            $zipcode = $addressInfo['zipcode'];
            $passport = $addressInfo['passport'];
            $full_address = $addressInfo['full_address'];
            $pay = 1;
            //var_dump($full_address);


            $postID = self::SessionGet('post_type_Id');
            $UserId = self::SessionGet('UserId');
            // var_dump($postID);
            $postType = $this->GetPostTypeReview($postID);
            // $PostType = serialize($postType);
            $PostType = $postType['title'];


            $BasketInfo = $this->GetBasket();
            $Basket2 = $BasketInfo[0];
            $Basket = serialize($Basket2);
            // var_dump($Basket);

            $basketPrice = $BasketInfo[1];
            $basketDiscount = $BasketInfo[2];


            $PostPrice = $this->PostPrice();
            $FinalPostPrice = $PostPrice['price'];

            require_once 'public/jdf/jdf.php';
            $date = jdate('Y/n/j');

            $p_price = $this->calculatepriceBasket($discount_code);


            $discount_code = !empty($_POST['discount_code']) ? $_POST['discount_code'] : NULL;

            $reservation = !empty($_POST['reservation']) ? $_POST['reservation'] : NULL;
            $refrence = !empty($_POST['refrence']) ? $_POST['refrence'] : NULL;
            $reserve = !empty($_POST['reserve']) ? $_POST['reserve'] : NULL;
            $status = 1;

            $sql = 'INSERT INTO tbl_order (reservation,refrence,reserve,priceTotal,state,city,tel,family,mobile,zipcode,email,passport,full_address,post_type,basket,UserId,status,discount_code,pay,date,post_price) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $params = [$reservation, $refrence, $reserve, $p_price, $state, $city, $tel, $family, $mobile, $zipcode, $email, $passport, $full_address, $PostType, $Basket, $UserId, $status, $discount_code, $pay, $date, $FinalPostPrice];
            // var_dump($params);
            $this->do_query($sql, $params);
        }

        function deleteUserBasket()
        {
            self::SessionInit();
            $UserId = self::SessionGet('UserId');
            $sql = "delete from tbl_basket where ID_user=?";

            $this->do_query($sql, [$UserId]);


        }


        function index()
        {

        }


    }