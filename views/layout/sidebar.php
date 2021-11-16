        <!-- SIDERBAR -->
        <aside class="sidebar">
            <?php if(isset($_SESSION['cart'])):
                    $product = $_SESSION['cart'];
                    $stats = Utils::statsCart();
            ?>
                <div class="block-siderbar sidebar-login">
                    <h3>My Cart</h3>
                    <ul>
                        <li><a href="">Products(<?= $stats['count']?>)</a></li>
                        
                        <li><a href="">Total: $ <?=Utils::formatMoney($stats['total'])?></a></li>
                        <li><a href="">Cart</a></li>
                    </ul>
                </div>
            <?php endif;?>
            <div class="block-siderbar sidebar-login">
                
                
                <?php if(! isset($_SESSION['identity'])) :?>
                    <h3>Login</h3>
                <?php if(isset($_SESSION['errorLogin']) && $_SESSION['errorLogin'] == 'Login Failure') :?>
                    <h4 class="alert"><?=$_SESSION['errorLogin']?></h4>
                    <?=Utils::deleteSession('errorLogin')?>
                <?php endif;?>
                <form action="<?=BASE_URL?>/user/login" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    
                    <label for="password">Password</label>
                    <input type="password" name="password">

                    <input type="submit" value="Enter">
                </form>
                <li>
                    <a href="<?=BASE_URL?>user/register">Register</a>
                </li>
                <?php else:?>
                    <h3><?=$_SESSION['identity']->name?> <?=$_SESSION['identity']->lastName?></h3>
                <?php endif;?>

                <ul>
                    
                    <?php if(isset($_SESSION['admin'])) :?>

                        <li>
                            <a href="#">Orders Management</a>
                        </li>
                        <li>
                            <a href="<?=BASE_URL?>category/index">Categories Management</a>
                        </li>
                        <li>
                            <a href="<?=BASE_URL?>product/management">Product Management</a>
                        </li>
                    <?php endif;?>
                    <?php if(isset($_SESSION['identity'])) :?>
                        <li>
                            <a href="#">My Orders</a>
                        </li>
                        <li>
                            <a href="<?=BASE_URL?>user/logout">Log out</a>
                        </li>
                    <?php endif;?>

                </ul>
            </div>
        </aside>
        <div class="main-content">