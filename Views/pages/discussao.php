<?php

ini_set('display errors',1);
error_reporting(E_ALL);


$url = explode('/',$_GET['url']);
$sql = \Mysql::conectar()->prepare("SELECT `topico` FROM `topicos` WHERE `slug` = ?");
$sql->execute(array($_GET['url']));
@$topico = $sql->fetch()['topico'];

?>

<section class='breadcrumb'>
    <div class="center">
        Voce esté em <span> <a href='/forum'> Forum ></a> <a href='/forum/<?php echo $url[0] ?>'> <?php  echo ucfirst(str_replace('-',' ',$url[0])); ?> > </a> <?php echo $topico; ?> </span>
    </div><!--center-->
</section><!--breadcrumb-->


<section class='topico'>
    <div class="center">
    <h2>Tópico <?php echo ucfirst(str_replace('-',' ',$url[1])); ?></h2>

    <br><br>
<?php

$posts = $this->param;

if(count($posts) == 0){
    echo 'Tópico ainda sem posts, seja o primeiro!';
} else {

foreach($posts as $post){

    $sql = \Mysql::conectar()->prepare("SELECT `nick`,`foto` FROM `usuarios` WHERE `id` = '$post[user_id]'");
    $sql->execute();
    $data = $sql->fetch();

?>
<div class="post" id='post_<?php echo $post['id']; ?>'>
    <div class="user left w30" >
        <img src='<?php echo INITIAL_PATH ?>/imgs/<?php echo $data['foto']; ?>'>
        <p> <a style='text-decoration:none; color:black;'href='<?php echo INITIAL_PATH ?>/my?y=<?php echo $data['nick']; ?>'> <?php echo $data['nick']; ?> </a></p>
    </div><!--user-->

    <div class="texto left">
        <p> <?php echo $post['mesagem']; ?></p>
    </div><!--texto-->
    <div class="clear"></div>

    <?php
        if($data['nick'] == $_SESSION['user']){
    ?>
    <div class="options">
        <button onclick="editaPost(<?php echo $post['id']; ?>)"> Editar </button>
        <button  onclick="deletaPost(<?php echo $post['id']; ?>)"> Excluir</button>
    </div><!--options-->

    <?php
        }
    ?>
    

</div><!--post-->


<?php
}
}
?>
    


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
    </div><!--center-->
</section><!--topico-->