<?php

    class model_addcomment extends Model
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

        function productInfo($productId)
        {
            $sql = "select * from tbl_product WHERE id_product=?";
            $param = [$productId];
            $result = $this->do_select($sql, $param, 1);

            return $result;

        }


        function getParam($productId)
        {
            $ProductInfo = $this->productInfo($productId);
            // var_dump($ProductInfo);
            $categoyId = $ProductInfo['ID_category'];
            //var_dump($categoyId);
            $sql = "select * from tbl_comment_rate WHERE ID_category=?";
            $param = [$categoyId];
            $result = $this->do_select($sql, $param);

            return $result;
        }


        function savecomment($data, $IdProduct, $id_comment)
        {
            $params_comment = $this->getParam($IdProduct);
            $params_result = [];
            foreach ($params_comment as $row) {
                $paramId = $row['id_comment_rate'];
                $values = $_POST['param' . $paramId];
                $params_result[$paramId] = $values;
            }

            $title = $_POST['title'];
            $massage = $_POST['massage'];
            self::SessionInit();
            $user = self::SessionGet('UserId');
            $id_comment = $_POST['id_comment'];
            $date = !empty($_POST['date']) ? $_POST['date'] : NULL;
            $positive = !empty($_POST['positive']) ? $_POST['positive'] : NULL;
            $negative = !empty($_POST['negative']) ? $_POST['negative'] : NULL;
            $likecount = !empty($_POST['likecount']) ? $_POST['likecount'] : NULL;
            $dislikecount = !empty($_POST['dislikecount']) ? $_POST['dislikecount'] : NULL;
            $confirm = 0;

            $sql = "select * from tbl_comment WHERE ID_product=? AND user=?";
            $param = [$IdProduct, $user];
            $result = $this->do_select($sql, $param);
            if (isset($result[0])) {
                $sql = "update tbl_comment set title=?,viewpoint=?,date=?,positive=?,negative=?,likecount=?,dislikecount=?,ID_product=?,comment_score=?,user=?,confirm=? WHERE id_comment=$id_comment";
            } else {
                $sql = "insert into tbl_comment (title,viewpoint,date,positive,negative,likecount,dislikecount,ID_product,comment_score,user,confirm) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            }
            $array = [$title, $massage, $date, $positive, $negative, $likecount, $dislikecount, $IdProduct, serialize($params_result), $user, $confirm];

            $this->do_query($sql, $array);

            header('location:' . URL . 'panel');
            /*  header('location:' . URL . 'addcomment/index/' . $IdProduct);*/

        }


        /* function commentInfo($productId)
         {
             self::SessionInit();
             $user = self::SessionGet('UserId');
             $sql = "select * from tbl_comment WHERE ID_product=? AND user=? AND id_comment=?";
             $param = [$productId,$user,];
             $result = $this->do_select($sql, $param, 1);

             return $result;
         }*/

        function commentInfo($ID_product, $id_comment)
        {
            self::SessionInit();
            $user = self::SessionGet('UserId');
            $sql = "select * from tbl_comment WHERE ID_product=? AND id_comment=? AND user=?";
            $param = [$ID_product, $id_comment, $user,];
            $result = $this->do_select($sql, $param, 1);

            return $result;
        }


    }


