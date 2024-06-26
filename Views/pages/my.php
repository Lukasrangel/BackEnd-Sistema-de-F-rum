<?php




?>

<section class="user" style='width: 100%;'>
    <div class="center">

        <div class="dados" style='width: 50%; float:left;display:block;'>

            <?php
                if($this->param['user'] == @$_SESSION['user']){
            ?>
            <div class="icon right"><img src='<?php echo INITIAL_PATH?>/icons/pencil.png'></div>
            <div class="clear"></div>

            <?php
                }
            ?>

            <h1> <?php echo $this->param['user']; ?> </h1>
    
    
            <br><br>

            <?php
                echo $this->param['resumo'];
                
            ?>
        </div><!--dados-->

        <div class="foto" style='width: 50%;float:right;display:block;'>
            <?php
                $sql = \Mysql::conectar()->prepare("SELECT `foto` FROM `usuarios` WHERE `nick` = ?");
                $sql->execute(array($this->param['user']));
                $foto = $sql->fetch()['foto'];

            ?>
            <img src='<?php echo INITIAL_PATH ?>/imgs/<?php echo $foto; ?>' style='display: block; margin: 22px auto;border: 1px solid black; width: 180px; height: 210px'>

            <?php
                if($this->param['user'] == @$_SESSION['user']){
            ?>
                <form method='post' enctype="multipart/form-data">
                
                <input type='file' name='foto'>

                <br><br>

                <input type='submit' name='acao' value='Adicionar foto'>
                </form>

            <?php
                }
            ?>
    
        </div><!--foto-->
        <div style='clear: both;'></div>


    </div><!--center-->
</section>


<section class="topicos-recentes-postados">
    <div class="center">

        <div class="titulo">
            <h2> Seus Posts recentes </h2>
        </div><!--titulo-->

    <?php
        
        foreach($this->param['posts'] as $posts){
    ?>

        <div class="post" style='border: 1px solid black;margin-bottom: 18px;'>
            <div class="header-topico" style='width: 100%; background-color: grey; position:relative; top: -19px;'>
               <h3 style='color: white;'> <a style='text-decoration:none; color: white;'href='<?php echo INITIAL_PATH . '/' . $posts['slug_topico']; ?>'> <?php echo $posts['slug_topico'] ?> </a> </h3>
            </div><!--header-topico-->
            <p> <?php echo $posts['mesagem']; ?></p>

        </div>

    <?php
        }
    ?>


    </div><!--center-->
</section>


<section class="responderam_a_vc">
    <div class="center">

    <div class="titulo">
        <h2> Responderam a você </h2>
    </div><!--titulo-->

        <?php
           $suasrespostas = \Models\Models::respostas_my();

            foreach($suasrespostas as $suaresposta){
                if(empty($suaresposta)){
                    
                } else {
        ?>

        <div class="post" style='border: 1px solid black;margin-bottom: 18px;'>
            <div class="header-topico" style='width: 100%; background-color: grey; position:relative; top: -19px;'>
               <h3 style='color: white;'> <a style='text-decoration:none; color: white;'href='<?php echo INITIAL_PATH . '/' . $suaresposta['slug_topico']; ?>'> <?php echo @$suaresposta['slug_topico'] ?> </a> </h3>
            </div><!--header-topico-->
            <p> <?php echo @$suaresposta['mesagem'] ?></p>

        </div>

        <?php
                }
            }
        ?>


    </div><!--center-->
</section><!--responderam-a-vc-->


<section class="seus-topicos">
    <div class="center">

    <div class="titulo">
        <h2> Seus tópicos</h2>
    </div><!--titulo-->

    <?php
        $topicos = \Models\Models::pega_meus_topicos();

        foreach($topicos as $topico){
    ?>

    <div class="post" style='border: 1px solid black;margin-bottom: 18px;'>
        
        <div class="header-topico" style='width: 100%; background-color: grey; position:relative; top: -19px;'>
            <h3 style='color: white;'> <a style='text-decoration:none; color: white;'href='<?php echo INITIAL_PATH . '/' . $topico['slug']; ?>'> <?php echo $topico['slug'] ?> </a> </h3>
        </div><!--header-topico-->
        
        <h3> última mensagem: </h3>

        <?php
            $sql = \Mysql::conectar()->prepare("SELECT * FROM `posts` WHERE `slug_topico` = ? ORDER BY `id` DESC");
            $sql->execute(array($topico['slug']));
            $ultimaMensagem = $sql->fetch()['mesagem'];
        ?>
        <br>
        <p> <?php echo @$ultimaMensagem; ?></p>

    </div><!--post-->

    <?php
        }
    ?>

    </div><!--center-->
</section><!--seus-topicos-->

<div class="overflow"></div>

<div class="user-infos" anime-data='up'>

        <div class="close"> X </div>

        <form method='post'>

        <input type='text' name='nick' value='<?php echo $_SESSION['user']; ?>'>

        <br><br>

        <textarea rows='6' name='resumo'>
            <?php echo @$this->param['resumo']; ?>
        </textarea>
           
        <br><br>

        <input type='submit' name='infos' value='Editar!'>


        </form>


</div><!--user-infos-->