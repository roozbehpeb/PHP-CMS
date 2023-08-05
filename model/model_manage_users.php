<?php

    class model_manage_users extends Model
    {
        function __construct()
        {
            parent::__construct();
        }

        function get_users()
        {
            $sql = "select tbl_user.*,tbl_user_level.title
            from tbl_user
            LEFT JOIN  tbl_user_level ON tbl_user.level=tbl_user_level.id_user_level ORDER BY id_user DESC";
            $ressult = $this->do_select($sql);

            return $ressult;
        }

        function ToManager($ids)
        {
            $Id_user = implode(',', $ids);
            $sql = "update tbl_user set level=1 WHERE id_user IN ($Id_user)";
            $this->do_query($sql);

        }

        function ToEmployee($ids)
        {
            $Id_user = implode(',', $ids);
            $sql = "update tbl_user set level=2 WHERE id_user IN ($Id_user)";
            $this->do_query($sql);

        }

        function ToOrdinary($ids)
        {
            $Id_user = implode(',', $ids);
            $sql = "update tbl_user set level=3 WHERE id_user IN ($Id_user)";
            $this->do_query($sql);

        }

        function delete($ids)
        {
            $Id_user = implode(',', $ids);
            $sql = "delete from tbl_user  WHERE id_user IN ($Id_user)";
            $this->do_query($sql);

        }

    }

?>