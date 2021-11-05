<h2>Create Product</h2>

<div class="form__container">
    <form action="<?=BASE_URL?>product/save" method="POST" enctype="multipart/form-data">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">

        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>

        <label for="price">Price</label>
        <input type="number" name="price" id="price">

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock">

        <label for="category">Category</label>
        <?php $categories = Utils::showCategories(); ?>
        <select name="category" id="">
        <?php while($category = $categories->fetch_object()) :?>
            <option value="<?=$category->id?>">
            <?=$category->name?>
            </option>
        <?php endwhile; ?>
        </select>

        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        <input type="submit" value="Save">
    </form>
</div>