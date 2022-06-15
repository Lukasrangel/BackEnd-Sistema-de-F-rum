<?php

if(\Models\Models::isLogin()){
    header('Location:' . INITIAL_PATH);
} 
?>

<section class="login">
    <div class="center">

    <form method='post'>

    <span style='display:block'> Email </span>
    <input type='text' name='email'>

    <br><br>

    <span style='display:block'> Pass </span>
    <input type='password' name='passwd'>

    <br><br>

    <input type='submit' name='acao' value='Login!'>


    </form>

    </div>
</section>