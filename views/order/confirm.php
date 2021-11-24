<?php if(isset($ord)):?>
    <h2>Your order has been Confirmed</h2>
    <p>Your order has been saved succesfully, once you make the transfer bank to the account 14213123123 with the cost of the order, it will be processed and sent</p>

    <div class="order__date">
        <h3>Order Data</h3>
        <p>N° Order: <?=$ord->id?></p>
        <p>Date: <?=$ord->date?></p>
        <p>Total Count: <?=$ord->cost?></p>
    </div>

    <div class="order__products">
        <h3>Products</h3>
        <table>
            <tr>
                <th>IMAGE</th>
                <th>NAME</th>
                <th>PRICE</th>
                <th>price</th>
            </tr>
            <?php while($product = $products->fetch_object()):?>
                <tr>
                    <td>
                        <?php if($product->image != null):?>
                            <img src="<?=BASE_URL?>upload/images/<?=$product->image?>" alt="" class="cart__image">
                            <?php else:?>
                                <img src="<?=BASE_URL?>assets/img/camiseta.png" alt="" class="cart__image">
                        <?php endif;?>
                    </td>
                    <td><?=$product->name?></td>
                    <td>$ <?=Utils::formatMoney($product->price)?></td>
                    <td>
                        <?=$product->units?>
                    </td>
                </tr>
            <?php endwhile;?>
            </table>
    </div>
<?php else:?>
    <h2>Your order could NOT be processed</h2>
<?php endif;?>