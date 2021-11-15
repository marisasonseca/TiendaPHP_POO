<?php if(isset($prod)):?>
    <h2><?=$prod->name?></h2>
    <div class="product__detail">
        <div class="detail__photo">
            <?php if(isset($prod->image) != null) :?>
                <figure>
                    <img src="<?=BASE_URL?>upload/images/<?=$prod->image?>" alt="">
                </figure>

            <?php else:?>
                <figure>
                    <img src="<?=BASE_URL?>assets/img/camiseta.png" alt="">
                </figure>
            <?php endif;?>
        </div>
        <div class="detail__data">
            <h3><?=$prod->description?></h3>
            <p>$<?=$prod->price?></p>
            <a class="product-button buttom"  href="#">Buy</a>
        </div>
    </div>

<?php else:?>
    <h2>Product not Exist</h2>
<?php endif;?>