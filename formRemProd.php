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

$Id = $_REQUEST['Id']; 
$rs = mysql_query("SELECT * FROM  produto where Id=".$Id);
$rem = mysql_fetch_array($rs);

?>



<html>

<head>
    <meta charset = "UTF-8">
    <title> Remover produtos </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>

<body class = "container col-md-6" background=" " style="font-family: Trebuchet MS">

    <br>
    <h1 class="text"><b><center> Remover produtos </center></b></h1>
    <br>
     <form id="formRemProd" name="formRemProd" method="GET" action="remProd.php">
        <div class="form-group">
          <span class="text-xl font-weight-bold">ID: </span>
          <span class="text-xl font-weight-normal"><?php echo $rem['Id']?> </span>
          <input type="hidden" id="id" name="id" value="<?php echo $rem['Id']?>">
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Descrição: </span>
          <span class="text-xl font-weight-normal"><?php echo $rem['Descricao']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Quantidade: </span>
          <span class="text-xl font-weight-normal"><?php echo $rem['Quantidade']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Valor: </span>
          <span class="text-xl font-weight-normal"><?php echo $rem['Valor']?> </span>
        </div>
        <button id="btnRem"  name="btnRem" type="submit" class="btn btn-lg btn-success"><i class="fas fa-minus-circle"></i> Remover </button>
        <button id="btnVoltar" name="btnVoltar" class="btn btn-sm btn-danger"
        onclick="javascript:location.href='listProd.php'"><i class="fas fa-undo-alt"></i> Voltar </button>
    </form>

</body>

</html>