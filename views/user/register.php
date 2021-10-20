<h2>Registration</h2>

<?php if ($_SESSION['register'] && $_SESSION['register'] == 'Registration Complete') :?>
    <h2>Completed</h2>
<?php else:?>
    <h2>Failed</h2>
<?php endif;?>

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