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

$desc = trim($_POST['txtDesc']);
$qtde = trim($_POST['txtQtde']);
$valor = trim($_POST['txtValor']);

if(!empty($desc) && $valor>0){
$sql = "INSERT INTO produto (Descricao, Quantidade, Valor) VALUES ('$desc','$qtde','$valor');";
$ins = mysql_query($sql);
    if(!$ins){
        echo "Erro ao inserir o produto...";
    }
}
else {
    echo " Campo 'Descrição' não pode estar vazio
     e/ou campo 'Valor' não pode ser igual a Zero..";
}

header("location:listProd.php")

?>

