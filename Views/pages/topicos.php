<?php
$topicos = $this->param;

?>

<section class='breadcrumb'>
Voce esté em <span> <a href='/forum'> Forum ></a>  <?php echo ucfirst(str_replace('-',' ',$_GET['url']));  ?> </span>

</section><!--breadcrumb-->

<?php

if(\Models\Models::isLogin()){


?>

<section class="criar-topico">

    <p>Criar Tópico</p>

    <form method="post" action="<?php echo $_GET['url'];?>">
        <input type='text' name='topico' required>
        <input type='hidden' name='assunto_id' value='<?php echo $topicos[0]['assunto_id'] ?>'>
        <br><br>
        <input type='submit' name='cadastrar_topico' value='Criar!'>


    </form>

</section>


<p>Listando tópicos</p>

<ul>
<?php
if($topicos != false){
    foreach($topicos as $topico){
        echo '<li><a href='.$topico['slug'].'> ' . $topico['topico'] . '</a></li>';
    }
}


?>
</ul>
<?php
} else {
    echo "Para criar Tópico faça <a href='".INITIAL_PATH."/cadastrar'> cadastro </a> ou <a href='".INITIAL_PATH."/login'> login </a> ";
}
?>