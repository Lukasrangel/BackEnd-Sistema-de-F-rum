<section class="responda">
    <div class="center">

    <?php
    $post = $this->param;
    
    $url = explode('/',$_GET['url']);
    $slug = $url[0] . '/' . $url[1];
    
    $sql = \Mysql::conectar()->prepare("SELECT `nick` FROM `usuarios` WHERE `id` = ?");
    $sql->execute(array($post['user_id']));
    $user = $sql->fetch()['nick'];
    ?>
        <form method='post'>

            <div style='border:1px solid black' class="area">
                
                <div class="post">
                    <div class="header-topico">
                        <h3 style='color:white'> <?php echo $user; ?></h3>
                    </div><!--header-->

                    <?php echo substr($post['mesagem'],0,70); ?>
                </div><!--post-->
                <textarea style='width: 100% ' rows='12' name='post'> </textarea>
            </div><!--area-->

            <input type='hidden' name='slug_topico' value='<?php echo $slug; ?>'>
            <input type='hidden' name='resposta' value='<?php echo $_GET['post'];  ?>'>
            <input type='submit' name='acao' value='Responder'>

        </form>


    </div><!--center-->
</section><!--responda-->