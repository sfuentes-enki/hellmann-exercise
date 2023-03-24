
<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';
?>
    <h1 class="header">Registrese</h1>

    <?php flash('login') ?>

    <form method="post" action="./controllers/Users.php">
    <input type="hidden" name="type" value="login">
        <input type="text" name="name/email"  
        placeholder="Username/Email...">
        <input type="password" name="usersPwd" 
        placeholder="Password...">
        <button type="submit" name="submit">Salir</button>
    </form>

    <div class="form-sub-msg"><a href="./reset-password.php">¿Olvidó su contraseña?</a></div>
    
<?php 
    include_once 'footer.php'
?>