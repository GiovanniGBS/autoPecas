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

$id=trim($_POST['txtId']);
$desc=trim($_POST['txtDesc']);
$qtde=trim($_POST['txtQtde']);
$valor=trim($_POST['txtValor']);

if(!empty($desc) && !empty($qtde) && !empty($valor)){
$sql = " UPDATE produto SET Descricao='$desc',Quantidade='$qtde',Valor='$valor' WHERE Id='$id';";
$ins = mysql_query($sql);
    if(!$ins){
        echo "Erro ao atualizar o produto...";
    }
}
    else {
    echo " Campo em branco...";
}

header("location:listProd.php")

?>

