<?php

    class Model_admin_category extends Model
    {

        public $AllChildrenCategoryId = [];
        public $AllChildrenattributeId = [];

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {

        }

        function get_category()
        {
            $sql = "select * from tbl_category ORDER BY parent";
            $result = $this->do_select($sql);

            return $result;
        }

        function main_category()
        {
            $sql = "select * from tbl_category where parent=0";
            $result = $this->do_select($sql);

            return $result;
        }

        function child_category($id_category)
        {
            $sql = "select * from tbl_category where parent=?";
            $result = $this->do_select($sql, [$id_category]);

            return $result;
        }

        function parents_category($id_category)
        {
            $Category_Info = $this->Category_Info($id_category);
            $parent = @$Category_Info['parent'];
            $all_parents = [];
            while ($parent != 0) {
                $sql = "select * from tbl_category where id_category=?";
                $parent_category = $this->do_select($sql, [$parent], 1);
                array_push($all_parents, $parent_category);
                $parent = $parent_category['parent'];
            }

            return $all_parents;
        }

        function Category_Info($id_category)
        {
            $sql = "select * from tbl_category where id_category=?";
            $resutl = $this->do_select($sql, [$id_category], 1);

            return $resutl;


        }

        function add_category($title, $parent, $id_category, $edit)
        {
            if ($edit == '') {

                $sql = "insert into tbl_category (title,parent) VALUES (?,?)";
                $smt = self::$conn->prepare($sql);
                $smt->bindValue(1, $title);
                $smt->bindValue(2, $parent);
                $smt->execute();
            } else {
                $sql = "update tbl_category set title=?, parent=? WHERE id_category=?";
                $smt = self::$conn->prepare($sql);
                $smt->bindValue(1, $title);
                $smt->bindValue(2, $parent);
                $smt->bindValue(3, $id_category);
                $smt->execute();
            }


        }

        //function getchild use for finde the  id_category of child_category.
        function get_child_category($cat_ids)
        {
            //  Exaple roozbeh !
            //  $id_category=array(1,2,3);
            $children_ids = [];
            foreach ($cat_ids as $cat_ID) {
                $children = $this->child_category($cat_ID);
                foreach ($children as $row) {
                    array_push($children_ids, $row['id_category']);
                }
            }

            return $children_ids;
        }

        function delete_category($cat_ids)
        {
            $this->AllChildrenCategoryId = array_merge($this->AllChildrenCategoryId, $cat_ids);
            while (sizeof($cat_ids) > 0) {
                $child_Ids = $this->get_child_category($cat_ids);
                $this->AllChildrenCategoryId = array_merge($this->AllChildrenCategoryId, $child_Ids);
                $cat_ids = $child_Ids;
            }

            var_dump($this->AllChildrenCategoryId);


            $delet_category = join(',', $this->AllChildrenCategoryId);
            //$sql = "delete from tbl_category where id_category IN (?)";
            $sql = "delete from tbl_category where id_category IN ($delet_category)";
            $this->do_select($sql, [$cat_ids]);


        }


        function attribute_Info($id_attribute)
        {
            $sql = "select * from tbl_attribute WHERE id_attribute=?";
            $result = $this->do_select($sql, [$id_attribute], 1);

            return $result;
        }


        function get_attribute($id_category, $id_attribute)
        {
            $sql = "select * from tbl_attribute WHERE ID_category=? AND ID_parent=? ORDER by id_attribute DESC ";
            $data = [$id_category, $id_attribute];
            $result = $this->do_select($sql, $data);

            return $result;
        }

        function add_attribute($data, $id_category, $editId = '')
        {
            if ($editId == '') {


                $sql = "insert into tbl_attribute (title,ID_parent,ID_category,filter) VALUE (?,?,?,?)";
                $param = [$data['title'], $data['ID_parent'], $id_category, 1];
                $this->do_query($sql, $param);
            } else {
                $sql = "update tbl_attribute set title=?,ID_parent=? WHERE id_attribute=?";
                $param = [$data['title'], $data['ID_parent'], $editId];
                $root = $this->do_query($sql, $param);
                var_dump($root);
            }
        }

        function delete_attribute($id_attribute = [])
        {
            $sql = "select * from tbl_attribute";
            $attribute = $this->do_select($sql);

            foreach ($attribute as $row) {
                $ID_parent = $row['ID_parent'];
                if (in_array($ID_parent, $id_attribute)) {
                    array_push($id_attribute, $row['id_attribute']);

                }

            }
            print_r($id_attribute);

            $delete_attribute = join(',', $id_attribute);
            $sql = "delete from tbl_attribute where id_attribute IN (" . $delete_attribute . ")";
            $this->do_query($sql);


        }

        function add_default_val($id_attribute)
        {

            $sql = 'select * from tbl_default_attribut_value WHERE id_attribut=?';
            $param = [$id_attribute];
            $result = $this->do_select($sql, $param);

            return $result;

        }

        function saveAttrVal($data, $attrId)
        {


            @$attrValNew = $data['attrvalnew'];
            if (isset($attrValNew)) {
                $attrValNew = array_filter(@$attrValNew);
                foreach ($attrValNew as $val) {
                    $sql = "insert into tbl_default_attribut_value (id_attribut,value) VALUES (?,?)";
                    $params = array($attrId, $val);
                    $this->do_query($sql, $params);
                }
            }


            unset($data['attrvalnew']);
            foreach ($data as $key => $val) {

                $key = explode('-', $key);
                if (isset($key[1])) {
                    $valId = $key[1];

                    if ($val != '') {
                        $sql = "update tbl_default_attribut_value set value=? where id_default_value=?";
                        $params = array($val, $valId);
                        $this->do_query($sql, $params);
                    } else {
                        $sql = "delete from tbl_default_attribut_value where id_default_value=?";
                        $params = array($valId);
                        $this->do_query($sql, $params);
                    }
                }

            }

        }


    }