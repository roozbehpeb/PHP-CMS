<?php

    class admin_category extends Controller
    {

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            $get_category = $this->model->get_category();
            $data = ['get_category' => $get_category];
            $this->view('admin/category/index', $data);

        }


        function list_category($id_category = 0)
        {
            $Category_Info = $this->model->Category_Info($id_category);
            $child_category = $this->model->child_category($id_category);
            $parents_category = $this->model->parents_category($id_category);

            $data = ['Category_Info' => $Category_Info, 'get_category' => $child_category, 'parents_category' => $parents_category];
            $this->view('admin/category/index', $data);
        }


        function add_category($category_id = 0, $edit = '')
        {
            if (isset($_POST['title'])) {
                $title = $_POST['title'];
                $parent = $_POST['id_category'];
                $this->model->add_category($title, $parent, $category_id, $edit);
            }
            $get_category = $this->model->get_category();
            $Category_Info = $this->model->Category_Info($category_id);
            $data = ['get_category' => $get_category, 'parent_id' => $category_id, 'edit' => $edit, 'Category_Info' => $Category_Info];
            $this->view('admin/category/add_category', $data);
        }

        function delete_category($parent_id = 0)
        {
            $cat_ids = $_POST['cat_ids'];
            $this->model->delete_category($cat_ids);
            header('location:' . URL . 'admin_category/list_category/' . @$parent_id);
            // header('location:'.URL. 'admin_category/index');
        }

        function get_attribute($id_category, $id_attribute = '')
    {
        $get_attribute = $this->model->get_attribute($id_category, $id_attribute);
        $Category_Info = $this->model->Category_Info($id_category);
        $attribute_Info = $this->model->attribute_Info($id_attribute);
        $data = ['get_attribute' => $get_attribute, 'Category_Info' => $Category_Info, 'attribute_Info' => $attribute_Info];
        $this->view('admin/category/show_attribute', $data);
    }

//        function get_attribute2($id_category, $id_attribute = '')
//        {
//            $get_attribute = $this->model->get_attribute($id_category, $id_attribute);
//            $Category_Info = $this->model->Category_Info($id_category);
//            $attribute_Info = $this->model->attribute_Info($id_attribute);
//            $data = ['get_attribute' => $get_attribute, 'Category_Info' => $Category_Info, 'attribute_Info' => $attribute_Info];
//            $this->view('admin/category/show_attribute2', $data);
//        }

        function add_attribute($id_category, $ID_parent = '', $editId = '')
        {
            if (isset($_POST['title'])) {
                $this->model->add_attribute($_POST, $id_category, $editId);
                header('location:' . URL . 'admin_category/get_attribute/' . @$id_category . '/' . $ID_parent);
            }
            $get_attribute = $this->model->get_attribute($id_category, 0);
            $Category_Info = $this->model->Category_Info($id_category);
            $editId = $this->model->attribute_Info($editId);
            $data = ['get_attribute' => $get_attribute, 'Category_Info' => $Category_Info, 'ID_parent' => $ID_parent, 'editId' => $editId, 'editId' => $editId];
            $this->view('admin/category/add_attribute', $data);

        }


        function delete_attribute($id_category, $id_attribute = '')
        {
            $attribute_ids = $_POST['id_attribute'];
            $this->model->delete_attribute($attribute_ids);
            header('location:' . URL . 'admin_category/get_attribute/' . @$id_category . '/' . $id_attribute);
        }

        function add_default_val($id_attribute)
        {

            if (isset($_POST['submit'])) {
                $this->model->saveAttrVal($_POST, $id_attribute);
            }

            $default_val = $this->model->add_default_val($id_attribute);
            $IDattribute = $this->model->attribute_Info($id_attribute);
            $data = ['default_val' => $default_val, 'IDattribute' => $IDattribute];
            $this->view('admin/category/add_default_val', $data);
        }


    }