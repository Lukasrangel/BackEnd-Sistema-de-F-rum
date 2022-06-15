<section>

    <p>Listando assuntos</p>

    <ul>
    <?php
       $assuntos = $this->param;
       
        foreach($assuntos as $assunto){
            echo ' <li> <a href='.$assunto['slug'].'>'.$assunto['nome'].' </a> <li>';
        }
    ?>
    </ul>
    

</section>