<?php
include('config.php');

$controller = new Controllers\forumController();

@$post = $_POST;

//listar forums
Router::get('/',function() use ($controller){
    $controller->home();
});


//listar topicos
Router::get('/?',function($arr) use ($controller){
    //lista tópicos
    if($arr[1] == 'cadastrar' || $arr[1] == 'login' || $arr[1] == 'my'){

    } else {
        $controller->forum();
    }
    
    
});

//inserir topicos
Router::post('/?',function($arr) use ($controller){
    if($arr[1] == 'cadastrar' || $arr[1] == 'login' || $arr[1] == 'my'){
        
    } else {
        $controller->forum();
    }
    
});

//listar single
Router::get('/?/?',function($arr) use ($controller){
    //lista posts
    $controller->topico($arr[1] . '/' . $arr[2]);
});

//postar dentro de tópico
Router::post('/?/?', function($arr) use ($controller){
    //print_r($_POST);
    $controller->topico($arr[1] . '/' . $arr[2]);

});

Router::get('/login', function() use ($controller){
    //fazer login
});

Router::get('/cadastrar', function() use ($controller){
    //cadastrar
    $controller->cadastrar();
});

Router::post('/cadastrar',function() use ($controller){
   echo $controller->cadastrar();
});

//login
Router::get('/login', function() use ($controller){
    $controller->login();
});

Router::post('/login', function() use ($controller){
    echo $controller->login();
});

Router::get('/my', function() use ($controller){
    $controller->my();
});

Router::post('/my', function() use ($controller){
    $controller->my();
});

Router::get('/logout', function(){
    \Models\Models::logout();
});
?>
