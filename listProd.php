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

$rs = mysql_query("SELECT * FROM Produto;");
/*$rs = Record Set = Conjunto de registros.
                    Traz os registros que estão
                    gravados no banco. Neste caso,
                    está trazendo os registros da tabela Produto.
*/
?>



<html>

<head>
<meta charset = "UTF-8">
<title> Listagem de produtos </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<link rel="stylesheet" href="login.css">      
</head>

<body class = "container col-md-10" background="wpp2.png" style="font-family: Trebuchet MS">
    
    <br>
    <h1 class="text-white" style="border:3px solid #fff; border-radius:3px;padding:10px;"><b><center>Produtos da AutoPeças </center></b></h1><br>
    <br>
    <input type="button" id="btnAdd name="btnAdd" class="btn btn-success btn-lg" value=" Novo produto "
    onclick="javascript:location.href='formInsProd.html'">

    <input type="button" id="btnAdd name="btnAdd" class="btn btn-danger btn-lg" value=" Voltar"
    onclick="javascript:location.href='index.html'">
    <br>
    <br>
    <table class="table table-striped" style="background:#FFF;">
    <thead class="thead-dark">
        <tr>
            <th> ID <br></th>
            <th> DESCRIÇÃO <br></th>
            <th> QUANTIDADE <br></th>
            <th> VALOR <br></th>
            <th colspan="2" class="text-center"> OPERAÇÕES </th>
        </tr>
 
    <?php 
        while($linha = mysql_fetch_array($rs)){?> 
        <tr>
            <td><b><center><?php echo $linha['Id'] ?></center></b></td>
            <td><b><?php echo $linha['Descricao'] ?></b></td>
            <td><b><center><?php echo $linha['Quantidade'] ?></center></b></td>
            <td><b>R$ <?php echo number_format($linha['Valor'],2,',','.') ?></b></td>
            <td><button id="btnEdt" class="btn btn-outline-warning btn-lg" data-toggle="tooltip" data-placement="top" title="Editar"
            onclick="javascript:location.href='formEditProd.php?Id=' + <?php echo $linha ['Id'] ?>"><i class="fas fa-pencil-alt"></i></button></td>
            <td><button id="btnRem" class="btn btn-outline-danger btn-lg"  data-toggle="tooltip" data-placement="top" title="Remover"
            onclick="javascript:location.href='formRemProd.php?Id=' + <?php echo $linha ['Id'] ?>"><i class="far fa-trash-alt"></i></button></td>
        </tr>
        
    <?php } ?>
       
    </table>
</body>

</html>