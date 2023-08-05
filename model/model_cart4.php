<?php

    class model_cart4 extends Model
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

        function GetBasketReview()
        {
            // return parent::GetBasket();
            return parent::GetBasket();
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

        function index()
        {

        }


    }