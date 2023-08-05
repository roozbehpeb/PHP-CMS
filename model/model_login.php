<?php

    class model_login extends Model
    {
        function __construct()
        {

            parent::__construct();
        }

        function index()
        {

        }

        function Check_User($User_send)
        {
            @$Email = $User_send['Email'];
            @$password = $User_send['password'];

            $sql = "select * from tbl_user where Email=? and password =?";
            $param = [$Email, $password];
            $result = $this->do_select($sql, $param);
            if (sizeof($result) > 0 and !empty($Email) and !empty($password)) {
                //echo " data intery is correct-Ok";
                Model::SessionInit();
                Model::SessionSet('UserId', $result[0]['id_user']);

            } else {
                //echo " data intery is False !";
                return FALSE;
            }

        }

    }

?>