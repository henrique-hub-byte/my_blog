<?php

session_start();
include './../app/config.php';
/* include './../app/Libraries/Route.php';
include './../app/Libraries/Controller.php';
include './../app/Libraries/Connection.php'; */
include './../app/autoload.php';
include './../app/Helpers/Check.php';
/* $db = new Database;    

 /* setar a data  */
 /*  date_default_timezone_set('America/Sao_Paulo');
$id_posts = 1; 
 $id_usuario = 2;
$titulo = "atual izando apenas um titulo do post";
$texto = "atualizando texto do post";
$criado_em = '2022-07-30 22:43:00'; */  
 /* pegar data atual  */
/* $criado_em = date('Y-m-d H:i:s');
 
 $db->query("SELECT *  from posts ORDER BY id_posts DESC" );  
$db->resultado();
 
$db->bind(":id_posts", $id_posts); 
 $db->bind(":id_usuario", $id_usuario);
$db->bind(":titulo", $titulo );
$db->bind (":texto", $texto ); 
$db->bind (":criado_em", $criado_em);  
 $db->executa();  

 foreach($db->resultados() as $post){
    echo $post->id_usuario. '-'. $post->titulo.'<br>';
} */
?> 

<!DOCTYPE html> 
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NOME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=URL?>/public/css/style.css">
</head>

<body>
    <?php
    include '../app/Views/header.php';
    $routes = new Route();/*  classe instanciada */
    include '../app/Views/footer.php';


    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="<?=URL?>/public/js/main.js"></script>
</body>

</html>