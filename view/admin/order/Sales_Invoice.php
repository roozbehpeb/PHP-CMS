<!doctype html>
<html lang="ar" dir="rtl">
<head>

    <base src="<?= URL ?>">
    <base href="<?= URL ?>">

    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فاکتور فروش</title>


    <!--bootstrap css-->
    <!--<link rel="stylesheet" href="public/css/material-icons.css">-->
    <link rel="stylesheet" href="public/css/jquery-ui.min.css">
    <link rel="stylesheet" href="public/FontAwesome.Pro.5.14.0.Web/css/all.css">
    <link rel="stylesheet" href="public/fonts/Roboto-Bold.ttf">
    <!--<link rel="stylesheet" href="public/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="public/css/bootstrap.rtl.min.css">

    <link rel="stylesheet" href="public/css/font.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <link rel="stylesheet" href="public/css/bootstrap.rtl.min.css.map">
    <link rel="stylesheet" href="public/css/bootstrap-reboot.rtl.min.css.map">
    <link rel="stylesheet" href="public/css/bootstrap-reboot.rtl.min.css">


    <!--bootstrap js-->
    <script src="https://unpkg.com/@popperjs/core@^2.0.0"></script>
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/jquery-ui.min.js"></script>
    <script src="public/js/jquery.flipTimer.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/bootstrap.min.js.map"></script>


</head>
<body>

<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg th {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        overflow: hidden;
        padding: 4px 2px;
        *word-break: normal;
    }

    .tg .tg-0pky {
        border-color: inherit;
        /* text-align: left;
         vertical-align: top*/
    }

    .tg .tg-0lax {

    /*  text-align: left;
      vertical-align: top
  }*/

    table {
        /*  padding: 200px !important;*/
        /*text-align: center;*/
    }
</style>

<?php
    require_once 'public/barcode/BarcodeGenerator.php';
    require_once 'public/barcode/BarcodeGeneratorHTML.php';
    require_once 'public/barcode/BarcodeGeneratorJPG.php';
    require_once 'public/barcode/BarcodeGeneratorPNG.php';
    require_once 'public/barcode/BarcodeGeneratorSVG.php';

    $generatore = new \Picqer\Barcode\BarcodeGeneratorPNG();
    $barcode = $generatore->getBarcode(@$Sales_Invoice1['id_order'], $generatore::TYPE_CODE_128);

?>

<?php $Sales_Invoice1 = $data['Sales_Invoice1'][0];
    // var_dump($Sales_Invoice1);
?>

<div class="container p-5 ">
    <div class="row bg-light">
        <div class="col-sm-12">
            <table class="tg" width="1000px">
                <thead>
                <tr>
                    <th class="tg-0pky" colspan="11">
                        <div class="row">
                            <div class="col">
                                <img src="../../../public/img/logo.svg" alt="">
                            </div>
                            <div class="col">
                                <span>طراحی سایت و سئوآلو وب</span>
                            </div>
                            <div class="col">
                                <?php echo '<img src="data:image/png;base64, ' . base64_encode($barcode) . '">' ?>
                            </div>
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="tg-0pky " colspan="3">
                        <div>نام گیرمده: <?= $Sales_Invoice1['family']; ?></div>
                        <div>آدرس: <?= $Sales_Invoice1['full_address']; ?></div>
                    </td>


                    <td class="tg-0lax" colspan="8">
                        <div>
                            <span>کد پستی : <?= $Sales_Invoice1['zipcode']; ?></span>
                        </div>
                        <div>
                            <span>موبایل : <?= $Sales_Invoice1['mobile']; ?></span>
                        </div>
                        <div>
                            <span>تلفن : <?= $Sales_Invoice1['tel']; ?></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tg-0pky"><span>نام محصول</span></td>
                    <td class="tg-0pky"><span>رنگ</span></td>
                    <td class="tg-0pky"><span>گارانتی</span></td>
                    <td class="tg-0lax"><span>تعداد</span></td>
                    <td class="tg-0lax"><span>درصد تخیف</span></td>
                    <td class="tg-0lax"><span> مبلغ تخفیف (تومان) </span></td>
                    <td class="tg-0pky" colspan="6"><span>قیمت نهایی(تومان)</span></td>
                </tr>

                <?php
                    $Basket = unserialize($Sales_Invoice1['basket']);
                    //  var_dump($Basket);
                    foreach ($Basket as $row) { ?>


                        <tr>

                            <td class="tg-0pky"><span><?= $row['title']; ?></span></td>
                            <td class="tg-0pky"><span><?= $row['TitleColor']; ?></span></td>
                            <td class="tg-0pky"><span><?= $row['Titleguarantee']; ?></span></td>
                            <td class="tg-0lax"><span><?= $row['count']; ?></span></td>
                            <td class="tg-0lax"><span><?= $row['discount']; ?>%</span></td>
                            <td class="tg-0lax"><span><?= number_format($row['discountTotal']); ?></span></td>
                            <td class="tg-0pky"><span><?= number_format($row['price']); ?></span></td>
                        </tr>
                    <?php } ?>
                <tr>

                    <td class="tg-0pky  justify-content-between" colspan="11">
                        <div class="d-flex">
                            <div class="col">
                                <span>  مبلغ کل پرداختی(تومان): <?= number_format($Sales_Invoice1['priceTotal']); ?> </span>
                            </div>
                            <div class="col">
                                <span> شیوه پرداختی: </span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tg-0pky  justify-content-between" colspan="11">
                        <div class="d-flex">
                            <div class="col">
                                <span> شیوه ارسال: <?= $Sales_Invoice1['post_type']; ?></span>
                            </div>
                            <div class="col">
                                <span> هزینه ارسال(تومان): <?= number_format($Sales_Invoice1['post_price']); ?></span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tg-0pky  justify-content-end" colspan="11">
                        <div class="d-flex flex-row-reverse">
                            <div class="col-2 align-self-satrt align-content-start">
                                <span> مهر و امضاء فروشگاه </span>
                            </div>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>



