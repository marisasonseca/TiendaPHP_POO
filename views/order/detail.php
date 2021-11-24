<h2>Order Detail</h2>

<?php if(isset($ord)):?>
    <?php if(isset($_SESSION['admin'])):?>
        <div class="form__container">
            <form action="<?=BASE_URL?>order/state" method="POST">
                <h3>State</h3>
                <input type="hidden" value=<?=$ord->id?> name="order_id">
                <select name="state">
                    <option value="confirm" <?=$ord->state == 'confirm' ? 'selected': '' ?> >Pending</option>
                    <option value="preparation" <?=$ord->state == 'preparation' ? 'selected': '' ?>  >In preparation</option>
                    <option value="ready" <?=$ord->state == 'ready' ? 'selected': '' ?> >Ready to send</option>
                    <option value="sended" <?=$ord->state == 'sended' ? 'selected': '' ?>  >Sent</option>
                </select>
                <input type="submit" value="Change State">
           </form>
        </div>
        <div class="order__date">
        <h3>USER DATA</h3>
        <p>Name: <?=$user->name?></p>
        <p>Last Name: <?=$user->lastName?></p>
        <p>Email: <?=$user->email?></p>
    </div>
    
    <?php endif?>
    

    <div class="order__date">
        <h3>ORDER ADDRESS</h3>
        <p>Province: <?=$ord->province?></p>
        <p>Location: <?=$ord->location?></p>
        <p>Address: <?=$ord->address?></p>
    </div>
    <div class="order__date">
        <h3>ORDER DATA</h3>
        <p>N° order: <?=$ord->id?></p>
        <p>Estate: <?=Utils::showOrderState($ord->state)?></p>
        <p>Date: <?=$ord->date?></p>
        <p>Total: $ <?=Utils::formatMoney($ord->cost)?></p>
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
<?php endif?>