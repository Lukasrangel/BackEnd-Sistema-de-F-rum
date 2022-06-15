<?php

namespace Models;

class Models {

    public static function listar_assuntos(){
        $sql = \Mysql::conectar()->prepare("SELECT * FROM `assuntos`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function listar_topicos($slug){
        $sql = \Mysql::conectar()->prepare("SELECT `id` FROM `assuntos` WHERE `slug` = ?");
        $sql->execute(array($slug));

        if($sql->rowCount() > 0){
            $id = $sql->fetch()['id'];
        } else {
            return false;
            die();
        }
        
        $sql = \Mysql::conectar()->prepare("SELECT * FROM `topicos` WHERE `assunto_id` = ?");
        $sql->execute(array($id));
        return $sql->fetchAll();
    }

    public static function cadastrar_topico($post){
        $nome = $post['topico'];
        $assunto_id = $post['assunto_id'];

        $sql = \Mysql::conectar()->prepare("SELECT `slug` FROM `assuntos` WHERE `id` = ?");
        $sql->execute(array($assunto_id));
        $slug1 = $sql->fetch()['slug'];

        $slug1 = \Forum::generateSlug($slug1);
        $slug2 = \Forum::generateSlug($nome);

        $slug_final = $slug1 . '/' . $slug2;

        $sql = \Mysql::conectar()->prepare("INSERT INTO `topicos` VALUES (null,?,?,?)");
        $sql->execute(array($assunto_id,$nome,$slug_final));
    }

    public static function listar_posts($slug){
        $sql = \Mysql::conectar()->prepare("SELECT * FROM `posts` WHERE `slug_topico` = ?");
        $sql->execute(array($slug));
        return $sql->fetchAll();
    }

    public static function isLogin(){
      return isset($_SESSION['login']) ? true : false;
    }

    public static function cadastrar_user($post){
        $nick = $post['nick'];
        $email = $post['email'];
        $senha = $post['senha'];
        $senha_ok = $post['senha_ok'];
        $foto = '';

        if($senha == $senha_ok){

        } else {
            //para
            return "<script>alert('Senha não confirmada')</script>";
            header("Location: " . INITIAL_PATH .'/cadastrar');
            die();
        }

        $sql = \Mysql::conectar()->prepare("SELECT * FROM `usuarios` WHERE `nick` = ?");
        $sql->execute(array($nick));
        $sql->fetch();
        if($sql->rowCount() > 0){
            //nick já existe
            return "<script>alert('Este nick já existe')</script>";
            header("Location: " . INITIAL_PATH .'/cadastrar');
            die();
        } else {
            $sql = \Mysql::conectar()->prepare("SELECT * FROM `usuarios` WHERE `email` = ?");
            $sql->execute(array($email));
            $sql->fetch();
            if($sql->rowCount() > 0){
                //email já cadastrado
                return "<script>alert('Este email já está cadastrado')</script>";
                header("Location: " . INITIAL_PATH .'/cadastrar');
                die();
            } else {
                $sql = \Mysql::conectar()->prepare("INSERT INTO `usuarios` VALUES (null,?,?,?,?)");
                $sql->execute(array($nick,$email,$senha,$foto));
                if($sql->rowCount() > 0){
                    //alerta ok
                    return "<script>alert('Cadastro feito com sucesso')</script>";
                    header("Location: " . INITIAL_PATH .'/login');
                    die();
                } 
            }
        }
    }

    public static function login($post){
        $email = $post['email'];
        $pass = $post['passwd'];

        $sql = \Mysql::conectar()->prepare("SELECT * FROM `usuarios` WHERE `email` = ? AND `pass` = ?");
        $sql->execute(array($email, $pass));
        $dados = $sql->fetch();
        if($sql->rowCount() > 0){
            $_SESSION['login'] = true;
            $_SESSION['user'] = $dados['nick']; 
            $_SESSION['id'] = $dados['id'];
            header('Location:' . INITIAL_PATH);
            die();
        } else {
            return "<script>alert('Login ou senha inválidos')</script>";
        }
    }

    public static function logout(){
        session_destroy();
        header("Location:" . INITIAL_PATH);
        die();
    }

    public static function pegaPosts($user_id)
    {
        $sql = \Mysql::conectar()->prepare("SELECT * FROM `posts` WHERE `user_id` = ? ORDER BY `id` DESC LIMIT 0, 7");
        $sql->execute(array($user_id));
        $data = $sql->fetchAll();
        return $data;
    }

    public static function cadastrar_post($post){
        $user_id = $_SESSION['id'];
        $slug_topico = $post['slug_topico'];
        $mensagem = $post['post'];

        $sql = \Mysql::conectar()->prepare("INSERT INTO `posts` VALUES (null, ?,?,?)");
        $sql->execute(array($user_id,$mensagem,$slug_topico));
    }

    public static function adicionar_foto($file){
        echo __DIR__;
        $foto = \Forum::upload_img($file, 'imgs/');
        if($foto != false){
            $sql = \Mysql::conectar()->prepare("UPDATE `usuarios` SET `foto` = ? WHERE `nick` = ?");
            $sql->execute(array($foto, $_SESSION['user']));
            return 0;
        } else {
            return "<script> Formato da imagem inválido </script>";
        }
    }
}

?>