<?php
include('../config.php');


if(\Models\Models::isLogin()){
    if(isset($_GET['post'])){
        $id = $_GET['post'];

        if(\Models\Models::deleta_post($id)){
            $data['sucesso'] = true;
        }
        
        echo json_encode($data);
        
    }
} else {
    header("Location:" . INITIAL_PATH);
    die();
}


?>