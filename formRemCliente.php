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

$Id = $_REQUEST['Id']; 
$rs = mysql_query("SELECT * FROM  cliente where Id=".$Id);
$rem = mysql_fetch_array($rs);

?>



<html>

<head>
    <meta charset = "UTF-8">
    <title> Remover clientes </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>

<body class = "container col-md-6" background=" " style="font-family: Trebuchet MS">

    <br>
    <h1 class="text"><b><center> Remover clientes </center></b></h1>
    <br>
     <form id="formRemProd" name="formRemProd" method="GET" action="remCliente.php">
        <div class="form-group">
          <span class="text-xl font-weight-bold"> ID: </span>
          <span class="text-xl font-weight-normal"><?php echo $rem['Id']?> </span>
          <input type="hidden" id="id" name="id" value="<?php echo $rem['Id']?>">
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold"> Nome: </span>
          <span class="text-xl font-weight-normal"><?php echo $rem['Nome']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold"> Endereço: </span>
          <span class="text-xl font-weight-normal"><?php echo $rem['Endereco']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold"> Cidade: </span>
          <span class="text-xl font-weight-normal"><?php echo $rem['Cidade']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Email: </span>
          <span class="text-xl font-weight-normal"><?php echo $rem['Email']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Saldo: </span>
          <span class="text-xl font-weight-normal"><?php echo $rem['Saldo']?> </span>
        </div>
    
        <button id="btnRem"  name="btnRem" type="submit" class="btn btn-lg btn-success"><i class="fas fa-minus-circle"></i> Remover </button>
        <button id="btnVoltar" name="btnVoltar" class="btn btn-sm btn-danger"
        onclick="javascript:location.href='listCliente.php'"><i class="fas fa-undo-alt"></i> Voltar </button>
    </form>

</body>

</html>