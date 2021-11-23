<h2>My Cart</h2>

<?php if(isset($cart)): ?>
<table>
    <tr>
        <th>IMAGE</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>UNITS</th>
    </tr>

        <?php foreach ($cart as $index => $element):
                $product = $element['product'];
        ?>
            <tr>
                <td>
                    <?php if($product->image != null):?>
                        <img class="cart__image" src="<?=BASE_URL?>upload/images/<?=$product->image?>" alt="">
                        <?php else:?>
                            <img class="cart__image" src="<?=BASE_URL?>assets/img/camiseta.png" alt="">
                    <?php endif?>
                </td>
                <td><a href="<?=BASE_URL?>product/view&id=<?=$product->id?>"><?=$product->name?></a></td>
                <td>$ <?=$product->price?></td>
                <td><?=$element['units']?></td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <h3>There aren't Producto in the cart</h3>
    <?php endif;?>
</table>

<?php $stast =Utils::statsCart()?>
<div class="cart__total">
    <h3>Total Price: <?=$stast['total']?></h3>
    <a class="buttom buttom-order" href="<?=BASE_URL?>order/make">Order</a>
</div>