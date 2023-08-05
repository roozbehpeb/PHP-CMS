<?php

    class model_cart3 extends Model
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


        function index()
        {


        }

        function add_address($data, $UpdateAddress)
        {
            $family = !empty($data['family']) ? $data['family'] : NULL;
            $mobile = !empty($data['mobile']) ? $data['mobile'] : NULL;
            $tel = !empty($data['tel']) ? $data['tel'] : NULL;
            $email = !empty($data['email']) ? $data['email'] : NULL;
            $passport = !empty($data['passport']) ? $data['passport'] : NULL;
            $zipcode = !empty($data['zipcode']) ? $data['zipcode'] : NULL;
            $province = !empty($data['state']) ? $data['state'] : NULL;
            $city = !empty($data['city']) ? $data['city'] : NULL;
            $full_address = !empty($data['full_address']) ? $data['full_address'] : NULL;
            Model::SessionInit();
            $ID_user = Model::SessionGet('UserId');

            if ($UpdateAddress == '') {
                $sql = "insert into tbl_user_address (ID_user,family,mobile,tel,email,passport,zipcode,state,city,full_address)                   VALUES (?,?,?,?,?,?,?,?,?,?) ";
                $param = [$ID_user, $family, $mobile, $tel, $email, $passport, $zipcode, $province, $city, $full_address];
            } else {
                $sql = "update tbl_user_address set family=?,mobile=?,tel=?,email=?,passport=?,zipcode=?,state=?,city=?,full_address=?  WHERE id_user_address=?";
                $param = [$family, $mobile, $tel, $email, $passport, $zipcode, $province, $city, $full_address, $UpdateAddress];
            }

            $this->do_query($sql, $param);

        }

        function GetAddress()
        {
            Model::SessionInit();
            $ID_user = Model::SessionGet('UserId');
            $sql = 'select * from tbl_user_address where ID_user=? ORDER BY id_user_address DESC';
            $param = [$ID_user];
            $resul = $this->do_select($sql, $param);

            return $resul;
        }

        function GetPostType()
        {
            $sql = 'select * from tbl_post_type';
            $result = $this->do_select($sql);

            return $result;
        }


        function GetAddressInfo($id_user_address)
        {
            $sql = 'select * from tbl_user_address where id_user_address=?';
            $param = [$id_user_address];
            $resul = $this->do_select($sql, $param, 1);

            return $resul;
        }


        function GetPostTypePrice($postId)
        {
            $sql = 'select * from tbl_post_type WHERE id_post=?';
            $param = [$postId];
            $result = $this->do_select($sql, $param);

            // $result = $this->do_select($sql, $param,1);

            return $result;
        }

        function GetPostPrice($data)
        {

            $addressId = $data['addressId'];
            $postId = $data['post_typeId'];


            //Roozbeh Note:  because we don't use API frotel in this sample project so we can remmove below code.
            // but now i use this code in http://digitalocean.tv/cart4 for call user address
            // see note:163
            $user_Address = $this->GetAddressInfo($addressId);
            $user_Address = serialize($user_Address);
            self::SessionInit();
            self::SessionSet('addressId', $user_Address);
            ///Roozbeh Note:  because we don't use API frotel in this sample project so we can remmove up code.


            $postprice = $this->GetPostTypePrice($postId);
            //see
            // $postprice=$postprice['price'];
            $postprice = $postprice[0]['price'];
            //var_dump($postprice);
            $basketinfo = $this->GetBasket();
            $basketprice = $basketinfo[1];
            //var_dump($basketprice);


            $FinalPriceBasket = $postprice + $basketprice;
            $FinalPriceProduct = $basketprice;

            $data = ['FinalPriceBasket' => $FinalPriceBasket, 'FinalPriceProduct' => $FinalPriceProduct];
            echo json_encode($data);

        }


        function SessionPostType($data)
        {
            self::SessionInit();
            self::SessionSet('post_type_Id', $data['post_type_Id']);
            echo self::SessionGet('post_type_Id');
            /* $postID=self::SessionGet('post_type_Id');
             $root=$this->GetPostTypePrice($postID);
             return $root;*/
        }


        function deleteUserAddress($data)
        {
            $sql = "delete from tbl_user_address where id_user_address=?";
            $this->do_query($sql, [$data]);

        }

        function UpdataBasketUserId($get_UserId)
        {
            $cookie = self::GetBasketCookie();
            $sql = "update tbl_basket set   ID_user=?  WHERE cookie=? ";
            $param = [$get_UserId, $cookie];
            $this->do_query($sql, $param);
        }


    }