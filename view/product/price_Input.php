<div class="input_order">
    <input onclick="baskerHeaderUpdate()" onchange="AddToBasket2($(this).val(),<?= $BasketHeader['id_basket']; ?>)"
           id="num_order" name="count" type="number" value="" min="1"
           max="<?= $BasketHeader['remain']; ?>" step="1"/>
</div>