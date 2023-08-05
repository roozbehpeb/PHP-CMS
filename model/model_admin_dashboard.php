<?php

    class Model_admin_dashboard extends Model
    {


        function __construct()
        {
            parent::__construct();
        }

        function getOrder()
        {

            $sql = "select * from tbl_order";
            $result = $this->do_select($sql);

            return $result;
        }

        function getStat()
        {
            $today_date = date('Y/m/d');
            $time = time();
            $last_week_time = $time - (7 * 24 * 3600);
            $last_week_date = date('Y/m/d', $last_week_time);
            $dates = $this->getRange($last_week_date, $today_date);
            $orders = $this->getOrder();
            $orderStat = array();

            foreach ($dates as $date) {

                $jalili_date = self::MiladiTojalili($date);
                $orderStat[$jalili_date] = 0;
            }

            foreach ($orders as $row) {

                $date_jalili = $row['date'];
                $date_miladi = self::jaliliToMiladi($date_jalili);

                //echo '<br>'.$date_miladi.'<br>';

                if (in_array($date_miladi, $dates)) {

                    @$orderStat[$date_jalili] = $orderStat[$date_jalili] + 1;

                }


            }

            return $orderStat;


        }


        function getRange($startDate, $lastDate)
        {

            $dates = [];
            $current = strtotime($startDate);
            $last = strtotime($lastDate);

            while ($current <= $last) {
                $dates[] = date('Y/m/d', $current);
                $current = strtotime('+1 day', $current);
            }

            return $dates;


        }


    }