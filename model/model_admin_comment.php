<?php

    class Model_admin_comment extends Model
    {


        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
        }

        function getcomment()
        {

            $sql = "select tbl_comment.*,tbl_product.title as title_product
            from tbl_comment
            LEFT JOIN tbl_product
             ON tbl_comment.ID_product =tbl_product.id_product";
            $param = [];
            $result = $this->do_select($sql, $param);

            return $result;
        }


        function confirm($ids)
        {

            $IdComment = implode(',', $ids['Id_Comment']);
            $sql = "update tbl_comment set confirm=1 where id_comment IN ($IdComment) ";
            $this->do_query($sql);


        }

        function unconfirm($ids)
        {

            $IdComment = implode(',', $ids['Id_Comment']);
            $sql = "update tbl_comment set confirm=0 where id_comment IN ($IdComment) ";
            $this->do_query($sql);

        }

        function delete($ids)
        {

            $IdComment = implode(',', $ids['Id_Comment']);
            $sql = "delete from tbl_comment where id_comment IN ($IdComment)";
            $this->do_query($sql);


        }

    }