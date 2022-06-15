<section>
    <div class="center">

    <p>Listando assuntos</p>

    <br><br>
    
    <ul>
    <?php
       $assuntos = $this->param;
       
        foreach($assuntos as $assunto){
            echo ' <li> <a href='.$assunto['slug'].'>'.$assunto['nome'].' </a> <li>';
        }
    ?>
    </ul>
    
    </div><!--center-->
</section>