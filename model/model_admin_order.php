<?php

    class Model_admin_order extends Model
    {

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {

        }


        function GetOrder()
        {

            $sql = "select tbl_order.*,tbl_order_status.title
            from tbl_order
            RIGHT JOIN tbl_order_status
            ON tbl_order_status.id_status = tbl_order.status WHERE UserId != '' ";
            $result = $this->do_select($sql);

            return $result;
        }


        function order_edit($id_order)
        {
            $sql = "select * from tbl_order WHERE id_order=?";
            $param = [$id_order];
            $result = $this->do_select($sql, $param, 1);

            return $result;
        }


        function order_update($data, $id_order)
        {

            /*      $state = $data['state'];
                  $city = $data['city'];
                  $tel = $data['tel'];
                  $zipcode = $data['zipcode'];
                  $full_address = $data['full_address'];
                  $id_order = $data['id_order'];*/

            /*$state = !empty($_POST['state']) ? $_POST['state'] : NULL;
            $city = !empty($_POST['city']) ? $_POST['city'] : NULL;
            $tel = !empty($_POST['tel']) ? $_POST['tel'] : NULL;
            $zipcode = !empty($_POST['zipcode']) ? $_POST['zipcode'] : NULL;
            $full_address = !empty($_POST['full_address']) ? $_POST['full_address'] : NULL;*/

            $state = !empty($data['state']) ? $data['state'] : NULL;
            $city = !empty($data['city']) ? $data['city'] : NULL;
            $tel = !empty($data['tel']) ? $data['tel'] : NULL;
            $zipcode = !empty($data['zipcode']) ? $data['zipcode'] : NULL;
            $full_address = !empty($data['full_address']) ? $data['full_address'] : NULL;


            $sql = "update tbl_order set state=?,city=?,tel=?,zipcode=?,full_address=? WHERE id_order=?";
            $values = [$state, $city, $tel, $zipcode, $full_address, $id_order];
            $this->do_query($sql, $values);
        }


        function Sales_Invoice1($id_order)
        {
            $sql = "select * from tbl_order  WHERE UserId != '' AND id_order=?";
            $param = [$id_order];
            $result = $this->do_select($sql, $param);

            return $result;
        }

        function Sales_Invoice2($id_order)
        {
            $sql2 = "select b.id_basket,b.count, P.*, c.title as TitleColor, g.title as Titleguarantee
             from tbl_basket b
             JOIN tbl_product p ON  b.ID_product=p.id_product
             JOIN tbl_color c ON b.color=c.id_color
             JOIN tbl_guarantee g ON b.guarantee=g.id_guarantee WHERE id_order=? ";
            $param = [$id_order];
            $result = $this->do_select($sql2, $param);

            return $result;
        }

        function delete_order($IdOrders)
        {
            /* old method !
             * foreach ($IdOrders as $Ids) {
                $sql = "delete from tbl_order WHERE  id_order=?";
                $param = [$Ids];
                $this->do_query($sql, $param);
            }*/
            //$IdOrders = join(',', $IdOrders['Id_orders']);

            $IdOrders = implode(',', $IdOrders['Id_orders']);
            var_dump($IdOrders);
            $sql = "delete from tbl_order WHERE  id_order IN ($IdOrders)  ";
            $param = [];
            $this->do_query($sql, $param);
        }


        /*  function getorders(){
              $sql="select * from tbl_order  ORDER by id_order DESC ";
              $result=$this->do_select($sql);
              return $result;
          }*/


        /*  function getorders(){
              $sql="select * from tbl_order  ORDER by id_order DESC ";
              $result=$this->do_select($sql);


              foreach ($result as $key=>$row){

                  $basket=unserialize(@$result[$key]['basket']);

                  var_dump($basket[0]['id_product']);
                  $id_product=$basket[0]['id_product'];
                 // var_dump($key);
              }

          //  $basket=unserialize(@$result[0]['basket']);
           //var_dump($basket[0]['id_product']);


              return $result;
          }*/

    }