<h2>Product List</h2>

<?php if(isset($_SESSION['product']) && $_SESSION['product'] == 'Complete'): ?>
    <h3 class="alert alert-complete">Product has been created Successfully</h3>
<?php elseif (isset($_SESSION['product']) && $_SESSION['product'] == 'Faile'):?>
    <h3 class="alert alert-failed">Product does not has been created Successfully</h3>
<?php endif;?>

<?php Utils::deleteSession('product');?>
<a href="<?=BASE_URL?>product/create" class="product-button buttom">Crear</a>

<table class="table">
    <tr class="table__head">
        <th class="head__items">ID</th>
        <th class="head__items">NAME</th>
        <th class="head__items">PRECIO</th>
        <th class="head__items">STOCK</th>
    </tr>
    <?php while ($product = $products->fetch_object()): ?>
        <tr>
            <td><?=$product->id?></td>
            <td><?=$product->name?></td>
            <td><?=$product->price?></td>
            <td><?=$product->stock?></td>
        </tr>
    <?php endwhile;?>
</table>

