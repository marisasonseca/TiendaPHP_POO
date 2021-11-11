<?php if(isset($edit) && isset($prod) && is_object($prod)):?>
    <h2>Edit Product <?=$prod->name;?></h2>
    <?php $urlAction = BASE_URL . 'product/save&id='. $prod->id;?>
<?php else: ?>
    <h2>Create Product</h2>
    <?php $urlAction = BASE_URL . 'product/save'?>
    <?=$prod = null;?>
<?php endif; ?>

<div class="form__container">
    <form action="<?=$urlAction?>" method="POST" enctype="multipart/form-data">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?=Utils::validDataObject($prod, 'name')?>">

        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"><?=Utils::validDataObject($prod, 'description')?></textarea>

        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="<?=Utils::validDataObject($prod, 'price')?>">

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" value="<?=Utils::validDataObject($prod, 'stock')?>">

        <label for="category">Category</label>
        <?php $categories = Utils::showCategories(); ?>
        <select name="category" id="">
        <?php while($category = $categories->fetch_object()) :?>
            <option value="<?=$category->id?>" <?=isset($prod) && is_object($prod) && $category->id == $prod->id_categoria ? 'selected': ''?>>
            <?=$category->name?>
            </option>
        <?php endwhile; ?>
        </select>

        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <?php if(isset($prod) && is_object($prod) && !empty($prod->image)): ?>
            <div class="product">
                <figure>
                    <img src="<?=BASE_URL?>upload/images/<?=$prod->image?>" alt="<?=$prod->name?>">
                </figure>
            </div>
        <?php endif;?>
        <input type="submit" value="Save">
    </form>
</div>