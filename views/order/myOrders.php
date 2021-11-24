<?php if(isset($management)):?>
    <h2>Order Management</h2>
<?php else:?>
    <h2>My Orders</h2>
<?php endif?>
<table>
            <tr>
                <th>N° ORDER</th>
                <th>DATE</th>
                <th>TOTAL COUNT</th>
                <th>STATE</th>
            </tr>
            <?php while($order = $orders->fetch_object()):?>
                <tr>
                    <td><a href="<?=BASE_URL?>order/detail&id=<?=$order->id?>"><?=$order->id?></a></td>
                    <td><?=$order->date?></td>
                    <td>$ <?=Utils::formatMoney($order->cost)?></td>
                    <td>
                        <?=Utils::showOrderState($order->state)?>
                    </td>
                </tr>
            <?php endwhile;?>
            </table>