<?php

    class model_panel extends Model
    {
        public $CheckLogin = '';

        private $UserId;

        function __construct()
        {
            parent::__construct();

            Model::SessionInit();

            $this->CheckLogin = Model::SessionGet('UserId');
            if ($this->CheckLogin == FALSE) {
                header('location:' . URL . 'login');
            }


            $this->UserId = Model::SessionGet('UserId');

        }

        function GetUserInfo()
        {
            $UserId = $this->UserId;

            $sql = 'select * from tbl_user WHERE id_user=?';
            $param = [$UserId];
            $result = $this->do_select($sql, $param, 1);

            return $result;
        }

        function Statistics()
        {
            $Statistics = [];
            $UserId = $this->UserId;

            $sql = 'select * from tbl_order WHERE UserId=?';
            $param = [$UserId];
            $result = $this->do_select($sql, $param);
            $Statistics['num_order'] = sizeof($result);

            $sql = 'select * from tbl_order WHERE UserId=? AND status=1';
            $param = [$UserId];
            $result = $this->do_select($sql, $param);
            $Statistics['order_verify'] = sizeof($result);

            $sql = 'select * from tbl_order WHERE UserId=? AND status=2';
            $param = [$UserId];
            $result = $this->do_select($sql, $param);
            $Statistics['order_progress'] = sizeof($result);

            $sql = 'select * from tbl_comment WHERE user=?';
            $param = [$UserId];
            $result = $this->do_select($sql, $param);
            $Statistics['comment_num'] = sizeof($result);

            $sql = 'select * from tbl_massage WHERE UserId=? AND status=0';
            $param = [$UserId];
            $result = $this->do_select($sql, $param);
            $Statistics['unread_massage'] = sizeof($result);

            $sql = 'select * from tbl_massage WHERE UserId=? AND status=1';
            $param = [$UserId];
            $result = $this->do_select($sql, $param);
            $Statistics['read_massage'] = sizeof($result);


            return $Statistics;
        }

        function GetMassage()
        {
            $UserId = $this->UserId;

            $sql = 'select * from tbl_massage WHERE UserId=?';
            $param = [$UserId];
            $result = $this->do_select($sql, $param);
            foreach ($result as $row) {
                $sql = 'update tbl_massage set status=1 WHERE id_massage=?';
                $param = [$row['id_massage']];
                $this->do_query($sql, $param);
            }

            return $result;
        }

        function GetOrder()
        {
            $UserId = $this->UserId;
            $sql = 'select tbl_order.*,tbl_order_status.title
            from tbl_order
            RIGHT JOIN tbl_order_status
            ON tbl_order_status.id_status = tbl_order.status
            WHERE UserId=?';
            $param = [$UserId];
            $result = $this->do_select($sql, $param);

            return $result;
        }


        function GetFolder()
        {
            $UserId = $this->UserId;
            $sql = 'select * from tbl_favorite WHERE UserId=? AND parent=0';
            $param = [$UserId];
            $result = $this->do_select($sql, $param);

            return $result;
        }

        function FavoriteProduct($FolderId)
        {
            $UserId = $this->UserId;

            //$FolderId !=0 used for specific products select by user
            if ($FolderId != 0) {
                $sql = 'select tbl_favorite.* ,tbl_product.title as title_product,price  
            from tbl_favorite
             LEFT JOIN tbl_product
             ON tbl_favorite.id_product=tbl_product.id_product
             WHERE UserId=? AND parent=?';
                $param = [$UserId, $FolderId];

                //$FolderId ==0 used for all products select by user
            } elseif ($FolderId == 0) {
                $sql = 'select tbl_favorite.* ,tbl_product.title as title_product,price  
            from tbl_favorite
             LEFT JOIN tbl_product
             ON tbl_favorite.id_product=tbl_product.id_product
             WHERE UserId=? AND parent != 0';
                $param = [$UserId];
            }

            $result = $this->do_select($sql, $param);

            return $result;

        }


        function SaveEdit($FolderId, $Newname)
        {
            $sql = 'update tbl_favorite set title=? WHERE id_favorite=?';
            $param = [$Newname, $FolderId];
            $this->do_query($sql, $param);
        }

        function deleteFavorite($FavoriteId)
        {

            $sql = "delete from tbl_favorite WHERE id_favorite=?";
            $param = [$FavoriteId];
            $this->do_query($sql, $param);
        }

        function GetComment()
        {
            $UserId = $this->UserId;
            $sql = "select tbl_comment.*,tbl_product.title as title_product
            from tbl_comment
            LEFT JOIN tbl_product
             ON tbl_comment.ID_product =tbl_product.id_product
             WHERE user=?";
            $param = [$UserId];
            $result = $this->do_select($sql, $param);

            return $result;

        }

        function deleteComment($CommentId)
        {

            $sql = "delete from tbl_comment WHERE id_comment=?";
            $param = [$CommentId];
            $this->do_query($sql, $param);

        }

        function Get_discount_code()
        {
            $UserId = $this->UserId;
            $sql = 'select * from tbl_discount_code WHERE UserId=?';
            $param = [$UserId];
            $result = $this->do_select($sql, $param);
            foreach ($result as $key => $row) {
                $sql = "select * from tbl_order WHERE discount_code=? AND UserId=?";
                $param = [$row['discount_code'], $UserId];
                $order = $this->do_select($sql, $param);
                $result[$key]['orders'] = $order;

                // today date from jdf file
                $today_date = self::jaliliDate();
                // echo $today = self::jalaliDate();

                // discount_code dead line from DB
                $date_end = $row['date_end'];
                // echo $date_end;


                $today = new DateTime($today_date);
                $expire = new DateTime($date_end);
                $status = '';

                if ($expire->format('Y-m-d') >= $today->format('Y-m-d')) {
                    $status = 'معتبر';
                } else {
                    $status = 'منقضی شده';
                }
                $result[$key]['status'] = $status;


            }

            return $result;
        }

        function savecode($data)
        {
            $code = $data['code'];
            $UserId = $this->UserId;
            $sql = 'update tbl_discount_code set UserId=? WHERE discount_code=?';
            $param = [$UserId, $code];
            $this->do_query($sql, $param);

        }


        function EditProfile($data)
        {
            $user_name = $data['user_name'];
            $tel = $data['tel'];
            $born = $data['born'];
            $address = $data['address'];

            if (isset($_POST['newsletter'])) {
                $newsletter = 1;
            } else {
                $newsletter = 0;
            }

            $UserId = $this->UserId;
            $sql = 'update tbl_user set  user_name=?, tel=?, born=?,  address=?, newsletter=? WHERE id_user=?';
            $param = [$user_name, $tel, $born, $address, $newsletter, $UserId];
            $this->do_query($sql, $param);
        }

        function change_pass($data)
        {
            $UserId = $this->UserId;

            $old_password = $data['old_pass'];
            $new_password = $data['new_pass'];
            $confirm_password = $data['confirm_pass'];

            $error = 'رمز عبور با موفقیت تغییر یافت';

            $UserInfo = $this->GetUserInfo();

            $db_password = $UserInfo['password'];
            if ($old_password == $db_password) {
                if ($new_password == $confirm_password) {
                    $sql = "update tbl_user set password=? WHERE id_user=?";
                    $param = [$new_password, $UserId];
                    $this->do_query($sql, $param);
                } else {
                    $error = "تکرار رمز جدید با رمز جدید برابر نیست! دوباره سعی کنید";
                }

            } else {
                $error = "رمز فعلی صحیح نمباشد! دوباره سعی کنید";
            }

            header('location:' . URL . 'panel/change_password?error=' . $error);


        }

        function logout()
        {

            self::SessionInit();
            unset($_SESSION['UserId']);
            //session_write_close();
            // session_destroy();
        }


        function index()
        {

        }


    }


?>