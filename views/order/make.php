<?php if(isset($_SESSION['identity'])):?>
<h2>My order</h2>
    <div class="form__container">
        <form action="<?=BASE_URL?>order/add" method="POST">
            <label for="province">Province</label>
            <input type="text" name="province" id="province">
            
            <label for="location">Location</label>
            <input type="text" name="location" id="location">
            
            <label for="address">address</label>
            <input type="text" name="address" id="address">
    
            <input type="submit" value="ConfirmOrder">
    
        </form>
    </div>
<?php else:?>
    <h2>You need to be logged in</h2>
    <h3>You need to be logged tobe able to place your order</h3>
<?php endif?>