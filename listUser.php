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

$rs = mysql_query("SELECT * FROM usuario;");

?>



<html>

<head>
<meta charset = "UTF-8">
<title> Usuários registrados </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        
</head>

<body class = "container col-md-10" background=" " style="font-family: Trebuchet MS">
    
    <br>
    <h1 class="text"><b><center>Usuários do sistema da AutoPeças </center></b></h1>
    <br>
    <br>
    <input type="button" id="btnAdd" name="btnAdd" class="btn btn-danger btn-lg" value=" Voltar"
    onclick="javascript:location.href='index.html'">
    <br>
    <br>
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th> ID <br></th>
            <th> NOME <br></th>
        </tr>
 
    <?php 
        while($linha = mysql_fetch_array($rs)){?> 
        <tr>
            <td><b><?php echo $linha['Id'] ?></b></td>
            <td><b><?php echo $linha['User'] ?></b></td>
        </tr>
        
    <?php } ?>
       
    </table>
</body>

</html>