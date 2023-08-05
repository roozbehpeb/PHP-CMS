<?php

    class model_admin_product extends Model
    {
        function __construct()
        {
            parent::__construct();
        }


        function get_product()
        {
            $sql = "select * from tbl_product";
            $result = $this->do_select($sql);

            return $result;
        }

        function get_product2()
        {
            $sql = "select tbl_product.id_product,tbl_product.ID_category , tbl_category.id_category,tbl_category.title from tbl_product INNER JOIN tbl_category on tbl_product.ID_category = tbl_category.id_category";
            $result = $this->do_select($sql);

            return $result;
        }


        function get_category()
        {
            $sql = "select * from tbl_category ORDER BY parent";
            $result = $this->do_select($sql);

            return $result;
        }


        function get_color()
        {
            $sql = "select * from tbl_color";
            $result = $this->do_select($sql);

            return $result;
        }

        function get_guarantee()
        {
            $sql = "select * from tbl_guarantee";
            $result = $this->do_select($sql);

            return $result;
        }

        function add_product($data = [], $id_product, $file)
        {


            //$product_title = $data['product_title'];
            //$id_category = $data['ID_category'];


            /* code type 1
            be Caution!  in this mode of coding you must set your default  column in database to -> Null!

            */
//            if (!empty($data['price'])) {
//                $price = $data['price'];
//            }


            /* code type 2 */
            // @$discount = $data['discount'];
            // $discount = !empty($_POST['discount']) ? $_POST['discount'] : NULL;


            //$description = $data['description'];
            // $description = !empty($_POST['description']) ? $_POST['description'] : NULL;

            // @$remain = $data['remain'];
            //$remain = !empty($_POST['remain']) ? $_POST['remain'] : NULL;

//            $id_product = '';
//            if (isset($data['id_product'])) {
//                $id_product = $data['id_product'];
//
//                 @$id_product = join(' , ', $id_product);
//                var_dump($id_product);
//            }

            if (isset($data['product_number'])) {
                $product_number = !empty($_POST['product_number']) ? $_POST['product_number'] : NULL;
            }

            if (isset($data['product_title'])) {
                $product_title = !empty($_POST['product_title']) ? $_POST['product_title'] : NULL;
            }


            if (isset($data['ID_category'])) {
                $id_category = !empty($_POST['ID_category']) ? $_POST['ID_category'] : NULL;
            }


            if (isset($data['description'])) {
                $description = !empty($_POST['description']) ? $_POST['description'] : NULL;
            }

//            $colors = '';
//            if (isset($data['get_color'])) {
//                $colors = $data['get_color'];
//                @$colors = join(' , ', $colors);
//                var_dump($colors);
//            }

//            $guarantees = '';
//            if (isset($data['get_guarantee'])) {
//                $guarantees = $data['get_guarantee'];
//                @$guarantees = join(' , ', $guarantees);
//            }
//
//            $price = '';
//            if (isset($data['price'])) {
//                $price = $data['price'];
//                @$price = join(' , ', $price);
//            }

//            $remain = '';
//            if (isset($data['remain'])) {
//                $remain = $data['remain'];
//                @$remain = join(' , ', $remain);
//            }
//            $discount = '';
//            if (isset($data['discount'])) {
//                $discount = !empty($_POST['discount']) ? $_POST['discount'] : NULL;
//                @$discount = join(' , ', $discount);
//            }

            if ($id_product == '') {
                $sql = "insert into tbl_product (title,product_number,ID_category,description) VALUES  (?,?,?,?)";
                $values = [$product_title, $product_number, $id_category, $description];
                $this->do_query($sql, $values);
                // var_dump( $this->do_query($sql, $values));


                /* Rooooozbeh code imporant !!!!!!!! */
            } else {
//                $sql = "update tbl_product set title=?,ID_category=?,price=?,discount=?,description=?,remain=?,color=?,guarantee=? WHERE id_product=?";
//                $values = [$product_title, $id_category, $price, $discount, $description, $remain, $colors, $guarantees, $id_product];
//                $this->do_query($sql, $values);

            }


            if ($id_product == '') {
                $id_product = parent::$conn->lastInsertId();
            }


            $dir = 'public/img/products/' . $id_product;
            $dir1 = 'public/img/products/' . $id_product . '/gallery/';
            $dir2 = 'public/img/products/' . $id_product . '/gallery/large';
            $dir3 = 'public/img/products/' . $id_product . '/gallery/small';
            $dir4 = 'public/img/products/' . $id_product . '/gallery/modal-gallery/';


            if (!is_dir($dir)) {
                mkdir($dir);
            }
            if (!is_dir($dir1)) {
                mkdir($dir1);
            }
            if (!is_dir($dir2)) {
                mkdir($dir2);
            }
            if (!is_dir($dir3)) {
                mkdir($dir3);
            }
            if (!is_dir($dir4)) {
                mkdir($dir4);
            }


//            $dir = 'public/img/products/' . $id_product;
//            if (!is_dir($dir)) {
//                mkdir($dir);
//            }


            if ($_FILES['upload']['size'] > 0) {
                $file = $_FILES['upload'];
                //var_dump($file);
                $FileName = $file['name'];
                $fileTemp = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileType = $file['type'];
                $fileError = $file['error'];
                $upload = 1;
                $path = 'public/img/products/' . $id_product . '/';
                $newName = 'product';
                if ($fileType != 'img/jpg' and $fileType != 'img/jpeg' and $fileType != 'img/png') {
                    $upload = 0;
                }

                if ($fileSize > 5097152) {
                    $upload = 0;
                }

                if ($upload = 1) {
                    $img_suffix = pathinfo($FileName, PATHINFO_EXTENSION);
                    $destination = $path . $newName . '.' . $img_suffix;
                    move_uploaded_file($fileTemp, $destination);
                    //$destination220 = $path . $newName .'_220.'. $img_suffix;
                    $destination220 = $path . $newName . '_220' . '.' . $img_suffix;
                    $destination350 = $path . $newName . '_350' . '.' . $img_suffix;

                    $this->create_thumbnail($destination, $destination220, 200, 200);
                    $this->create_thumbnail($destination, $destination350, 350, 350);

                }

            }


        }


        function add_product_sub($data = [], $id_product)
        {


            if (isset($data['product_number'])) {
                $product_number = !empty($_POST['product_number']) ? $_POST['product_number'] : NULL;
            }

            if (isset($data['get_color'])) {
                $color = !empty($_POST['get_color']) ? $_POST['get_color'] : NULL;
            }


            if (isset($data['price'])) {
                $price = !empty($_POST['price']) ? $_POST['price'] : NULL;
            }

            if (isset($data['remain'])) {
                $remain = !empty($_POST['remain']) ? $_POST['remain'] : NULL;
            }

            if (isset($data['discount'])) {
                $discount = !empty($_POST['discount']) ? $_POST['discount'] : NULL;
            }


            if (isset($data['get_guarantee'])) {
                $guarantee = !empty($_POST['get_guarantee']) ? $_POST['get_guarantee'] : NULL;
            }

            // var_dump($data);
            if ($id_product == '') {
                $sql = "insert into tbl_product_sub (product_number,color,price,remain,discount,guarantee) VALUES  (?,?,?,?,?,?)";
                $values = [$product_number, $color, $price, $remain, $discount, $guarantee];
                $this->do_query($sql, $values);
                //var_dump( $this->do_query($sql, $values));


            } else {
//                $sql = "update tbl_product set title=?,ID_category=?,price=?,discount=?,description=?,remain=?,color=?,guarantee=? WHERE id_product=?";
//                $values = [$product_title, $id_category, $price, $discount, $description, $remain, $colors, $guarantees, $id_product];
//                $this->do_query($sql, $values);
            }
        }

        function show_product_attribute()
        {

            $ID_category = @$get_productInfo['ID_category'];

            $sql = "select tbl_attribute.* , tbl_default_attribut_value.* FROM tbl_attribute
            JOIN tbl_default_attribut_value ON tbl_attribute.id_attribute = tbl_default_attribut_value.id_attribut
            WHERE  ID_category=?";

            // $sql="select * from tbl_attribute WHERE ID_category=? AND  ID_parent!=0 ";
            $result = $this->do_select($sql, [$ID_category]);

            foreach ($result as $key => $row) {
                $get_values = $this->get_default_attribut_value($row['id_attribute']);
                $result[$key]['values'] = $get_values;
            }

            return $result;
        }

        // roozbeh code in progress ...

        function get_default_attribut_value($attrId)
        {
            $sql = "select * from tbl_default_attribut_value WHERE id_attribut=?";
            $param = [$attrId];
            $result = $this->do_select($sql, $param);

            return $result;
        }

        function get_product_attribute($id_product)
        {
            $get_productInfo = $this->get_productInfo($id_product);

            $ID_category = @$get_productInfo['ID_category'];

            $sql = "select tbl_attribute.* , tbl_product_attribute.ID_default_value FROM tbl_attribute LEFT JOIN tbl_product_attribute ON tbl_attribute.id_attribute = tbl_product_attribute.ID_attribute AND tbl_product_attribute.ID_product=?  WHERE  ID_category=? AND  ID_parent!=0";

            // $sql="select * from tbl_attribute WHERE ID_category=? AND  ID_parent!=0 ";
            $result = $this->do_select($sql, [$id_product, $ID_category]);

            foreach ($result as $key => $row) {
                $get_values = $this->get_default_attribut_value($row['id_attribute']);
                $result[$key]['values'] = $get_values;
            }

            // var_dump($result['values']);

            return $result;
        }

        function get_productInfo($id_product)
        {
            $sql = "select * from tbl_product WHERE id_product=?";
            $result = $this->do_select($sql, [$id_product], 1);

            @$colors = $result['color'];
            @$guarantee = $result['guarantee'];

            $colors = explode(',', $colors);
            $guarantee = explode(',', $guarantee);

            @$result['colorInfo'] = [];

            @$result['guaranteeInfo'] = [];

            foreach ($colors as $row) {
                $sql = "select * from tbl_color WHERE id_color=?";
                @$colorInfo = $this->do_select($sql, [$row], 1);

                array_push($result['colorInfo'], $colorInfo);
                //var_dump($result['colorInfo']);
            }


            foreach ($guarantee as $row) {
                $sql = "select * from tbl_guarantee WHERE id_guarantee=?";
                @$guaranteeInfo = $this->do_select($sql, [$row], 1);

                array_push($result['guaranteeInfo'], $guaranteeInfo);
                //var_dump($result['guaranteeInfo']);
            }


            return $result;

        }

        function get_product_Specialist($id_product)
        {
            $sql = "select * from tbl_naghd WHERE ID_product=?";
            $result = $this->do_select($sql, [$id_product]);

            return $result;
        }

        function Specialist_Info($id_naghd)
        {
            $sql = "select * from tbl_naghd where id_naghd=?";
            $result = $this->do_select($sql, [$id_naghd], 1);

            //var_dump($result);
            return $result;
        }

        function add_product_Specialist($id_product, $data = [], $id_naghd = '')
        {


            if ($id_naghd == '') {

                $sql = "insert into tbl_naghd (title,description,ID_product) VALUES  (?,?,?)";
                $values = [$data['title'], $data['description'], $id_product];
                $res = $this->do_query($sql, $values);

                return $res;
            } else {
                $sql = "update tbl_naghd set title=?,description=? WHERE id_naghd=?";
                $values = [$data['title'], $data['description'], $id_naghd];
                $this->do_query($sql, $values);
            }


        }

        function delete_Specialist($id_naghd = [])
        {
            $id_naghd = join(',', $id_naghd);
            $sql = "delete from tbl_naghd where id_naghd IN ($id_naghd)";
            $this->do_query($sql);
        }

        function delete_product($id_product = [])
        {
            $id_product = join(',', $id_product);
            $sql = "delete from tbl_product where id_product IN ($id_product)";
            $this->do_query($sql);


            $sql = "delete from tbl_naghd where ID_product IN ($id_product)";
            $this->do_query($sql);


        }

        function Get_product_attribute2($id_product)
        {
            $sql = "select * from tbl_product_attribute WHERE ID_product=?";
            $param = [$id_product];
            $result = $this->do_select($sql, $param);

            return $result;
        }

        function Add_Attribute($data, $id_product)
        {


            $id_attribute = '';
            if (isset($data['id_attribute'])) {
                $id_attribute = $data['id_attribute'];
                //@$ids_attribute = join(' , ', $id_attribute);
                // var_dump($ids_attribute);
                // var_dump($ids_attribute);
            }

            $id_value = '';
            if (isset($data['IdVal'])) {
                $id_value = $data['IdVal'];
                //   @$idS_value = join(' , ', $id_value);
                //var_dump($idS_value);
            }

            //$result=[];
            foreach ($id_attribute as $row) {
                $sql = "select * from tbl_product_attribute WHERE ID_product=? AND ID_attribute=?";
                $param = [$id_product, $row];
                $result = $this->do_select($sql, $param);
            }

            var_dump($result);
            //return $result;


            foreach ($id_attribute as $key => $row) {


                $sql = "delete from tbl_product_attribute where ID_product=? and ID_attribute=?";
                $params = [$id_product, $row];
                $this->do_query($sql, $params);

                $sql = "insert into tbl_product_attribute (ID_product,ID_attribute,ID_default_value) VALUES (?,?,?)";
                $params = [$id_product, $row, $id_value[$key]];
                $this->do_query($sql, $params);
            }

        }

        function get_gallery($id_product)
        {
            $sql = "select * from tbl_gallery where ID_product=?";
            $result = $this->do_select($sql, [$id_product]);

            return $result;
        }


        function add_gallery($id_product, $file2)
        {
            $file = $file2;
            //var_dump($file);
            $FileName = $file['name'];
            $fileTemp = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileType = $file['type'];
            $fileError = $file['error'];
            $upload = 1;
            $path = 'public/img/products/' . $id_product . '/gallery/';
            $newName = time();
            if ($fileType != 'img/jpg' and $fileType != 'img/jpeg' and $fileType != 'img/png') {
                $upload = 0;
            }

            if ($fileSize > 5097152) {
                $upload = 0;
            }

            if ($upload = 1) {
                $img_suffix = pathinfo($FileName, PATHINFO_EXTENSION);
                $destination = $path . 'large/' . $newName . '.' . $img_suffix;
                move_uploaded_file($fileTemp, $destination);

                $destination_small = $path . 'small/' . $newName . '.' . $img_suffix;

                $this->create_thumbnail($destination, $destination_small, 115, 155);

                $sql = "insert into tbl_gallery (image_name,ID_product) values (?,?)";
                $param = [$newName . '.' . $img_suffix, $id_product];
                $this->do_query($sql, $param);

            }

        }

        function delete_gallery($id_gallery = [], $id_product)
        {

            foreach ($id_gallery as $row) {

                $sql = "select * from tbl_gallery WHERE id_gallery=?";
                $result = $this->do_select($sql, [$row], 1);
                $FileName = $result['image_name'];
                $dir = 'public/img/products' . '/' . $id_product . '/' . 'gallery/';
                $dir_small = $dir . 'small/' . $FileName;
                $dir_large = $dir . 'large/' . $FileName;
                unlink($dir_small);
                unlink($dir_large);
            }
            $id_gallery = join(',', $id_gallery);
            $sql = "delete from tbl_gallery where id_gallery IN ($id_gallery)";
            $this->do_query($sql);
        }


        function attr_of_category($id_categor)
        {
             $sql2 = "SELECT * from tbl_attribute WHERE ID_parent !=0  and ID_category=?";
                $param = [$id_categor];
                $result = $this->do_select($sql2, $param);

                return $result;
        }


        function attr_of_category2($id_attribute)
        {
            $sql2 = "SELECT tbl_attribute.*,tbl_default_attribut_value.* 
             FROM tbl_attribute
             JOIN tbl_default_attribut_value ON tbl_attribute.id_attribute = tbl_default_attribut_value.id_attribut
             WHERE tbl_attribute.id_attribute = ? and ID_parent !=0 ";
            $param = [$id_attribute];
            $result = $this->do_select($sql2, $param);

            return $result;
        }


    }