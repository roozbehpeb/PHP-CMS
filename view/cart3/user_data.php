<div class="row mt-3 user-data">
    <div class="col-sm-12 main_info">
        <div class="table_generator">
            <?php
                $address = $data['address'];
                $first = 1;
                foreach ($address as $row) {

                    ?>

                    <div class="cart3_table m-4 main_table">
                        <table class="w-100 post_table" data-city="<?= $row['id_user_address']; ?>">

                            <tr>
                                <td onclick="UserPostAddress()" rowspan="3"
                                    class=" position-relative select_post selectPost">

                                    <div class=" Triangle <?php if ($first == 1) {
                                        echo 'triangle-topright';
                                    } ?> "></div>


                                    <div class="  circle  position-relative choosen_post <?php if ($first == 1) {
                                        echo 'active_post';
                                    } ?>"></div>


                                </td>
                                <td class="td_width">
                                    <span><i class="fa fa-user"></i> نام:</span>
                                    <div><?= $row['family']; ?></div>
                                </td>
                                <td class="td_width">
                                    <span><i class="fa fa-mobile"></i>  موبایل:</span>
                                    <div><?= $row['mobile']; ?></div>
                                </td>
                                <td class="td_width">
                                    <span><i class="fas fa-phone"></i> تلفن:</span>
                                    <div><?= $row['tel']; ?></div>
                                </td>
                                <td class="td_width">

                                    <span><i class="fas fa-envelope"></i> ایمیل:</span>
                                    <div><?= $row['email']; ?></div>

                                </td>

                                <td style="width: 15px" rowspan="3" width="1px">
                                    <div data-bs-target="#exampleModal" data-bs-toggle="modal" class="edit"><i
                                                onclick="EditAddress(<?= $row['id_user_address']; ?>)"
                                                class="fas fa-edit post_edit  "></i></div>
                                    <div class="cross"><i onclick="deleteUserAddress(<?= $row['id_user_address']; ?>)"
                                                          class="fas fa-times"
                                                          style="color: #000000; cursor: pointer"></i></div>
                                </td>

                            </tr>


                            <tr>
                                <td class="td_width">
                                    <span><i class="fas fa-passport"></i> کدملی:</span>
                                    <div><?= $row['passport']; ?></div>
                                </td>
                                <td class="td_width">
                                    <span><i class="fa fa-map"></i> کدپستی:</span>
                                    <div><?= $row['zipcode']; ?></div>
                                </td>
                                <td class="td_width">

                                    <span><i class="fas fa-map-marker-alt"></i> استان:</span>
                                    <div><?= $row['state']; ?></div>

                                </td>

                                <td class="td_width">
                                    <span><i class="fas fa-city"></i> شهر:</span>
                                    <div><?= $row['city']; ?></div>
                                </td>

                            </tr>

                            <tr>
                                <td class="full_address" colspan="4">
                                    <span><i class="fas fa-address-card"></i> آدرس:</span> <?= $row['full_address']; ?>
                                </td>
                            </tr>

                        </table>
                    </div>

                    <?php $first = 0;
                } ?>

        </div>
    </div>
</div>


<style>

</style>
