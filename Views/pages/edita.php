<?php

if(!\Models\Models::isLogin()){
    header("Location:" . INITIAL_PATH);
    die();
}


$id = $_GET['post'];

$sql = \Mysql::conectar()->prepare("SELECT * FROM `posts` WHERE `id` = ?");
$sql->execute(array($id));
$data = $sql->fetch();

if($data['user_id'] != $_SESSION['id']){
    header("Location:" . INITIAL_PATH);
    die();
}


?>
<div class="edita">
    <div class="center">

    <form method='post'>

        <textarea rows='12' name='post'>
            <?php echo $data['mesagem']; ?>
        </textarea>
        <input type='hidden' name='id' value='<?php echo $id; ?>'>

        <input type='submit' name='acao' value='Editar'>


    </form>

    <p>Retornar a <a href='<?php echo INITIAL_PATH . '/' . $data['slug_topico']; ?>'> discussão </a></p>

    </div><!--center-->
</div><!--edita-->
