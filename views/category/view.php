<?php if(isset($cate)) : ?>
    <h2><?=$cate->name?></h2>
    <?php if ($products->num_rows == 0): ?>
        <h3>There are not products</h3>

    <?php else:?>
        <div class="content-products">

            <?php while($product = $products->fetch_object()): ?>
                <div class="product">
                    <a href="<?=BASE_URL?>product/view&id=<?=$product->id?>">
                        <?php if(isset($product->image) != null) :?>
                            <figure>
                                <img src="<?=BASE_URL?>upload/images/<?=$product->image?>" alt="">
                            </figure>
                        <?php else:?>
                            <figure>
                                <img src="<?=BASE_URL?>assets/img/camiseta.png?>" alt="">
                            </figure>
                        <?php endif;?>
                        <h3><?=$product->name?></h3>
                    </a>
                    <p>$<?=$product->price?></p>
                    <a class="product-button buttom"  href="#">Buy</a>
                </div>
            <?php endwhile;?>

        </div>
    <?php endif;?>
    
<?php else:?>
    <h3>There are not category</h3>
<?php endif;?>