<?php

$conexao = mysql_connect("localhost", "root", "");

if(!$conexao){
    echo " Erro ao se conectar com o MySql"; 
    exit;
}

$bd = mysql_select_db("autopecas");

if(!$bd){
    echo"Erro ao se conectar com o banco de dados 'autopecas' ";
}

$user = trim($_POST['user']);
$pwd = trim($_POST['pwd']); 

$rs = mysql_query("SELECT * FROM  usuario where User like '$user' ");
$linha = mysql_fetch_array($rs);
//echo $linha['User'] . " --- " . $linha['Password'];

$pwd = md5($pwd);

if($user==$linha['User'] && $pwd==$linha['Password']){
    session_start();
    $_SESSION['User'] = $user;
    header("location:index.html");//página onde, após o login, vai aparecer
}
else{ 
    header("location:erro.html");
}

?>

 