<?php
session_start();
if(!isset($_SESSION['User'])){
    header("location: ./login.html");
}

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
$nome=trim($_POST['txtNome']);
$endereco=trim($_POST['txtEndereco']);
$cidade=trim($_POST['txtCidade']);
$email=trim($_POST['txtEmail']);
$saldo=trim($_POST['txtSaldo']);


if(!empty($nome) && !empty($endereco) && !empty($cidade) &&!empty($email) && !empty($saldo)){
$sql = " UPDATE Cliente SET Nome='$nome',Endereco='$endereco',Cidade='$cidade', Email='$email', Saldo='$saldo' WHERE Id='$id';";
$ins = mysql_query($sql);
    if(!$ins){
        echo "Erro ao atualizar o cliente...";
    }
}
    else {
    echo " Campo em branco...";
}

header("location:listCliente.php")

?>

