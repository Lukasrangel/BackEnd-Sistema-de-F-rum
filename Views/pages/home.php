<section>
    <div class="center">

    <p>Listando assuntos</p>

    <br><br>
    
    <ul>
    <?php
       $assuntos = $this->param['assuntos'];
       $ultimosTopicos = $this->param['ultimosTopicos'];
       
        foreach($assuntos as $assunto){
            echo ' <li> <a href='.$assunto['slug'].'>'.$assunto['nome'].' </a> <li>';
        }
    ?>
    </ul>

    <br>

    <h2> Últimos tópicos </h2>

    <?php
        foreach($ultimosTopicos as $ultimos ){
    ?>
    <div class="topico-single">
        <p> <a href="<?php echo INITIAL_PATH . '/' . $ultimos['slug']?>"> <?php echo $ultimos['topico']; ?> </a> </p>
    </div><!--topico-single-->
    
    <?php
        }
    ?>
    </div><!--center-->
</section>