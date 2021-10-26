<h2>Category List</h2>

<a href="<?=BASE_URL?>category/create" class="product-button buttom">Crear</a>

<table class="table">
    <tr class="table__head">
        <th class="head__items">ID</th>
        <th class="head__items">NAME</th>
    </tr>
    <?php while ($category = $categories->fetch_object()): ?>
        <tr>
            <td><?=$category->id?></td>
            <td><?=$category->name?></td>
        </tr>
    <?php endwhile;?>
</table>