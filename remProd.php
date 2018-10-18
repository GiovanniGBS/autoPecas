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

$id=trim($_GET['id']);

if(!empty($id)){
$sql = " DELETE FROM produto WHERE Id='$id';";
$ins = mysql_query($sql);
    if(!$ins){
        echo "Erro ao REMOVER o produto...";
    }
}
    else {
    echo " Campo em branco...";
}

header("location:listProd.php")

?>

