<?php

    class Panel extends Controller
    {
        function __construct()
        {
        }

        function index($ActiveTab = 'orders')
        {

            $GetComment = $this->model->GetComment();
            $UserInfo = $this->model->GetUserInfo();
            $Statistics = $this->model->Statistics();
            $GetMassage = $this->model->GetMassage();
            $GetOrder = $this->model->GetOrder();
            $GetFolder = $this->model->GetFolder();
            $Get_discount_code = $this->model->Get_discount_code();
            $data = ['UserInfo' => $UserInfo, 'Statistics' => $Statistics, 'GetMassage' => $GetMassage, 'GetOrder' => $GetOrder, 'GetFolder' => $GetFolder, 'GetComment' => $GetComment, 'Get_discount_code' => $Get_discount_code, 'ActiveTab' => $ActiveTab];
            $this->view('panel/index', $data);
        }

        function FavoriteProduct()
        {
            $FolderId = $_POST['FolderId'];
            $result = $this->model->FavoriteProduct($FolderId);
            echo json_encode($result);
        }


        function SaveEdit()
        {
            $FolderId = $_POST['FolderId'];
            $Newname = $_POST['Newname'];
            $this->model->SaveEdit($FolderId, $Newname);
            //echo json_encode($result);
        }

        function deleteFavorite()
        {
            $FavoriteId = $_POST['FavoriteId'];
            $this->model->deleteFavorite($FavoriteId);
            // echo json_encode($result);
        }


        function deleteComment()
        {
            $CommentId = $_POST['CommentId'];
            $this->model->deleteComment($CommentId);
            // echo json_encode($result);
        }

        function savecode()
        {
            $data = $_POST;
            $this->model->savecode($data);
        }


        function user_Info()
        {
            $user_Info = $this->model->GetUserInfo();
            $data = ['user_Info' => $user_Info];
            $this->view('panel/user_Info', $data);
        }

        function EditProfile()
        {
            $data = $_POST;
            $this->model->EditProfile($data);
            header('location:' . URL . 'panel');

        }


        function change_password()
        {
            $this->view('panel/change_password');
        }

        function change_pass()
        {
            if (isset($_POST['old_pass'])) {
                $data = $_POST;
                $this->model->change_pass($data);
            }


        }


        function logout()
        {
            $this->model->logout();
            header('location:' . URL . 'login');
        }

    }

?>