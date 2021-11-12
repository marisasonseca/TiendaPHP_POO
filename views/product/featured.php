<h2>Productos Destacados</h2>
            <div class="content-products">
                <?php while ($product = $products->fetch_object()) :?>
                    <div class="product">
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
                        <p>$<?=$product->price?></p>
                        <a class="product-button buttom"  href="#">Buy</a>
                    </div>
                <?php endwhile;?>
            </div>