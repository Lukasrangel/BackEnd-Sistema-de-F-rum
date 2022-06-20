<?php

namespace Controllers;

class forumController {

    private $View;
    private $Model;


    public function home(){
        //puxar página home;
        $Model = new \Models\Models();
        $View = new \Views\MainView('home.php');
        $data['assuntos'] = $Model->listar_assuntos();
        $data['ultimosTopicos'] = $Model->ultimosTopicos();
        $View->setParam($data);
        $View->render();    
    }

    public function forum(){
        $url = $_GET['url'];
        $Model = new \Models\Models();
        if(isset($_POST['topico'])){
            $Model->cadastrar_topico($_POST);
        }
        $View = new \Views\MainView('topicos.php');
        $View->setParam($Model->listar_topicos($url));
        $View->render();
    }

    public function topico($arr){
        //renderizar página discussão
        //puxar todas discssoes do topico especifico
        $Model = new \Models\Models();
        if(isset($_POST['acao'])){
            $Model->cadastrar_post($_POST);
        }
        $View = new \Views\MainView('discussao.php');
        $View->setParam($Model->listar_posts($arr));
        $View->render();
    }

    public function cadastrar(){
        if(isset($_POST['acao'])){
            $Model = new \Models\Models();
            echo $Model->cadastrar_user($_POST);
        }
        $View = new \Views\MainView('cadastrar.php');
        $View->render();
    }

    public function login(){
        if(isset($_POST['acao'])){
            $Model = new \Models\Models();
            echo $Model->login($_POST);
        }
        $View = new \Views\MainView('login.php');
        $View->render();
    }

    public function my(){
        $Model = new \Models\Models();

        if(isset($_POST['infos'])){
            echo $Model->atualizarDados($_POST);
        }

        if(isset($_POST['acao'])){
            echo $Model->adicionar_foto($_FILES['foto']);
        }


        if(isset($_GET['y'])){
            $user = $_GET['y'];
        
            $sql = \Mysql::conectar()->prepare("SELECT `id` FROM `usuarios` WHERE `nick` = ?");
            $sql->execute(array($user));
            $user_id = $sql->fetch()['id'];
            if($sql->rowCount() == 0){
                header("Location:" . INITIAL_PATH);
                die();
            } 
        } else {
                $user = $_SESSION['user'];
                $user_id = $_SESSION['id'];
            }
        

        $data['user'] = $user;
        $data['resumo'] = $Model->pegaResumoUser($user_id);
        $data['posts'] = $Model->pegaPosts($user_id); 

        $View = new \Views\MainView('my.php');
        $View->setParam($data);
        $View->render();
    }

    public function editar(){
        $Models = new \Models\Models();
        if(isset($_POST['acao'])){
            $Models->edita_post($_POST);
        }

        $View = new \Views\MainView('edita.php');
        $View->render();
    }

    public static function responda(){
        $Models = new \Models\Models();
        $View = new \Views\MainView('responda.php');
        if(isset($_POST['acao'])){
            $Models->cadastrar_post($_POST);
            header("Location:" . INITIAL_PATH . '/' . $_POST['slug_topico']);
        } else {
            $id = $_GET['post'];
            $View->setParam($Models->postSingle($id));
        }

        $View->render();
    }

}


?>