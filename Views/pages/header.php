<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
</head>
<body>
    
<h1>Header</h1>

<?php
if(\Models\Models::isLogin()){
?>

<div class="header-user" style='width: 100%; height: 35px; background-color: grey;'>
    <div class="center">
    
    

        <div style='float: right' class="user">
        <a style='margin-right: 28px;'href='<?php echo INITIAL_PATH ?>/logout'> Logout </a>
          <a href='<?php echo INITIAL_PATH ?>/my'>  <?php echo @$_SESSION['user']; ?> </a>
        </div><!--user-->
        <div style='clear:both;'></div>


    </div><!--center-->
</div><!--header-user-->

<?php
}
//echo @$_GET['url'];
?>


