<?php

    class Model_admin_statistics extends Model
    {

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {

        }

        function compareDates($date1, $date2)
        {
            $date1 = new DateTime($date1);
            $date2 = new DateTime($date2);
            $date1 = $date1->format('Y-m-d');
            $date2 = $date2->format('Y-m-d');
            if ($date1 > $date2) {
                return 1;
            }
            if ($date1 == $date2) {
                return 2;
            }
            if ($date1 < $date2) {
                return 3;
            }
        }

        function statistics($data)
        {

            $startDate = $data['date_start'];
            $endDate = $data['date_end'];
            $sql = "select * from tbl_order ORDER BY id_order DESC ";
            $param = [];
            $result = $this->do_select($sql, $param);
            $resultTotal = [];
            $ordersPaied = 0;
            //$ordersPaied2 = [];
            $amountTotal = 0;
            foreach ($result as $row) {
                $date = $row['date'];
                $compare1 = $this->compareDates($date, $startDate);
                $compare2 = $this->compareDates($date, $endDate);

                if (($compare1 == 1 or $compare1 == 2) and ($compare2 == 2 or $compare2 == 3)) {
                    array_push($resultTotal, $row);
                    if ($row['pay'] == 1) {
                        $ordersPaied = $ordersPaied + 1;
                        //array_push($ordersPaied, $ordersPaied);
                    }
                    $amountTotal = $amountTotal + $row['priceTotal'];
                }

            }

            return array('result' => $resultTotal, 'priceTotal' => $amountTotal, 'order_paied' => $ordersPaied, 'startDate' => $startDate, 'endDate' => $endDate);


        }


    }