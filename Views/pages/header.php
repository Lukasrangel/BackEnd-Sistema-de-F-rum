<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='<?php echo INITIAL_PATH ?>/estilo/estilo.css' />
    <title>Forum</title>
</head>
<body>
    
<h1>Header</h1>

<div class="header-user" style='width: 100%; height: 35px; background-color: grey;'>
    <div class="center">
    
    

        <div class="user right">


        <?php
        if(\Models\Models::isLogin()){
        ?>

        <a style='margin-right: 28px;'href='<?php echo INITIAL_PATH ?>/logout'> Logout </a>
          <a href='<?php echo INITIAL_PATH ?>/my'>  <?php echo @$_SESSION['user']; ?> </a>

        <?php
            } else { 
        ?>
            <a style='margin-right: 28px;'href='<?php echo INITIAL_PATH ?>/cadastrar'> Cadastrar </a>
          <a href='<?php echo INITIAL_PATH ?>/login'>  Login </a>
        
        <?php
            }
        ?>
        </div><!--user-->
        <div class="clear"></div>
       

    </div><!--center-->
</div><!--header-user-->




