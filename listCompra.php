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

$rs = mysql_query("SELECT * FROM Compra;");
$rs1 = mysql_query("SELECT * FROM Cliente;");

/*$rs = Record Set = Conjunto de registros.
                    Traz os registros que estão
                    gravados no banco. Neste caso,
                    está trazendo os registros da tabela Produto.
*/
?>



<html>

<head>
<meta charset = "UTF-8">
<title> Listagem de compras </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        
</head>

<body class = "container col-md-10" background=" " style="font-family: Trebuchet MS">
    
    <br>
    <h1 class="text-white" style="border:3px solid #fff; border-radius:3px;padding:10px;"><b><center>Pedidos da AutoPeças </center></b></h1>    <br>
    <br>
   <input type="button" id="btnAdd" name="btnAdd" class="btn btn-success btn-lg" value=" Nova compra"
    onclick="javascript:location.href='formInsCompra.html'">

    <input type="button" id="btnAdd name="btnAdd" class="btn btn-danger btn-lg" value=" Voltar"
    onclick="javascript:location.href='index.html'">
    <br>
    <br>
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th> ID <br></th>
            <th> NOME <br></th>
            <th> DATA_COMPRA <br></th>
            <th> OPERAÇÃO </th>
        </tr>
 
    <?php 
        while($linha = mysql_fetch_array($rs)){?> 
        <tr>
            <td><b><center><?php echo $linha['Id'] ?></center></b></td>
            <td><b><?php echo $linha1 =  mysql_fetch_array($rs1)['Nome'] ?></b></td>
            <td><b><?php echo $linha['Data_compra'] ?></b></td>
            <td><button id="btnDetalhe" class="btn btn-outline-primary btn-lg" data-toggle="tooltip" data-placement="top" title="Detalhes"
            onclick="javascript:location.href='listItemCompra.php?Id=' + <?php echo $linha ['Id'] ?>"><i class="fas fa-info"></i></button></td>
            
        </tr>
        
    <?php } ?>
       
    </table>
</body>

</html>