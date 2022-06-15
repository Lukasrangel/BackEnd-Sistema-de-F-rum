<?php

ini_set('display errors',1);
error_reporting(E_ALL);


$url = explode('/',$_GET['url']);
$sql = \Mysql::conectar()->prepare("SELECT `topico` FROM `topicos` WHERE `slug` = ?");
$sql->execute(array($_GET['url']));
@$topico = $sql->fetch()['topico'];

?>

<section class='breadcrumb'>
    Voce esté em <span> <a href='/forum'> Forum ></a> <a href='/forum/<?php echo $url[0] ?>'> <?php  echo ucfirst(str_replace('-',' ',$url[0])); ?> > </a> <?php echo $topico; ?> </span>

</section><!--breadcrumb-->


<section class='topico'>
    <h2>Tópico <?php echo ucfirst(str_replace('-',' ',$url[1])); ?></h2>

<?php

$posts = $this->param;

if(count($posts) == 0){
    echo 'Tópico ainda sem posts, seja o primeiro!';
} else {

foreach($posts as $post){

    $sql = \Mysql::conectar()->prepare("SELECT `nick` FROM `usuarios` WHERE `id` = '$post[user_id]'");
    $sql->execute();
    $nick = $sql->fetch()['nick'];

?>
<div class="post" style='border: 1px solid black; margin-bottom: 22px;'>
<p> <a style='text-decoration:none; color:black;'href='<?php echo INITIAL_PATH ?>/my?y=<?php echo $nick; ?>'> <?php echo $nick; ?> </a></p>

<p> <?php echo $post['mesagem']; ?></p>
</div>


<?php
}
}
?>
</section><!--topico-->


<?php

if(isset($_SESSION['login'])){

?>

<div class="postar" style='margin-top: 18px;'>

    <form method='post'>

    <textarea name='post' rows='11' style='width:100%'> </textarea>

    <input type='hidden' name='slug_topico' value='<?php echo $_GET['url']; ?>'>

    <br>
    <br>

    <input type='submit' name='acao' value='Postar!'>

    </form>



</div><!--postar-->
<?php
} else {
    echo "Faça <a href='".INITIAL_PATH."/login'> login </a> para interagir ou <a href='".INITIAL_PATH."/cadastrar'> cadastre-se </a>";
}
?>