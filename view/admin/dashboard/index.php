<?php
    $active = 'dashboard';
    require 'view/admin/layout.php';

    $orderStat = $data['orderStat'];
//var_dump($orderStat);
    $keys = array_keys($orderStat);
    //var_dump($keys);

    $values=array_values($orderStat);
  //  var_dump($values);
    $values=implode(',',$values);
?>

<div class="col-sm-10 bg-gradient  border p-1">

    <p class="title">
        <a>
            داشبورد
        </a>


    </p>

    <style>
        #container * {
            direction: ltr !important;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                title: {
                    text: 'نمودار آمار فروش در 7 روز گذشته',
                    x: -20 //center
                },
                subtitle: {
                    text: 'فروشگاه کلیک سایت',
                    x: -20
                },
                xAxis: {
                    categories: [<?php foreach ($keys as $date){echo "'$date',";} ?>]
                },
                yAxis: {
                    title: {
                        text: 'تعداد سفارش'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#f00'
                    }]
                },
                tooltip: {
                    valueSuffix: ''
                },

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },

                series: [{
                    name: 'تعداد فروش',
                    data: [<?= $values ?>]
                }]
            });
        });
    </script>
    </head>
    <body>


    <script src="public/js/highcharts/highcharts.js"></script>
    <script src="public/js/highcharts/exporting.js"></script>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


</div>