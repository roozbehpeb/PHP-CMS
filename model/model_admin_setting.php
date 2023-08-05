<?php

    class model_admin_setting extends Model
    {
        public $CheckLogin = '';

        function __construct()
        {
            parent::__construct();

        }

        function saveSetting($data)
        {
            foreach ($data as $SettingName => $value) {
                $sql = "update tbl_option set value=? WHERE setting=?";
                $param = [$value, $SettingName];
                $this->do_query($sql, $param);
            }
        }


    }


