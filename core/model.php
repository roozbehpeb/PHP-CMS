<?php

    class Model
    {
        public static $conn = '';

        function __construct()
        {
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'digitalocean';
            $attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password, $attr);
            require_once 'public/jdf/jdf.php';
        }


        public static function GetUserLevel()
        {
            self::SessionInit();
            $userId = self::SessionGet('UserId');
            $sql = "select * from tbl_user WHERE id_user=?";
            $result = @self::do_select($sql, [$userId], 1);

            return @$result['level'];
        }

        function Getmenu($parentId = 0)
        {
            $sql = "select * from tbl_category where parent=?";
            $result = $this->do_select($sql, [$parentId]);
            foreach ($result as $row) {
                $children = $this->Getmenu($row['id_category']);
                if (sizeof([$children]) > 0) {
                    $row['children'] = $children;
                }
                @$data[] = $row;
            }

            return @$data;
        }


        public static function jaliliDate($format = 'Y/n/j')
        {

            $date = jdate($format);

            return $date;
        }

        public static function jaliliToMiladi($jalili, $format = '/')
        {

            $jalili = explode('/', $jalili);
            $year = $jalili[0];
            $month = $jalili[1];
            $day = $jalili[2];
            $date = jalali_to_gregorian($year, $month, $day);
            $date = implode($format, $date);

            $date = new DateTime($date);
            $date = $date->format('Y/m/d');

            return $date;
        }

        public static function MiladiTojalili($miladi, $format = '/')
        {

            $miladi = explode('/', $miladi);
            $year = $miladi[0];
            $month = $miladi[1];
            $day = $miladi[2];
            $date = gregorian_to_jalali($year, $month, $day);
            $date = implode($format, $date);

            $date = new DateTime($date);
            $date = $date->format('Y/m/d');


            return $date;
        }


        public static function getoption()
        {
            $sql = "select * from tbl_option";
            $stm = self::$conn->prepare($sql);
            $stm->execute();
            $option = $stm->fetchAll();

            /* $option_new=[];*/
            foreach ($option as $row) {

                $setting = $row['setting'];
                $value = $row['value'];

                $option_new[$setting] = $value;
            }

            return $option_new;

        }

        public function calculate_discount($price, $discount)
        {
            $discount_price = ($price * $discount) / 100;
            $total_price = $price - $discount_price;

            return [$discount_price, $total_price];
        }


        function do_select($sql, $values = [], $fetch = '', $fetchstyle = PDO::FETCH_ASSOC)
        {
            $stmt = self::$conn->prepare($sql);
            foreach ($values as $key => $value) {
                $stmt->bindValue($key + 1, $value);
            }
            $stmt->execute();
            if ($fetch == '') {
                $result = $stmt->fetchAll($fetchstyle);
            } else {
                $result = $stmt->fetch($fetchstyle);
            }

            return $result;
        }


        function do_select2($sql, $values = [], $fetch = '', $fetchstyle = PDO::FETCH_ASSOC)
        {
            $stmt = self::$conn->prepare($sql);
            foreach ($values as $key => $value) {
                $stmt->rowCount($key + 1, $value);
            }
            $stmt->execute();
            if ($fetch == '') {
                $result = $stmt->fetchAll($fetchstyle);
            } else {
                $result = $stmt->fetch($fetchstyle);
            }

            return $result;
        }


        function do_query($sql, $values = [])
        {
            $stmt = self::$conn->prepare($sql);
            foreach ($values as $key => $value) {
                $stmt->bindValue($key + 1, $value);
            }
            $stmt->execute();


        }

        function do_query2($sql, $values = [])
        {
            $stmt = self::$conn->prepare($sql);
            foreach ($values as $key => $value) {
                $stmt->bindParam($key + 1, $value);
            }
            $stmt->execute();


        }


        function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
        {

            $new_height = $h;

            list($width, $height) = getimagesize($file);

            $r = $width / $height;

            if ($crop) {
                if ($width > $height) {
                    $width = ceil($width - ($width * abs($r - $w / $h)));
                } else {
                    $height = ceil($height - ($height * abs($r - $w / $h)));
                }
                $newwidth = $w;
                $newheight = $h;
            } else {
                if ($w / $h > $r) {
                    $newwidth = $h * $r;
                    $newheight = $h;
                } else {
                    $newheight = $w / $r;
                    $newwidth = $w;
                }
            }

            $what = getimagesize($file);

            switch (strtolower($what['mime'])) {
                case 'image/png':
                    $src = imagecreatefrompng($file);

                    break;
                case 'image/jpeg':
                    $src = imagecreatefromjpeg($file);
                    break;
                case 'image/gif':
                    $src = imagecreatefromgif($file);
                    break;
                default:
                    //die();
            }

            if ($new_height != '') {
                $newheight = $new_height;
            }

            $dst = imagecreatetruecolor($newwidth, $newheight);//the new image
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);//az function

            imagejpeg($dst, $pathToSave, 95);//pish farz in tabe 75 darsad quality ast

            return $dst;


        }

        public static function SessionInit()
        {
            @session_start();
        }

        public static function SessionSet($name, $value)
        {
            $_SESSION[$name] = $value;
        }

        public static function SessionGet($name)
        {
            if (isset($_SESSION[$name])) {
                return $_SESSION[$name];
            } else {
                return FALSE;
            }
        }

        public static function GetBasketCookie()
        {
            if (isset($_COOKIE['basket'])) {
                $cookie = $_COOKIE['basket'];
            } else {
                $expire = time() + 7 * 24 * 3600;
                $value = time() + rand(1, 9000);
                setcookie('basket', $value, $expire, '/');
                $cookie = $value;

            }

            return $cookie;
        }


        function GetBasketHeader()
        {
            $sql = "select b.id_basket,b.count, P.*, c.title as ttitlecolor,c.hex, g.title as Titleguarantee
             from tbl_basket b 
             JOIN tbl_product p ON  b.ID_product=p.id_product
             JOIN tbl_color c ON b.color=c.id_color
             JOIN tbl_guarantee g ON b.guarantee=g.id_guarantee
             where cookie = ?";


            $cookie = self::GetBasketCookie();
            $param = [$cookie];
            $result = $this->do_select($sql, $param);
            self::SessionInit();
            self::SessionSet('BasketHeader', $result);
            //var_dump($result);

            $discountAll = 0;
            foreach ($result as $key => $row) {
                $discount = ($row['price'] * $row['discount']) / 100;
                $discountTotal = $row['count'] * $discount;
                $discountAll = $discountTotal + $discountAll;
                $result[$key]['discountTotal'] = $discountTotal;
            }


            $pricefinal = 0;
            foreach ($result as $row) {
                $price = $row['price'];
                $count = $row['count'];
                $priceTotal = $price * $count;
                $pricefinal = $priceTotal + $pricefinal;
            }

            return [$result, $pricefinal, $discountAll];
        }


        function GetBasket()
        {
            $sql = "select b.id_basket,b.count, P.*, c.title as TitleColor, g.title as Titleguarantee
             from tbl_basket b 
             JOIN tbl_product p ON  b.ID_product=p.id_product
             JOIN tbl_color c ON b.color=c.id_color
             JOIN tbl_guarantee g ON b.guarantee=g.id_guarantee
             where cookie = ?";

            /*$sql = "select tbl_basket.count,tbl_basket.id_basket , tbl_product.* from tbl_basket JOIN tbl_product ON tbl_basket.ID_product=tbl_product.id_product where cookie = ?";*/
            //$sql="select * from tbl_basket where cookie = ?";


            $cookie = self::GetBasketCookie();
            $param = [$cookie];
            $result = $this->do_select($sql, $param);
            //var_dump($result);

            $discountAll = 0;
            foreach ($result as $key => $row) {
                $discount = ($row['price'] * $row['discount']) / 100;
                $discountTotal = $row['count'] * $discount;
                $discountAll = $discountTotal + $discountAll;
                $result[$key]['discountTotal'] = $discountTotal;
            }


            $pricefinal = 0;
            foreach ($result as $row) {
                $price = $row['price'];
                $count = $row['count'];
                $priceTotal = $price * $count;
                $pricefinal = $priceTotal + $pricefinal;
            }

            return [$result, $pricefinal, $discountAll];
        }


        function GetPostTypePrice($postId)
        {
            $sql = 'select * from tbl_post_type WHERE id_post=?';
            $param = [$postId];
            $result = $this->do_select($sql, $param, 1);

            // $result = $this->do_select($sql, $param,1);

            return $result;
        }


        function ProductExist()
        {
            $sql = 'select * from tbl_basket WHERE cookie=?';

            $cookie = self::GetBasketCookie();

            $param = [$cookie];
            $result = $this->do_select($sql, $param);


            if (sizeof($result) > 0) {
                // echo 'valid';
                // return TRUE;
                return 100;

            } else {
                //return FALSE;
                return 0;
            }


        }


        function QuantityBasket()
        {
            $cookie = self::GetBasketCookie();

            $sql = 'select count from tbl_basket WHERE cookie=? ';
            //$param=[$cookie];
            $param = [$cookie];
            $result = $this->do_select($sql, $param);

            $Allcount = [];
            foreach ($result as $row) {
                $a = $row['count'];
                array_push($Allcount, $a);
            }

            //var_dump($Allcount);
            return array_sum($Allcount);

        }


        function UpdataBasket($data)
        {
            $count = $data['count'];
            $basketId = $data['BasketId'];

            $sql = "update tbl_basket set   count=?  WHERE id_basket=? ";
            $param = [$count, $basketId];
            $this->do_query($sql, $param);
        }

    }


