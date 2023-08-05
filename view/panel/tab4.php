<div class="tab-pane fade bg-white p-5" id="comment">
    <div class="comment_panel">
        <?php $GetComment = $data['GetComment'];
            // var_dump($GetComment);
        ?>

        <table class="w-100">
            <tr>
                <th>ردیف</th>
                <th>تاریخ</th>
                <th>محصول</th>
                <th>عنوان پیام</th>
                <th>پیام</th>
                <th>مشاهده</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            <?php foreach ($GetComment as $key => $row) { ?>
                <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $row['date']; ?></td>
                    <td><?= $row['title_product']; ?></td>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['viewpoint']; ?></td>
                    <td>
                        <a href="product/index/<?= $row['ID_product']; ?>/User_Comment"><i class="fas fa-eye"></i></a>
                    </td>
                    <td>
                        <a href="addcomment/index/<?= $row['ID_product']; ?>/<?= $row['id_comment']; ?>"><i
                                    class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        <i onclick="deleteComment (<?= $row['id_comment']; ?>,this)" class="far fa-times-circle"></i>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>



