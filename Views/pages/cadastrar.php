<?php

if(\Models\Models::isLogin()){
    header('Location:' . INITIAL_PATH);
} 
?>


<div class="formulario">
    <div class="center">

        <form method='post'>

        <span style='display:block'> Nick </span>
        <input type='text' name='nick' required>

        <br><br>

        <span style='display:block' > Email </span>
        <input type='text' name='email' required>

        <br><br>

        <span style='display:block' > Senha </span>
        <input type='password' name='senha' required>

        <br><br>

        <span style='display:block' required> Confirme sua senha </span>
        <input type='password' name='senha_ok' required>

        <br><br>

        <input type='submit' name='acao' value='Cadastrar!'>
        </form>


    </div>
</div>