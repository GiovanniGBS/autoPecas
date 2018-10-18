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
$rs = mysql_query("SELECT * FROM  Cliente where Id=".$Id);
$edt = mysql_fetch_array($rs);

?>



<html>

<head>
    <meta charset = "UTF-8">
    <title> Editar cliente </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>

<body class = "container col-md-8" background=" " style="font-family: Trebuchet MS">

    <br>
    <h1 class="text"><b><center> Editar cliente </center></b></h1>
    <br>
    <form id="formEditCliente" name="formEditCliente" method="POST" action="edtCliente.php">
        <div class="form-group">
            <label for="lblId"><b> ID:  </b> <?php echo $edt['Id'] ?></label>
            <input type="hidden" id="Id" name="txtId" value="<?php echo $edt['Id'] ?>">
        </div>
        <div class="form-group">
            <label for="lblNome"><b> NOME </b></label>
            <input type="text" id="Nome" name="txtNome" class="form-control col-md-10" value="<?php echo $edt['Nome'] ?>">
        </div>
        <div class="form-group">
            <label for="lblEndereco"><b> ENDEREÇO </b></label>
            <input type="text" id="Endereco" name="txtEndereco" class="form-control col-md-8" value="<?php echo $edt['Endereco'] ?>">
        </div>
        <div class="form-group">
            <label for="lblCidade"><b> CIDADE </b></label>
            <input type="text" id="Cidade" name="txtCidade" class="form-control col-md-10" value="<?php echo $edt['Cidade'] ?>">
        </div>
        <div class="form-group">
            <label for="lblEmail"><b> EMAIL </b></label>
            <input type="text" id="Email" name="txtEmail" class="form-control col-md-10" value="<?php echo $edt['Email'] ?>">
        </div>
        <div class="form-group">
            <label for="lblSaldo"><b> SALDO (R$) </b></label>
            <input type="text" id="Saldo" name="txtSaldo" class="form-control col-md-6" value="<?php echo $edt['Saldo'] ?>">
        </div>

        <input type="submit" id="btnAtualizar" name="btnAtualizar" class="btn btn-success btn-lg" value="Atualizar">
        <input type="reset" id="btnLimpar" name="btnLimpar" class="btn btn-warning btn-sm" value="Limpar">
        <input type="button" id="btnVoltar" name="btnVoltar" class="btn btn-danger btn-sm" value="Voltar" 
        onclick="javascript:location.href='listCliente.php'">
    

    </form>

</body>

</html>