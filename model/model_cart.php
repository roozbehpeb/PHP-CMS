<?php

    class model_cart extends Model
    {
        function __construct()
        {

            parent::__construct();
        }

        function index()
        {


        }


        function deleteBasket($basketId)
        {
            $sql = "delete from tbl_basket where id_basket=?";
            $this->do_query($sql, [$basketId]);
        }


    }

?>