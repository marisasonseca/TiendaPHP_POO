<h2>Registration</h2>

<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'Complete Registration') :?>
    <h3 class="alert alert-complete">Registration Complete</h3>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'Register failed') :?>
    <h3 class="alert alert-failed"><?=$_SESSION['register']?></h3>
<?php endif;?>
<?php Utils::deleteSession('register');?>
<div class="form__container">
    <form action="<?=BASE_URL?>user/save" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name">
    
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName">
    
        <label for="email">Email</label>
        <input type="email" name="email">
    
        <label for="password">Password</label>
        <input type="password" name="password">
    
        <input type="submit" value="Register">
    
    </form>
</div>