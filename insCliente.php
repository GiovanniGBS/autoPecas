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

$nome = trim($_POST['txtNome']);
$endereco = trim($_POST['txtEndereco']);
$cidade = trim($_POST['txtCidade']);
$email = trim($_POST['txtEmail']);
$saldo = trim($_POST['txtSaldo']);


if(!empty($nome) && !empty($endereco) && !empty($cidade) &&!empty($email) && !empty($saldo)){
$sql = "INSERT INTO Cliente (Nome, Endereco, Cidade, Email, Saldo) VALUES ('$nome', '$endereco', '$cidade', '$email', '$saldo');";
$ins = mysql_query($sql);
    if(!$ins){
        echo "Erro ao inserir o cliente...";
    }
}
else {
    echo " Campo 'Nome' não pode estar vazio
     e/ou campo 'Saldo' não pode ser igual a Zero..";
}

header("location:listCliente.php")

?>

