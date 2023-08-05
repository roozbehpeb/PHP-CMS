<div class="tab-pane fade bg-white p-5" id="home2">
    <div class="comment_panel">
        <table class="w-100">
            <tr>
                <th>ردیف</th>
                <th>کد</th>
                <th>تاریخ</th>
                <th>عنوان</th>
                <th>متن</th>
                <th>وضعیت</th>

            </tr>
            <?php $massage = $data['GetMassage'];
                $i = 1;
                foreach ($massage as $key => $row) {
                    ?>
                    <tr>
                        <td>
                            <?php
                                // roozbeh nice code to show rowID  ! =>  echo $key+1
                                echo $i; ?>
                        </td>
                        <td></td>
                        <td></td>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['massage']; ?></td>
                        <td><?php if ($row['status'] == 1) {
                                echo "خوانده شده";
                            } else {
                                echo "خوانده نشده";
                            } ?></td>

                    </tr>
                    <?php $i++;
                } ?>

        </table>
    </div>
</div>