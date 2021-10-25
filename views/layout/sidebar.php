        <!-- SIDERBAR -->
        <aside class="sidebar">
            <div class="block-siderbar sidebar-login">
                <?php if(! isset($_SESSION['identity'])) :?>
                <h3>Login</h3>
                <form action="<?=BASE_URL?>/user/login" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    
                    <label for="password">Password</label>
                    <input type="password" name="password">

                    <input type="submit" value="Enter">
                </form>
                
                <?php else:?>
                    <h3><?=$_SESSION['identity']->name?> <?=$_SESSION['identity']->lastName?></h3>
                <?php endif;?>

                <ul>
                    <li>
                        <a href="#">My Orders</a>
                    </li>
                    <li>
                        <a href="#">Orders Management</a>
                    </li>
                    <li>
                        <a href="#">Categories Management</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>user/logout">Log out</a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main-content">